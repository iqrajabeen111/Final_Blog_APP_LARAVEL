@extends('layout.master')
@section('content')
<div class="container mt-4">
  <div class="row mb-4">
    <a class="btn btn-success" href="{{url('categorycreate')}}">Add Tasks</a>
  </div>
  <div class="row justify-content-md-center">
    <table class="table" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>

        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>

          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row justify-content-center">
      {{ $categories->links() }}
    </div>
</div>

@endsection