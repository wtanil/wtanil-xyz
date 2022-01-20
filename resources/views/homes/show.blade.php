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

    @if ($project->links != null)
    <div class="row mt-2">
        <div class="col">
            {!! html_entity_decode($project->links) !!}
        </div>
    </div>
    
    @endif

    <div class="row mt-2 mb-2">
        <div class="col">
            {!! nl2br(e($project->description)) !!}
        </div>
    </div>


    <div class="row">

        @foreach ($project->images->sortBy('priority') as $image)

        <div class="col-3 col-md-1">
            <div class="img-thumb-medium-container m-0">
                <!-- <a href="{{ $image->high_res_url }}"><img class="rounded img-thumbnail img-fluid" src="{{ $image->low_res_url }}"></a> -->

                <figure class="figure">
                    <a href="{{ $image->high_res_url }}"><img class="rounded figure-img img-fluid" src="{{ $image->low_res_url }}"></a>
                    <figcaption class="figure-caption">{{ $image->subtitle }}</figcaption>
                </figure>
            </div>

        </div>

        @endforeach
        
    </div>


    
                            
    @if ($project->privacy_policy != null)
    <div class ="row">
        <div class="col">
            <a href="{{ route('home.showPrivacyPolicy', ['id' => $project->id]) }}"><span class="small">Privacy Policy</span></a>
        </div>
    </div>
    @endif


</div>

@endsection
