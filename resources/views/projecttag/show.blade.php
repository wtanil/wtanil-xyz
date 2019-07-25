@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col">

            <form method="POST" action="/projects/{{ $project->id }}/tags">
                @csrf



                <!-- Tags -->
                @foreach ($tags as $tag)

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tagIds{{ $loop->iteration }}"name="tagIds[]" 
                        @if ($projectTagIds->contains($tag->id))
                        checked
                        @endif
                        >
                        <label class="form-check-label" for="tagIds{{ $loop->iteration }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                
                @endforeach


                <!-- Sync -->
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Sync
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection