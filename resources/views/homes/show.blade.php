@extends('layouts.portfolio')

@section('content')

<div class="container container-body">

    <div class="row padding-row">
        <div class="col">

            <h4>{{ $project->name }}</h4>
        </div>

    </div>

    {{--
    <div class="row">
        <div class="col">Project Date: {{ \Carbon\Carbon::parse($project->start_date)->format('F Y') }}</div>
        <div class="col">Last Maintenance Date: {{ \Carbon\Carbon::parse($project->last_update_date)->format('F Y') }}</div>
    </div>
    --}}
    {{--
    <div class="row">
        <div class="col">
            @foreach ($project->tags->sortBy('priority') as $tag)
            <span class="badge badge-pill text-dark font-weight-light" style="background-color:#{{ $tag->color }};">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
    --}}

    @if ($project->links != null)
    <div class="row">
        <div class="col">
            {!! html_entity_decode($project->links) !!}
        </div>
    </div>
    
    @endif

    @if ($project->images != null)
    <div class="row">

        @foreach ($project->images->sortBy('priority') as $image)
        @if ($image->priority != 0)
        <div class="col-4 col-sm-2 text-center">
            <a href="{{ $image->high_res_url }}" target="_blank"><img class="rounded img-project-show-thumb" src="{{ $image->low_res_url }}"></a>
        </div>
        @endif
        @endforeach
    </div>
    @endif

    <div class="row mt-2 mb-2">
        <div class="col">
            {!! html_entity_decode($project->description) !!}

        </div>
    </div>

    @if ($project->privacy_policy != null)
    <div class ="row">
        <div class="col">
            <a href="{{ route('home.showPrivacyPolicy', ['slug' => $project->slug]) }}"><span class="small">Privacy Policy</span></a>
        </div>
    </div>
    @endif

</div>

@endsection
