@extends('layout.master')

@section('content')

<div class="container mt-4">

    <div class="row col-lg-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Post</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
    @if (session('message'))
    <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif


    <form action="{{ route('post-store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @if ($errors->has('title'))
                    <strong style="color:red;">{{ $errors->first('title') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" class="form-control" placeholder="Slug">
                    @if ($errors->has('slug'))
                    <strong style="color:red;">{{ $errors->first('slug') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categories:</strong>
                    <select name="category" id="category">
                        <option value="0">select</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                    <strong style="color:red;">{{ $errors->first('category') }}.</strong>
                    @endif

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <strong>Image Upload:</strong>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                            <strong style="color:red;">{{ $errors->first('image') }}.</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>

                    <textarea class="ckeditor form-control" name="description"></textarea>
                    @if ($errors->has('description'))
                    <strong style="color:red;">{{ $errors->first('description') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="row col-lg-12">


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

    </form>
</div>
@endsection

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>