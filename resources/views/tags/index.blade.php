@extends('layouts.app')

@section('content')
<div class="container">

    @if ($tags->isNotEmpty())
    @foreach ($tags as $tag)

    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tags</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    {{ $tag->name }}
                </td>
                <td>
                    Empty
                </td>

            </tr>
            

        </tbody>
    </table>

    @endforeach
    @endif




</div>
@endsection