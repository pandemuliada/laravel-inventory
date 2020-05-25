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
                  <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="{{ '#category-' . $category->id }}">Delete</button>
                </td>
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

          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection