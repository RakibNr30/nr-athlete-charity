<?php

namespace Modules\Front\Http\Controllers;

use Carbon\Carbon;
use CodeToad\Strava\Strava;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Image;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\DashboardService;
use Modules\Cms\Services\RiceService;
use Modules\Setting\Services\ApiService;
use Modules\Ums\Entities\User;

class DonationController extends Controller
{
    protected $strava;
    protected $dashboardService;
    protected $casesService;
    protected $riceService;

    public function __construct(
        DashboardService $dashboardService,
        CasesService $casesService,
        RiceService $riceService,
        ApiService $apiService
    )
    {
        $this->middleware('donner');

        $apiCredentials = $apiService->firstOrCreate([]);

        $this->strava = new Strava(
            $apiCredentials->strava_client_id ?? '',
            $apiCredentials->strava_client_secret ?? '',
            config('ct_strava.redirect_uri') ?? '',
            new Client()
        );

        $this->dashboardService = $dashboardService;
        $this->casesService = $casesService;
        $this->riceService = $riceService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // counter
        $data->counter = $this->dashboardService->counter();
        // cases
        $data->cases = $this->casesService->allLatest(6);
        // all cases
        $data->allCases = $this->casesService->allCases();
        // last rice
        $rice = $this->riceService->lastOne();

        // Get the user
        $user = User::find(auth()->user()->id);

        // Check if current token has expired
        if(Carbon::now() > $user->expires_at) {
            // Token has expired, generate new tokens using the currently stored user refresh token
            $refresh = $this->strava->refreshToken($user->refresh_token);

            // Update the users tokens
            User::where('id', $user->id)->update([
                'access_token' => $refresh->access_token,
                'refresh_token' => $refresh->refresh_token,
                'expires_at' => date('Y-m-d h:m:s', $refresh->expires_at)
            ]);
        }
        // Get the user
        $user = User::find(auth()->user()->id);
        // activities
        $activities = null;
        // last activity
        $lastActivity = null;

        $activities = $this->strava->activities($user->access_token);
        if (count($activities)) {
            $lastActivity = $activities[0];
            $lastActivity = $this->strava->activity($user->access_token, $lastActivity->id);
        }

        // kilo calories
        if (isset($lastActivity->calories)) {
            $data->calories = $lastActivity->calories;
        } else {
            $data->calories = 0;
        }

        // rices in kg
        $data->rices = $data->calories * 0.00077;
        //$data->rices = 10000 * 0.00077;

        // rice price
        $data->ricePrice = $data->rices * $rice->global_avg_price;
        //$data->ricePrice = $data->rices * 1.4;

        //dd($data);

        return view('front::donation.index', compact('lastActivity', 'data'));
    }

    public function store(Request $request) {
        $data = $request->all();

        $file = substr($data['image'], strpos($data['image'], ",") + 1);
        $file = base64_decode($file);

        $image_name = "ss-".time().".png";
        $server_path = '/app/public/screenshoots/' . $image_name;
        $path = storage_path(). $server_path;

        file_put_contents($path, $file);

        $response = [
            'status' => 'success',
            'path' => env('DOMAIN') . '/storage/screenshoots/' . $image_name
        ];

        return response()->json($response, 200);
    }
}
