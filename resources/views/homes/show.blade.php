@extends('layouts.portfolio')

@section('content')

<div class="container">

    <div class="row">
        <div class="col">

            <h4 class="font-weight-bold">{{ $project->name }}</h4>
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

        @foreach ($project->images as $image)

        <div class="col-3 col-md-1">
            <div class="img-thumb-medium-container m-1">
                <a href="{{ $image->high_res_url }}"><img class="rounded img-thumbnail img-fluid" src="{{ $image->low_res_url }}"></a>
            </div>
        </div>

        @endforeach
        
    </div>


    <div class="row">
        <div class="col">
            {!! nl2br(e($project->description)) !!}
        </div>
    </div>
                            
    @if ($project->privacy_policy != null)
    <div class ="row">
        <div class="col">
            <a href="{{ route('home.showPrivacyPolicy', ['id' => $project->id]) }}">Privacy Policy</a>
        </div>
    </div>
    @endif


</div>

@endsection
