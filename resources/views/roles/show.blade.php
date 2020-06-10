@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h2 class="title-2 mb-4">Role Detail</h2>
          <div>
            <p>Name : <b>{{ $role->name }}</b></p>
          </div>

          <hr class="my-4"/>
          <h3 class="h4 mb-4">Permissions</h3>
          <div class="d-flex flex-wrap justify-content-start">
            @foreach ($permissions as $permission)
            <div class="border border-gray rounded d-flex align-items-center py-1 px-2 mr-2 mb-2">
              <input 
                id="{{ 'id-' . $permission->id }}" 
                type="checkbox" 
                name="roles[]" 
                value="{{ $permission->name }}" 
                disabled
                @if (in_array($permission->id, $active_permissions))
                  {{ 'checked' }}
                @endif
                @if ($role->name == 'super-admin')
                  {{'checked'}}
                @endif
              >
                <label for="{{ 'id-' . $permission->id}}" class="m-0 ml-2">{{ $permission->name }}</label>
              </div>
            @endforeach
          </div>

          @if ($role->name != 'super-admin')
          <div class="text-right">
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-primary mt-4">Edit Role</a>
          </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection