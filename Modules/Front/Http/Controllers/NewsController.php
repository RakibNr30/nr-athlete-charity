<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\NewsService;

class NewsController extends Controller
{
    protected $newsService;
    protected $casesService;

    public function __construct
    (
        NewsService $newsService,
        CasesService $casesService
    )
    {
        $this->newsService = $newsService;
        $this->casesService = $casesService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();
        // news
        $data->news = $this->newsService->allLatest(10);
        // cases
        $data->cases = $this->casesService->allLatest(6);

        return view('front::news.index', compact('data'));
    }

    public function show($slug) {
        // get single data
        $news = $this->newsService->findBy('slug', $slug);
        if (empty($news)) {
            abort(404);
        }

        // data object
        $data = new \stdClass();
        // news
        $data->news = $this->newsService->allLatest(6);
        $data->cases = $this->casesService->allLatest(6);

        return view('front::news.show', compact('data', 'news'));
    }
}