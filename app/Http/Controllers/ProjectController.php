<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Services\CreateProjectService;
use App\Services\ProjectQueryService;

class ProjectController extends Controller
{

    /**
     * The project service instance.
     *
     * @var 
     */
    protected $createProjectService;
    protected $projectQueryService;

    /**
     * Create a new controller instance.
     *
     * @param  
     * @return void
     */
    public function __construct(
        CreateProjectService $createProjectService,
        ProjectQueryService $projectQueryService
    )
    {

        $this->createProjectService = $createProjectService;
        $this->projectQueryService = $projectQueryService;

        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // placeholder
        $projects = $this->projectQueryService->getAll();
        
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return page to create
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'hidden' => 'required',
            'start_date' => 'required',
            'last_update_date' => 'required'
        ]);

        $this->createProjectService->create($request->all());

        return redirect()->route('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
