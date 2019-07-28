@extends('layouts.app')

@section('content')

<div class="container">

    INDEX

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

</div>

@endsection
