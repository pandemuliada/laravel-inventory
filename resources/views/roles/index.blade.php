@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center my-4">
            <h2 class="title-2 m-0">Role</h2>
            <a href="{{ route('roles.create') }}" class="btn btn-primary m-0 ml-auto">+ New Role</a>
          </div>
          {{-- <form action="{{ route('roles.index') }}" method="GET" class="d-flex">
          <div class="form-group flex-fill">
            <input type="text" autofocus class="form-control @error('name') is-invalid @enderror w-100" name="name" value="{{ $name }}" placeholder="Find role..." />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
          </div>
          <div class="form-group">
            <a href="{{ route('roles.index') }}" role="button" class="btn btn-outline-secondary ml-2">Clear</a>
          </div>
          </form> --}}
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
              @foreach ($roles as $role)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at->format('m/d/Y') }}</td>
                <td>{{ $role->updated_at->format('m/d/Y') }}</td>
                <td>
                  <a href="{{ route('roles.show', $role->id) }}"></a>
                  <button class="btn btn-sm btn-outline-primary">Detail</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{ $roles->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection