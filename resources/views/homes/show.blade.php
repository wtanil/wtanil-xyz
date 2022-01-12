@extends('layouts.portfolio')

@section('content')

<div class="container">

    <div class="row">
        <div class="col">
            
            <h4 class="font-weight-bold">{{ $project->name }}</h3>
        </div>
        
    </div>

{{--
    <div class="row">
        <div class="col">Project Date: {{ \Carbon\Carbon::parse($project->start_date)->format('F Y') }}</div>
        <div class="col">Last Maintenance Date: {{ \Carbon\Carbon::parse($project->last_update_date)->format('F Y') }}</div>
    </div>
--}}

    <div class="row">
        <div class="col">
            @foreach ($project->tags->sortBy('priority') as $tag)
            <span class="badge badge-pill text-dark font-weight-light" style="background-color:#{{ $tag->color }};">{{ $tag->name }}</span>
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
