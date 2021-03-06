@extends('layouts.main')


@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Ticket {{ $tickets->id }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>
        {{--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>--}}
        <form action="" method="post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="summary">Summary</label>
                <input type="text" class="form-control {{$errors->has('summary') ? 'is-invalid' : ''}}" id="summary" name="summary"  value="{{ old('summary' , $tickets->summary)  }}">


                @if( $errors->has('summary'))
                    <small id="summary" class="form-text text-muted">{{$errors->first('summary')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" name="description" value="{{ old('description' , $tickets->description) }}">

                @if( $errors->has('description'))
                    <small id="summary" class="form-text text-muted">{{$errors->first('description')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <select class="form-control " id="status" name="status"  value="{{ $tickets->status  }}">
                    <option value="Open" {{$tickets->status == "Open" ? "selected" : " "}}>Open</option>
                    <option value="Close" {{$tickets->status == "Close" ? "selected" : " "}}>Close</option>
                    <option value="In Progress" {{$tickets->status == "In Progress" ? "selected" : " "}}>In Progress</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" >Update</button>
            <a href="{{route('tickets.index')}}" class="btn btn-default">back</a>

        </form>
    </main>

@endsection
