<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Services\CreateTagService;
use App\Services\DeleteTagService;
use App\Services\TagQueryService;


class TagController extends Controller
{

    /**
     * The tag service instance.
     *
     * @var 
     */
    protected $createTagService;
    protected $deleteTagService;
    protected $tagQueryService;

    /**
     * Create a new controller instance.
     *
     * @param  
     * @return void
     */
    public function __construct(
        CreateTagService $createTagService,
        DeleteTagService $deleteTagService,
        TagQueryService $tagQueryService
    )
    {

        $this->createTagService = $createTagService;
        $this->deleteTagService = $deleteTagService;
        $this->tagQueryService = $tagQueryService;

        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tags = $this->tagQueryService->getAll();
        
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return page to create
        return view('tags.create');
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
            'priority' => 'required|between:1,10|numeric',
            'color' => 'required|between:3,6'
        ]);

        $this->createTagService->create($request->all());
        // redirect to tag index page
        return redirect()->route('tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deleted = $this->deleteTagService->delete($id);

        if ($deleted)
        {
            return redirect()->route('tags')->with('deleteCount', $deleted);
        }
        else
        {
            $deleteMessage = 'Failed to delete tag with id ' . $id;
            return redirect()->route('tags')->with('deleteFailed', $deleteMessage);
        }

        
    }
}
