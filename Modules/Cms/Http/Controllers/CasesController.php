<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\DataTables\CasesDataTable;
use Modules\Cms\Http\Requests\CasesStoreRequest;
use Modules\Cms\Http\Requests\CasesUpdateRequest;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\CountryService;

class CasesController extends Controller
{
    /**
     * @var $casesService
     */
    protected $casesService;

    /**
     * @var $countryService
     */
    protected $countryService;

    /**
     * Constructor
     *
     * @param CasesService $casesService
     * @param CountryService $countryService
     */
    public function __construct(CasesService $casesService, CountryService $countryService)
    {
        $this->casesService = $casesService;
        $this->countryService = $countryService;
    }

    /**
     * Cases list
     *
     * @param CasesDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(CasesDataTable $datatable)
    {
        return $datatable->render('cms::cases.index');
    }

    /**
     * Create cases
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // get countries
        $countries = $this->countryService->all();

        // return view
        return view('cms::cases.create', compact('countries'));
    }


    /**
     * Store cases
     *
     * @param CasesStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CasesStoreRequest $request)
    {
        // get all requested data
        $data = $request->all();
        $data['author_id'] = auth()->user()->id;
        // create cases
        $cases = $this->casesService->create($data);
        // upload files
        $cases->uploadFiles();
        // check if cases created
        if ($cases) {
            // flash notification
            notifier()->success('Cases created successfully.');
            return redirect()->route('backend.cms.cases.index');
        } else {
            // flash notification
            notifier()->error('Cases cannot be created successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show cases.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get cases
        $cases = $this->casesService->find($id);
        // check if cases doesn't exists
        if (empty($cases)) {
            // flash notification
            notifier()->error('Cases not found!');
            // redirect back
            return redirect()->back();
        }
        $casesList = $this->casesService->allLatest(6);
        // return view
        return view('cms::cases.show', compact('cases', 'casesList'));
    }

    /**
     * Show cases.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get cases
        $cases = $this->casesService->find($id);
        // check if cases doesn't exists
        if (empty($cases)) {
            // flash notification
            notifier()->error('Cases not found!');
            // redirect back
            return redirect()->back();
        }
        // get countries
        $countries = $this->countryService->all();
        // return view
        return view('cms::cases.edit', compact('cases', 'countries'));
    }

    /**
     * Update cases
     *
     * @param CasesUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CasesUpdateRequest $request, $id)
    {
        // get cases
        $cases = $this->casesService->find($id);
        // check if cases doesn't exists
        if (empty($cases)) {
            // flash notification
            notifier()->error('Cases not found!');
            // redirect back
            return redirect()->back();
        }
        // update cases
        $cases = $this->casesService->update($request->all(), $id);
        // upload files
        $cases->uploadFiles();
        // check if cases updated
        if ($cases) {
            // flash notification
            notifier()->success('Cases updated successfully.');
        } else {
            // flash notification
            notifier()->error('Cases cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Delete cases
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get cases
        $cases = $this->casesService->find($id);
        // check if cases doesn't exists
        if (empty($cases)) {
            // flash notification
            notifier()->error('Cases not found!');
            // redirect back
            return redirect()->back();
        }
        // delete cases
        if ($this->casesService->delete($id)) {
            // flash notification
            notifier()->success('Cases deleted successfully.');
        } else {
            // flash notification
            notifier()->success('Cases cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
