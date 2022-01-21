@extends('layouts.app')

@section('content')
<div class="container">

    @if (isset($deleteCount))
    <div class="row">
        <div class="alert alert-success" role="alert">
            {{ $deleteCount }}
        </div>
    </div>
    @endif

    @if (isset($deleteFailed))
    <div class="row">
        <div class="alert alert-danger" role="alert">
            {{ $deleteFailed }}
        </div>
    </div>
    @endif

    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tags</th>
                <th scope="col">Priority</th>
                <th scope="col">Color</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @if ($tags->isNotEmpty())
            @foreach ($tags as $tag)

            <tr>

                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    {{ $tag->name }}
                </td>
                <td>
                    {{ $tag->priority }}
                </td>
                <td style="background-color: #{{ $tag->color }};">
                    {{ $tag->color }}
                </td>
                <td>
                    <form action="/tags/{{ $tag->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Add Category Button -->
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-plus"></i>X
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