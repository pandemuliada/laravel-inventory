@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h2 class="title-2 mb-4">Category</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)

              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('m/d/Y') }}</td>
                <td>{{ $category->updated_at->format('m/d/Y') }}</td>
                <td>
                  <a role="button" class="btn btn-sm btn-warning mr-2" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection