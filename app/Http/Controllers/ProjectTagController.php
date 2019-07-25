<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProjectTagService;
use App\Services\ProjectQueryService;

class ProjectTagController extends Controller
{

    /**
     * The project service instance.
     *
     * @var 
     */
    protected $projectTagService;
    protected $projectQueryService;

    /**
     * Create a new controller instance.
     *
     * @param  
     * @return void
     */
    public function __construct(
        ProjectTagService $projectTagService,
        ProjectQueryService $projectQueryService
    )
    {

        $this->projectTagService = $projectTagService;
        $this->projectQueryService = $projectQueryService;
    
        $this->middleware('auth');
    }
    
    /**
     * Attach tag(s) to a project
     *
     * @param  
     * @param   
     * @return \Illuminate\Http\Response
     */
    public function attach($id, Request $request)
    {
        $changes = $this->projectTagService->attach($id, $request->input('tagIds'));

        return redirect()->route('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project = $this->projectQueryService->forId($id);

        return view('projecttag.show')->with($project);
    }

    
}
