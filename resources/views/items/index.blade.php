@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center my-4">
            <h2 class="title-2 m-0">Item</h2>
            @can('create items')
            <a href="{{ route('items.create') }}" class="btn btn-primary m-0 ml-auto">+ New Item</a>
            @endcan
          </div>
          <form action="{{ route('items.index') }}" method="GET" class="d-flex">
            <div class="form-group flex-fill">
              <input type="text" autofocus class="form-control @error('name') is-invalid @enderror w-100" name="name" value="{{ $name }}" placeholder="Find item..." />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
            </div>
            <div class="form-group">
              <a href="{{ route('items.index') }}" role="button" class="btn btn-outline-secondary ml-2">Clear</a>
            </div>
          </form>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                @canany(['delete items', 'edit items'])
                <th scope="col">Action</th>
                @endcanany
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name ?? 'Undefined' }}</td>
                <td>{{ $item->created_at->format('m/d/Y') }}</td>
                <td>{{ $item->updated_at->format('m/d/Y') }}</td>
                <td class="d-flex">
                  @can('edit items')
                  <a role="button" class="btn btn-sm btn-warning mr-1" href="{{ route('items.edit', $item->id) }}">Edit</a>
                  @endcan
                  @can('delete items')
                  <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="{{ '#item-' . $item->id }}">Delete</button>
                  @endcan
                </td>
              </tr>

              <!-- Delete Modal -->
              <div class="modal fade" id="{{ 'item-' . $item->id }}" tabindex="-1" role="dialog" aria-labelledby="Item Modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="Item Modal">Delete Item</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure want delete {{ $item->name }}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

                      <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="m-0">
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

          {{ $items->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection