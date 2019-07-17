<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProjectQueryService;

class HomeController extends Controller
{

    /**
     * The project service instance.
     *
     * @var 
     */
    protected $projectQueryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjectQueryService $projectQueryService)
    {
        $this->projectQueryService = $projectQueryService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = $this->projectQueryService->forPublic();

        return view('homes.index')->with('projects', $projects);
    }
}
