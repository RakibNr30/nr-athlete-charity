<?php

namespace App\Http\Controllers\Auth;

use CodeToad\Strava\Strava;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Ums\Entities\User;
use Modules\Ums\Entities\UserPersonalInfo;
use Modules\Ums\Entities\UserResidentialInfo;

class StravaAuthController extends Controller
{
    protected $strava;

    public function __construct()
    {
        $this->strava = new Strava(
            config('ct_strava.client_id'),
            config('ct_strava.client_secret'),
            config('ct_strava.redirect_uri'),
            new Client()
        );
    }

    public function login() {
        return view('auth.strava.login');
    }

    public function stravaAuth()
    {
        return $this->strava->authenticate($scope='activity:read_all,read_all,profile:read_all');
    }

    public function getToken(Request $request)
    {
        $token = $this->strava->token($request->code);
        $scopes = [];
        if ($request->has('scope')) {
            $scopes = explode(',', $request->get('scope'));
        }

        if (!in_array('activity:read_all', $scopes)) {
            notifier()->error('You should check "View data about your private activities".');
            return redirect()->route('login');
        }

        $user = User::where('athlete_id', $token->athlete->id)->first();
        if (!empty($user)) {
            Auth::login($user);
            if (session()->has('url.intended')) {
                return redirect()->intended();
            }
            return redirect()->to('/');
        }

        $user = User::create([
            'refresh_token' => $token->refresh_token,
            'access_token' => $token->access_token,
            'athlete_id' => $token->athlete->id,
            'expires_at' => $token->expires_at,
            'password' => bcrypt(Str::random(10))
        ]);
        $user->assignRole('User');
        UserPersonalInfo::create([
            'first_name' => $token->athlete->firstname,
            'last_name' => $token->athlete->lastname,
            'user_id' => $user->id,
        ]);
        UserResidentialInfo::create([
            'user_id' => $user->id,
        ]);

        Auth::login($user);
        if (session()->has('url.intended')) {
            return redirect()->intended();
        }
        return redirect()->to('/');
    }
}
