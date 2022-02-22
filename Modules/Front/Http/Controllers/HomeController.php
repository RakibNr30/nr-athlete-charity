<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Services\DashboardService;
use Modules\Front\Services\HomeService;

class HomeController extends Controller
{
    protected $homeService;
    protected $dashboardService;

    public function __construct(HomeService $homeService, DashboardService $dashboardService)
    {
        $this->homeService = $homeService;
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();
        // banner
        $data->banner = $this->homeService->banner([]);
        // cases
        $data->cases = $this->homeService->cases(4);
        // news
        $data->news = $this->homeService->news(3);
        // testimonials
        $data->testimonials = $this->homeService->testimonials();
        // counter
        $data->counter = $this->dashboardService->counter();

        return view('front::home.index', compact('data'));
    }
}
