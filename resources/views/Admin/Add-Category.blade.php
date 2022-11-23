@extends('layout.master')

@section('content')

<div class="container mt-4">

    <div class="row col-lg-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Category</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
    @if (session('message'))
    <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif
  

    <form action="{{ route('categorystore') }}" method="POST">

        @csrf
        <div class="row col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name">
                    @if ($errors->has('name'))
                        <strong style="color:red;">{{ $errors->first('name') }}.</strong>
                    @endif
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-success" href="{{route('categoryindex')}}">Back</a>

            </div>
        </div>

    </form>
</div>
@endsection