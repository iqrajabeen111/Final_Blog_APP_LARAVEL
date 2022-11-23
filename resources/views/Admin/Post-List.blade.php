@extends('layout.master')
@section('content')
<div class="container mt-4">
  <div class="row mb-4">
    <a class="btn btn-success" href="{{route('post-create')}}">Add Post</a>
  </div>
  <div class="row justify-content-md-center">
    <!-- <div class="row"> -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Slug</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
        
        <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->slug }}</td>
          <td>{{ $post->description }}</td>
          <td>

          {{$post->categories->implode('title', ', ')}}
            
          {{--@foreach($post->categories as $category)  
         
          $collection = Str::of($category->title)->explode(' ')
        @endforeach--}}
        </td>
        
        <td>
            <form action="{{ route('post-delete',$post->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
          <td>
            <form action="{{ route('post-edit', [$post->id])}}" method="GET">
              @csrf
              <button class="btn btn-danger" type="submit">Edit</button>
            </form>
          </td>
        </tr>
        @endforeach
        @stop
      </tbody>
    </table>
  </div>
</div>