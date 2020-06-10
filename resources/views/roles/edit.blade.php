@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @method('PUT')
            @csrf
            <h2 class="title-2 mb-4">Edit Role</h2>
            <div class="form-group">
              <label for="roleNameInput">Name</label>
              <input name="role" type="text" class="form-control @error('role') is-invalid @enderror" id="roleNameInput" placeholder="Role Name" value="{{ $role->name }}">
              @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <hr class="my-4"/>
            
            <h3 class="h4 mb-4">Permissions</h3>
            
            <div class="d-flex flex-wrap justify-content-start">
              @foreach ($permissions as $permission)
                <div class="border border-gray rounded d-flex align-items-center py-1 px-2 mr-2 mb-2">
                <input 
                  id="{{ 'id-' . $permission->id }}" 
                  type="checkbox" 
                  name="permissions[]" 
                  value="{{ $permission->name }}" 
                  @if (in_array($permission->id, $active_permissions))
                    {{ 'checked' }}
                  @endif
                >
                  <label for="{{ 'id-' . $permission->id}}" class="m-0 ml-2">{{ $permission->name }}</label>
                </div>
              @endforeach
            </div>

            <div class="text-right">
              <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-secondary mt-4">Cancel</a>
              <button type="submit" class="btn btn-primary mt-4">Save</a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection