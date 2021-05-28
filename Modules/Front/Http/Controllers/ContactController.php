<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\PartnerService;
use Modules\Setting\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;
    protected $partnerService;

    public function __construct(ContactService $contactService, PartnerService $partnerService)
    {
        $this->contactService = $contactService;
        $this->partnerService = $partnerService;
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
}