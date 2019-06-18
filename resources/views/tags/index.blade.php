@extends('layouts.app')

@section('content')

@if ($tags->isNotEmpty())

    @foreach ($tags as $tag)
        <div class="container">
            <div class="row">
                <div class="col">
                    {{ $tag->id }}
                </div>
                <div class="col">
                    {{ $tag->name }}
                </div>
                <div class="col">
                    {{ $tag->priority }}
                </div>
                <div class="col" style="background-color: #{{ $tag->color }}; margin: 10px;">
                    {{ $tag->color }}
                </div>
            </div>
        </div>
    @endforeach

@endif

@endsection