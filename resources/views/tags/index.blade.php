@extends('layouts.app')

@section('content')
<div class="container">

    INDEX

    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tags</th>
                <th scope="col">Priority</th>
                <th scope="col">Color</th>
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
                <td>
                    {{ $tag->color }}
                </td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>

</div>
@endsection