<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\AboutService;
use Modules\Cms\Services\DashboardService;
use Modules\Cms\Services\PartnerService;
use Modules\Cms\Services\TestimonialService;

class AboutController extends Controller
{
    protected $aboutService;
    protected $dashboardService;
    protected $partnerService;
    protected $testimonialService;

    public function __construct
    (
        AboutService $aboutService,
        DashboardService $dashboardService,
        PartnerService $partnerService,
        TestimonialService $testimonialService
    )
    {
        $this->aboutService = $aboutService;
        $this->dashboardService = $dashboardService;
        $this->partnerService = $partnerService;
        $this->testimonialService = $testimonialService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // about
        $data->about = $this->aboutService->firstOrCreate([]);
        // counter
        $data->counter = $this->dashboardService->counter();
        // partners
        $data->partners = $this->partnerService->allDesc();
        // testimonials
        $data->testimonials = $this->testimonialService->allDesc();

        return view('front::about.index', compact('data'));
    }
}