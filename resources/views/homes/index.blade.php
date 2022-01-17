@extends('layouts.portfolio')

@section('content')

<div class="container">

    <div class="row">
        <h3 class="font-weight-bold">Projects</h3>
    </div>


    @if ($projects->isNotEmpty())
    @foreach ($projects as $project)

    <div class="row">
        <div class="col-12">
            <div class="card my-0 border-0">
                <div class="card-body">

                    <h5 class="card-title font-weight-bold"><a href="{{ route('home.show', ['id' => $project->id]) }}" >{{ $project->name }}</a></h5>
                    
                    <div class="row">
                        <div class="col-1">
                            <a href="{{ route('home.show', ['id' => $project->id]) }}"><img class="rounded center-block img-thumb-small" src="{{$project->thumbnail->low_res_url}}"></a>
                        </div>

                        <div class="col-11">
                            <h6 class="card-subtitle mb-2 text-muted">@if ($project->tags != null)
                                @foreach ($project->tags->sortBy('priority') as $tag)
                                <span class="badge badge-pill text-dark font-weight-light" style="background-color:#{{ $tag->color }};">{{ $tag->name }}</span>
                                @endforeach
                            @endif</h6>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                        
                    </div>

                    
                    
                    
                </div>
            </div>

        </div>
    </div>

    @endforeach
    @endif


</div>

@endsection
