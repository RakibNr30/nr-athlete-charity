<?php

namespace Modules\Ums\Http\Controllers;

use App\Http\Controllers\Controller;

// requests...
use Modules\Ums\DataTables\AthleteDataTable;

class AthleteController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct() {}

    /**
     * User list
     *
     * @param AthleteDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(AthleteDataTable $datatable)
    {
        return $datatable->render('ums::athlete.index');
    }
}