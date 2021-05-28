<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\DataTables\TeamDataTable;
use Modules\Cms\Http\Requests\TeamStoreRequest;
use Modules\Cms\Http\Requests\TeamUpdateRequest;
use Modules\Cms\Services\TeamService;

class TeamController extends Controller
{
    /**
     * @var $teamService
     */
    protected $teamService;

    /**
     * Constructor
     *
     * @param TeamService $teamService
     */
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Team list
     *
     * @param TeamDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(TeamDataTable $datatable)
    {
        return $datatable->render('cms::team.index');
    }

    /**
     * Create team
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view
        return view('cms::team.create');
    }


    /**
     * Store team
     *
     * @param TeamStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamStoreRequest $request)
    {
        // create team
        $team = $this->teamService->create($request->all());
        // upload files
        $team->uploadFiles();
        // check if team created
        if ($team) {
            // flash notification
            notifier()->success('Team member created successfully.');
            return redirect()->route('backend.cms.team.index');
        } else {
            // flash notification
            notifier()->error('Team member cannot be created successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show team.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get team
        $team = $this->teamService->find($id);
        // check if team doesn't exists
        if (empty($team)) {
            // flash notification
            notifier()->error('Team member not found!');
            // redirect back
            return redirect()->back();
        }
        $teamList = $this->teamService->all(6);
        // return view
        return view('cms::team.show', compact('team', 'teamList'));
    }

    /**
     * Show team.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get team
        $team = $this->teamService->find($id);
        // check if team doesn't exists
        if (empty($team)) {
            // flash notification
            notifier()->error('Team member not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('cms::team.edit', compact('team'));
    }

    /**
     * Update team
     *
     * @param TeamUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeamUpdateRequest $request, $id)
    {
        // get team
        $team = $this->teamService->find($id);
        // check if team doesn't exists
        if (empty($team)) {
            // flash notification
            notifier()->error('Team member not found!');
            // redirect back
            return redirect()->back();
        }
        // update team
        $team = $this->teamService->update($request->all(), $id);
        // upload files
        $team->uploadFiles();
        // check if team updated
        if ($team) {
            // flash notification
            notifier()->success('Team member updated successfully.');
        } else {
            // flash notification
            notifier()->error('Team member cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Delete team
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get team
        $team = $this->teamService->find($id);
        // check if team doesn't exists
        if (empty($team)) {
            // flash notification
            notifier()->error('Team member not found!');
            // redirect back
            return redirect()->back();
        }
        // delete team
        if ($this->teamService->delete($id)) {
            // flash notification
            notifier()->success('Team member deleted successfully.');
        } else {
            // flash notification
            notifier()->success('Team member cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
