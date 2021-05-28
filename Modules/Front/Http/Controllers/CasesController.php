<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\NewsService;

class CasesController extends Controller
{
    protected $casesService;

    public function __construct
    (
        CasesService $casesService
    )
    {
        $this->casesService = $casesService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();
        // cases
        $data->cases = $this->casesService->allLatest(6);

        return view('front::case.index', compact('data'));
    }

    public function show($slug) {
        // get single data
        $case = $this->casesService->findBy('slug', $slug);
        if (empty($case)) {
            abort(404);
        }

        // data object
        $data = new \stdClass();
        // news
        $data->cases = $this->casesService->allLatest(6);

        return view('front::case.show', compact('data', 'case'));
    }
}