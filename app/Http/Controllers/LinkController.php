<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;


class LinkController extends Controller
{

    /**
     * Constructor for LinkController
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all()->sortByDesc('created_at');

        return view('link.index', ['links' => $links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		$validation = $request->validate([
			'link' => 'required'
		]);

		// Creation
        $link = new Link;
        $link->link = $request->link;
        $link->marked = false;
        $link->save();

        // Redirect
        return redirect('/link');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $link = Link::findOrFail($id);
        $link->delete();

        return redirect('/link');
    }

    public function mark($id)
    {

        $link = Link::findOrFail($id);
        $mark = $link->marked;
        $link->marked = !$mark;
        $link->save();

        return redirect('link');

    }


}
