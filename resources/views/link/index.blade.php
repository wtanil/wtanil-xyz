@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <form action="/link" method="POST" class="col-sm">
            {{ csrf_field() }}

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Link -->
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control">
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

    <div class="row">

        @if ($links->isNotEmpty())

        <div class="col-sm">
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Link</th>
                        <th scope="col">Mark</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)

                    <tr 
                    @if ($link->marked == true)
                    class="bg-success"
                    @endif
                    >
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <input type="text" value="{{ $link->link }}">
                        </td>
                        <td>
                            <form action="/link/{{ $link->id }}/mark" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>
                                    @if ($link->marked == true)
                                    Unmark
                                    @else
                                    Mark
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="/link/{{ $link->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-plus"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            

        </table>
    </div>
    @endif
</div>

</div>
@endsection
