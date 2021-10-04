<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Http\Requests\PublicMessageStoreRequest;
use Modules\Cms\Services\PartnerService;
use Modules\Cms\Services\PublicMessageService;
use Modules\Setting\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;
    protected $partnerService;
    protected $publicMessageService;

    public function __construct
    (
        ContactService $contactService,
        PartnerService $partnerService,
        PublicMessageService $publicMessageService
    )
    {
        $this->contactService = $contactService;
        $this->partnerService = $partnerService;
        $this->publicMessageService = $publicMessageService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // contact
        $data->contact = $this->contactService->firstOrCreate([]);
        // partners
        $data->partners = $this->partnerService->allDesc();

        return view('front::contact.index', compact('data'));
    }

    public function store(PublicMessageStoreRequest $request)
    {
        // create publicMessage
        $publicMessage = $this->publicMessageService->create($request->all());
        // check if publicMessage created
        if ($publicMessage) {
            // flash notification
            notifier()->success('Message sent successfully.');
        } else {
            // flash notification
            notifier()->error('Message sending failed.');
        }
        // redirect back
        return redirect()->back();
    }
}
