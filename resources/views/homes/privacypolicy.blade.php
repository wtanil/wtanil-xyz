@extends('layouts.portfolio')

@section('content')

<div class="container container-body">

    <div class="row padding-row">
        <div class="col">
            {!! html_entity_decode($project->privacy_policy) !!}
        </div>
    </div>

</div>

@endsection
