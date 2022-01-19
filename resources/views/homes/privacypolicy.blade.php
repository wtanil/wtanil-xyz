@extends('layouts.portfolio')

@section('content')

<div class="container">

    <div class="row">
        <div class="col">
            {!! html_entity_decode($project->privacy_policy) !!}
        </div>
    </div>

</div>

@endsection
