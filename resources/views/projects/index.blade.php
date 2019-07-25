@extends('layouts.app')

@section('content')
<div class="container">

    INDEX

    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Visibility</th>
                <th scope="col">Start Date</th>
                <th scope="col">Last Update Date</th>
                <th scopt="col">Tags</th>
                <th scope="col"></th>
                <th scope="col"></th>
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
                <td
                @if ($project->hidden == false)
                     class="bg-success"
                @endif
                >
                @if ($project->hidden == true)
                    Hidden
                @else
                    Visible
                @endif
                </td>
                <td>
                    {{ $project->start_date }}
                </td>
                <td>
                    {{ $project->last_update_date }}
                </td>
                <td>
                    @if ($project->tags != null)
                        @foreach ($project->tags as $tag)
                            {{ $tag->name }}, 
                        @endforeach
                    @endif
                    
                    TAGS
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('projecttag.show', ['id' => $project->id]) }}" >Edit tag</a>
                </td>
                <td>
                    <form action="/projects/{{ $project->id }}/toggle" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn 
                        @if ($project->hidden == true)
                         btn-warning
                        @else
                         btn-primary
                        @endif
                        ">
                            <i class="fa fa-plus"></i>
                            @if ($project->hidden == true)
                            Set as visible
                            @else
                            Set as hidden
                            @endif
                        </button>
                    </form>
                </td>
                
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>

</div>
@endsection