@extends('layouts.app')

@section('content')

<div class="container">

    SHOW


    <div class="row">
        <div class="col">
            {{ $project->name }}
        </div>
        
    </div>

    <div class="row">
        <div class="col">Project Date: {{ $project->start_date }}</div>
        <div class="col">Last Maintenance Date: {{ $project->last_update_date }}</div>

    </div>

    <div class="row">
        <div class="col">
            @foreach ($project->tags as $tag)
                <a href="/"><span class="badge badge-pill badge-info">{{ $tag->name }}</span></a>
            @endforeach
        </div>
        
    </div>

    <div class="row">
        <div class="col">
            {{ $project->description }}
        </div>
    </div>
    


</div>

@endsection
