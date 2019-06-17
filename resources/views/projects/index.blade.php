@extends('layouts.app')

@section('content')

@if ($projects->isNotEmpty())

	@foreach ($projects as $project)
		<div class="container">
			<div class="row">
				<div class="col">
					{{ $project->id }}
				</div>
				<div class="col">
					{{ $project->name }}
				</div>
				<div class="col">
					{{ $project->description }}
				</div>
				<div class="col">
					{{ $project->hidden }}
				</div>
				<div class="col">
					{{ $project->started_date }}
				</div>
				<div class="col">
					{{ $project->last_update_date }}
				</div>
			</div>
		</div>
	@endforeach

@endif




@endsection