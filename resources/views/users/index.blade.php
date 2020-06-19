@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center my-4">
            <h2 class="title-2 m-0">User</h2>
            @can('create users')
            <a href="{{ route('users.create') }}" class="btn btn-primary m-0 ml-auto">+ New User</a>
            @endcan
          </div>
          <form action="{{ route('users.index') }}" method="GET" class="d-flex">
            <div class="form-group flex-fill">
              <input type="text" autofocus class="form-control @error('name') is-invalid @enderror w-100" name="name" value="{{ $name }}" placeholder="Find user..." />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
            </div>
            <div class="form-group">
              <a href="{{ route('users.index') }}" role="button" class="btn btn-outline-secondary ml-2">Clear</a>
            </div>
          </form>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                @canany(['delete users', 'edit users'])
                <th scope="col">Action</th>
                @endcanany
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->roles[0]->name }}</td>
                <td>{{ $user->created_at->format('m/d/Y') }}</td>
                <td>{{ $user->updated_at->format('m/d/Y') }}</td>
                @can('read users')
                <td class="d-flex">
                  <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{ route('users.show', $user->id) }}">Detail</a>
                </td>
                @endcan
              </tr>

              <!-- Delete Modal -->
              <div class="modal fade" id="{{ 'user-' . $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Delete User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure want delete {{ $user->name }}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="m-0">
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

          {{ $users->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection