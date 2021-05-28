<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\DataTables\NewsDataTable;
use Modules\Cms\Http\Requests\NewsStoreRequest;
use Modules\Cms\Http\Requests\NewsUpdateRequest;
use Modules\Cms\Services\NewsService;

class NewsController extends Controller
{
    /**
     * @var $newsService
     */
    protected $newsService;

    /**
     * Constructor
     *
     * @param NewsService $newsService
     */
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * News list
     *
     * @param NewsDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(NewsDataTable $datatable)
    {
        return $datatable->render('cms::news.index');
    }

    /**
     * Create news
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view
        return view('cms::news.create');
    }


    /**
     * Store news
     *
     * @param NewsStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsStoreRequest $request)
    {
        // get all requested data
        $data = $request->all();
        $data['author_id'] = auth()->user()->id;
        // create news
        $news = $this->newsService->create($data);
        // upload files
        $news->uploadFiles();
        // check if news created
        if ($news) {
            // flash notification
            notifier()->success('News created successfully.');
            return redirect()->route('backend.cms.news.index');
        } else {
            // flash notification
            notifier()->error('News cannot be created successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show news.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get news
        $news = $this->newsService->find($id);
        // check if news doesn't exists
        if (empty($news)) {
            // flash notification
            notifier()->error('News not found!');
            // redirect back
            return redirect()->back();
        }
        $newsList = $this->newsService->allLatest(6);
        // return view
        return view('cms::news.show', compact('news', 'newsList'));
    }

    /**
     * Show news.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get news
        $news = $this->newsService->find($id);
        // check if news doesn't exists
        if (empty($news)) {
            // flash notification
            notifier()->error('News not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('cms::news.edit', compact('news'));
    }

    /**
     * Update news
     *
     * @param NewsUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        // get news
        $news = $this->newsService->find($id);
        // check if news doesn't exists
        if (empty($news)) {
            // flash notification
            notifier()->error('News not found!');
            // redirect back
            return redirect()->back();
        }
        // update news
        $news = $this->newsService->update($request->all(), $id);
        // upload files
        $news->uploadFiles();
        // check if news updated
        if ($news) {
            // flash notification
            notifier()->success('News updated successfully.');
        } else {
            // flash notification
            notifier()->error('News cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Delete news
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get news
        $news = $this->newsService->find($id);
        // check if news doesn't exists
        if (empty($news)) {
            // flash notification
            notifier()->error('News not found!');
            // redirect back
            return redirect()->back();
        }
        // delete news
        if ($this->newsService->delete($id)) {
            // flash notification
            notifier()->success('News deleted successfully.');
        } else {
            // flash notification
            notifier()->success('News cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
