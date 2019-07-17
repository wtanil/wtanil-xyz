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
                    {{ $project->start_date }}
                </td>
                <td>
                    {{ $project->last_update_date }}
                </td>
                
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>

</div>

@endsection
