<?php

namespace Modules\Cms\Http\Controllers;

use App\Charts\RicePriceChart;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Modules\Cms\DataTables\RiceDataTable;
use Modules\Cms\Http\Requests\RiceStoreRequest;
use Modules\Cms\Http\Requests\RiceUpdateRequest;
use Modules\Cms\Services\RiceService;

class RiceController extends Controller
{
    /**
     * @var $riceService
     */
    protected $riceService;

    /**
     * Constructor
     *
     * @param RiceService $riceService
     */
    public function __construct(RiceService $riceService)
    {
        $this->riceService = $riceService;
    }

    /**
     * Rice list
     *
     * @param RiceDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(RiceDataTable $datatable)
    {
        // data object
        $data = new \stdClass();

        // Chart data
        $chartData = $this->riceService->chartData();

        $latestPriceChart = (new LarapexChart)->areaChart()
            ->setTitle('Latest Global Rice Price')
            ->setSubtitle('Price vs Date')
            ->addData('Price per kg', $chartData->values)
            ->setXAxis($chartData->labels)
            ->setGrid()
            ->setMarkers(['#FF5722']);

        $data->latestPriceChart = $latestPriceChart;

        return $datatable->render('cms::rice.index', compact('data'));
    }

    /**
     * Create rice
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view
        return view('cms::rice.create');
    }

    /**
     * Store rice
     *
     * @param RiceStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RiceStoreRequest $request)
    {
        // create rice
        $rice = $this->riceService->create($request->all());
        // check if rice created
        if ($rice) {
            // flash notification
            notifier()->success('Rice price added successfully.');
            return redirect()->route('backend.cms.rice.index');
        } else {
            // flash notification
            notifier()->error('Rice price cannot be added successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show rice.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get rice
        $rice = $this->riceService->find($id);
        // check if rice doesn't exists
        if (empty($rice)) {
            // flash notification
            notifier()->error('Rice price not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('cms::rice.edit', compact('rice'));
    }

    /**
     * Update rice
     *
     * @param RiceUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RiceUpdateRequest $request, $id)
    {
        // get rice
        $rice = $this->riceService->find($id);
        // check if rice doesn't exists
        if (empty($rice)) {
            // flash notification
            notifier()->error('Rice price not found!');
            // redirect back
            return redirect()->back();
        }
        // update rice
        $rice = $this->riceService->update($request->all(), $id);
        // check if rice updated
        if ($rice) {
            // flash notification
            notifier()->success('Rice price updated successfully.');
        } else {
            // flash notification
            notifier()->error('Rice price cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
