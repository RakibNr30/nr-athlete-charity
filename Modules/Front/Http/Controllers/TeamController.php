<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\TeamService;

class TeamController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();
        // team members
        $data->teamMembers = $this->teamService->all();
        return view('front::team.index', compact('data'));
    }
}