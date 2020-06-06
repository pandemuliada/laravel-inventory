@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center my-4">
            <h2 class="title-2 m-0">Role</h2>
            @can('create roles')
            <a href="{{ route('roles.create') }}" class="btn btn-primary m-0 ml-auto">+ New Role</a>
            @endcan
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Guard</th>
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
                <td>{{ $role->guard_name }}</td>
                <td>{{ $role->created_at->format('m/d/Y') }}</td>
                <td>{{ $role->updated_at->format('m/d/Y') }}</td>
                <td>
                  <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-outline-primary" role="button">
                    Detail
                  </a>
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