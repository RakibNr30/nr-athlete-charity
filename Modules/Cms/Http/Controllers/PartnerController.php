<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;

// requests...
use Modules\Cms\Http\Requests\PartnerStoreRequest;
use Modules\Cms\Http\Requests\PartnerUpdateRequest;

// datatable...
use Modules\Cms\DataTables\PartnerDataTable;

// services...
use Modules\Cms\Services\PartnerService;

class PartnerController extends Controller
{
    /**
     * @var $partnerService
     */
    protected $partnerService;

    /**
     * Constructor
     *
     * @param PartnerService $partnerService
     */
    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    /**
     * Partner list
     *
     * @param PartnerDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(PartnerDataTable $datatable)
    {
        return $datatable->render('cms::partner.index');
    }

    /**
     * Create partner
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view
        return view('cms::partner.create');
    }


    /**
     * Store partner
     *
     * @param PartnerStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PartnerStoreRequest $request)
    {
        // create partner
        $partner = $this->partnerService->create($request->all());
        // upload files
        $partner->uploadFiles();
        // check if partner created
        if ($partner) {
            // flash notification
            notifier()->success('Partner created successfully.');
            return redirect()->route('backend.cms.partner.index');
        } else {
            // flash notification
            notifier()->error('Partner cannot be created successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show partner.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get partner
        $partner = $this->partnerService->find($id);
        // check if partner doesn't exists
        if (empty($partner)) {
            // flash notification
            notifier()->error('Partner not found!');
            // redirect back
            return redirect()->back();
        }

        // return view
        return view('cms::partner.show', compact('partner'));
    }

    /**
     * Show partner.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get partner
        $partner = $this->partnerService->find($id);
        // check if partner doesn't exists
        if (empty($partner)) {
            // flash notification
            notifier()->error('Partner not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('cms::partner.edit', compact('partner'));
    }

    /**
     * Update partner
     *
     * @param PartnerUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PartnerUpdateRequest $request, $id)
    {
        // get partner
        $partner = $this->partnerService->find($id);
        // check if partner doesn't exists
        if (empty($partner)) {
            // flash notification
            notifier()->error('Partner not found!');
            // redirect back
            return redirect()->back();
        }
        // update partner
        $partner = $this->partnerService->update($request->all(), $id);
        // upload files
        $partner->uploadFiles();
        // check if partner updated
        if ($partner) {
            // flash notification
            notifier()->success('Partner updated successfully.');
        } else {
            // flash notification
            notifier()->error('Partner cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Delete partner
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get partner
        $partner = $this->partnerService->find($id);
        // check if partner doesn't exists
        if (empty($partner)) {
            // flash notification
            notifier()->error('Partner not found!');
            // redirect back
            return redirect()->back();
        }
        // delete partner
        if ($this->partnerService->delete($id)) {
            // flash notification
            notifier()->success('Partner deleted successfully.');
        } else {
            // flash notification
            notifier()->success('Partner cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
