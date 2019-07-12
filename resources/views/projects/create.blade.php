@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
    <div class="row">
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col">

            <form method="POST" action="/projects">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label class="col-form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="col-form-label" for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                </div>

                <!-- Hidden -->
                <fieldset class="form-group">
                    <legend class="col-form-label">Hidden</legend>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hidden" id="hidden1" value=true checked>
                        <label class="form-check-label" for="gridRadios1">True</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hidden" id="hidden2" value=false>
                        <label class="form-check-label" for="gridRadios1">False</label>
                    </div>
                </fieldset>

                <!-- Start Date -->
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label class="col-form-label" for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                </div>

                <!-- Last Update Date -->
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label class="col-form-label" for="last_update_date">Last Update Date</label>
                        <input type="date" name="last_update_date" id="last_update_date" class="form-control">
                    </div>
                </div>

                <!-- Add -->
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection