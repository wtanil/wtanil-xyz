@extends('layouts.portfolio')

@section('content')

<div class="container">

    @if ($projects->isNotEmpty())
    @foreach ($projects as $project)

    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">@if ($project->tags != null)
                        @foreach ($project->tags as $tag)
                        <a href="/"><span class="badge badge-pill badge-info">{{ $tag->name }}</span></a>
                        @endforeach
                    @endif</h6>
                    <p class="card-text">{{ $project->description }}</p>
                </div>
            </div>

        </div>
    </div>

    @endforeach
    @endif


<!-- <div class="row">


    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">Last Update Date</th>
                <th scope="col">Tags</th>
            </tr>
        </thead>
        <tbody>

            @if ($projects->isNotEmpty())
            @foreach ($projects as $project)

            <tr>

                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    {{ $project->name }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($project->start_date)->format('F Y') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($project->last_update_date)->format('F Y') }}
                </td>
                <td>
                    @if ($project->tags != null)
                    @foreach ($project->tags as $tag)
                    <a href="/"><span class="badge badge-pill badge-info">{{ $tag->name }}</span></a>
                    @endforeach
                    @endif
                </td>

            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div> -->

</div>

@endsection
