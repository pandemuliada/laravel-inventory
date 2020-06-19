@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center my-4">
            <h2 class="title-2 m-0">Category</h2>
            @can('create categories')
            <a href="{{ route('categories.create') }}" class="btn btn-primary m-0 ml-auto">+ New Category</a>
            @endcan
          </div>
          <form action="{{ route('categories.index') }}" method="GET" class="d-flex">
            <div class="form-group flex-fill">
              <input type="text" autofocus class="form-control @error('name') is-invalid @enderror w-100" name="name" value="{{ $name }}" placeholder="Find category..." />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
            </div>
            <div class="form-group">
              <a href="{{ route('categories.index') }}" role="button" class="btn btn-outline-secondary ml-2">Clear</a>
            </div>
          </form>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                @canany(['delete categories', 'edit categories'])
                <th scope="col">Action</th>
                @endcanany
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('m/d/Y') }}</td>
                <td>{{ $category->updated_at->format('m/d/Y') }}</td>
                @canany(['delete categories', 'edit categories'])
                <td class="d-flex">
                  @can('edit categories')
                  <a role="button" class="btn btn-sm btn-warning mr-1" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                  @endcan
                  @can('delete categories')
                  <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="{{ '#category-' . $category->id }}">Delete</button>
                  @endcan
                </td>
                @endcanany
              </tr>

              <!-- Delete Modal -->
              <div class="modal fade" id="{{ 'category-' . $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Delete Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure want delete {{ $category->name }}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

                      <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="m-0">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                          Delete
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Delete Modal -->
              @endforeach
            </tbody>
          </table>

          {{ $categories->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection