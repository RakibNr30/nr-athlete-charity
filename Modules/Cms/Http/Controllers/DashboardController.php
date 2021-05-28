<?php

namespace Modules\Cms\Http\Controllers;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Routing\Controller;
use Modules\Cms\Services\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // counter
        $data->counter = $this->dashboardService->counter();

        // Chart data
        $donationChartData = $this->dashboardService->donationChartData();
        $priceChartData = $this->dashboardService->priceChartData();

        $latestDonationChart = (new LarapexChart)->areaChart()
            ->setTitle('Latest Donations')
            ->setSubtitle('Donation vs Date')
            ->addData('Donation (EUR)', $donationChartData->values)
            ->setXAxis($donationChartData->labels)
            ->setGrid()
            ->setMarkers(['#FF5722']);

        $latestPriceChart = (new LarapexChart)->areaChart()
            ->setTitle('Latest Global Rice Price')
            ->setSubtitle('Price vs Date')
            ->addData('Price per kg', $priceChartData->values)
            ->setXAxis($priceChartData->labels)
            ->setGrid()
            ->setMarkers(['#FF5722']);

        $data->latestDonationChart = $latestDonationChart;
        $data->latestPriceChart = $latestPriceChart;

        return view('cms::dashboard.index', compact('data'));
    }
}
