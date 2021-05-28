<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Modules\Cms\DataTables\DonationDataTable;
use Modules\Cms\Services\DonationService;

class DonationController extends Controller
{
    /**
     * @var $donationService
     */
    protected $donationService;

    /**
     * Constructor
     *
     * @param DonationService $donationService
     */
    public function __construct(DonationService $donationService)
    {
        $this->donationService = $donationService;
    }

    /**
     * Donation list
     *
     * @param DonationDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(DonationDataTable $datatable)
    {
        // data object
        $data = new \stdClass();

        // Chart data
        $chartData = $this->donationService->chartData();

        $latestDonationChart = (new LarapexChart)->areaChart()
            ->setTitle('Latest Donations')
            ->setSubtitle('Donation vs Date')
            ->addData('Donation (EUR)', $chartData->values)
            ->setXAxis($chartData->labels)
            ->setGrid()
            ->setMarkers(['#FF5722']);

        $data->latestDonationChart = $latestDonationChart;

        return $datatable->render('cms::donation.index', compact('data'));
    }
}
