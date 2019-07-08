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

            <form method="POST" action="/tags">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <!-- Priority -->
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="text" name="priority" id="priority" class="form-control">
                </div>

                <!-- Color -->
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color" class="form-control">
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