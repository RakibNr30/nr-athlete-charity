<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\DataTables\PublicMessageDataTable;
use Modules\Cms\Services\PublicMessageService;

class PublicMessageController extends Controller
{
    /**
     * @var $publicMessageService
     */
    protected $publicMessageService;

    /**
     * Constructor
     *
     * @param PublicMessageService $publicMessageService
     */
    public function __construct(PublicMessageService $publicMessageService)
    {
        $this->publicMessageService = $publicMessageService;
    }

    /**
     * Public Message list
     *
     * @param PublicMessageDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(PublicMessageDataTable $datatable)
    {
        return $datatable->render('cms::public-message.index');
    }
    

    /**
     * Show publicMessage.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get publicMessage
        $publicMessage = $this->publicMessageService->find($id);
        // check if publicMessage doesn't exists
        if (empty($publicMessage)) {
            // flash notification
            notifier()->error('Message not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('cms::public-message.show', compact('publicMessage'));
    }

    /**
     * Delete publicMessage
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get publicMessage
        $publicMessage = $this->publicMessageService->find($id);
        // check if publicMessage doesn't exists
        if (empty($publicMessage)) {
            // flash notification
            notifier()->error('Message not found!');
            // redirect back
            return redirect()->back();
        }
        // delete publicMessage
        if ($this->publicMessageService->delete($id)) {
            // flash notification
            notifier()->success('Message deleted successfully.');
        } else {
            // flash notification
            notifier()->success('Message cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
