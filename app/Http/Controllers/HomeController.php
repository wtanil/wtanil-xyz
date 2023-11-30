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

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $project = $this->projectQueryService->forId($id);
    //     if ($project == null) {
    //         return redirect()->route('home');
    //     }
    //     return view('homes.show')->with('project', $project);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = $this->projectQueryService->forSlug($slug);
        if ($project == null) {
            return redirect()->route('home');
        }
        return view('homes.show')->with('project', $project);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function showPrivacyPolicy($id)
    // {
    //     $project = $this->projectQueryService->forId($id);
    //     if ($project == null) {
    //         return redirect()->route('home');
    //     }
    //     return view('homes.privacypolicy')->with('project', $project);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function showPrivacyPolicy($slug)
    {
        $project = $this->projectQueryService->forSlug($slug);
        if ($project == null) {
            return redirect()->route('home');
        }
        return view('homes.privacypolicy')->with('project', $project);
    }
}
