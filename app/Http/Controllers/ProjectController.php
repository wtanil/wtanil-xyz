<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Services\CreateProjectService;
use App\Services\ProjectQueryService;
use App\Services\ProjectVisibilityService;
use App\Services\DeleteProjectService;

class ProjectController extends Controller
{

    /**
     * The project service instance.
     *
     * @var 
     */
    protected $createProjectService;
    protected $projectQueryService;
    protected $projectVisibilityService;
    protected $deleteProjectService;

    /**
     * Create a new controller instance.
     *
     * @param  
     * @return void
     */
    public function __construct(
        CreateProjectService $createProjectService,
        ProjectQueryService $projectQueryService,
        ProjectVisibilityService $projectVisibilityService,
        DeleteProjectService $deleteProjectService
    )
    {

        $this->createProjectService = $createProjectService;
        $this->projectQueryService = $projectQueryService;
        $this->projectVisibilityService = $projectVisibilityService;
        $this->deleteProjectService = $deleteProjectService;

        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function destroy($id)
    {
        $deleted = $this->deleteProjectService->delete($id);

        return redirect()->route('projects');
    }

    /**
     * Toggle the visibility of the resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleVisibility($id)
    {
        
        $this->projectVisibilityService->toggleVisibility($id);

        return redirect()->route('projects');
    }

}
