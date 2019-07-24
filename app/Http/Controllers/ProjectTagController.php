<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProjectTagService;

class ProjectTagController extends Controller
{

    /**
     * The project service instance.
     *
     * @var 
     */
    protected $projectTagService;

    /**
     * Create a new controller instance.
     *
     * @param  
     * @return void
     */
    public function __construct(
        ProjectTagService $projectTagService
    )
    {

        $this->projectTagService = $projectTagService;
    
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

    
}
