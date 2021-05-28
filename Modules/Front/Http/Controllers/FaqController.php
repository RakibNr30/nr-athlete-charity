<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\FaqService;

class FaqController extends Controller
{
    protected $faqService;
    protected $casesService;

    public function __construct
    (
        FaqService $faqService,
        CasesService $casesService
    )
    {
        $this->faqService = $faqService;
        $this->casesService = $casesService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();
        // faqs
        $data->faqs = $this->faqService->all();
        // cases
        $data->cases = $this->casesService->allLatest(6);
        return view('front::faq.index', compact('data'));
    }
}