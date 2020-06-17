@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h2 class="title-2 mb-4">Account Detail</h2>

          <form 
            action="{{ route('account.change_avatar') }}" 
            method="POST" 
            enctype="multipart/form-data" 
            id="changeAvatarForm"
          >
            @method('POST')
            @csrf
            <input 
              type="file" 
              class="d-none" 
              id="changeAvatarInput" 
              name="avatar" 
              onchange="event.preventDefault(); document.querySelector('#changeAvatarForm').submit()">
          </form>

          <div style="width: 200px; height: 200px" class="mx-auto text-center mb-5 rounded-circle">
            <img 
              class="w-100 h-100 rounded-circle mb-2" 
              style="object-fit: cover" 
              src="{{ $user->getFirstMediaUrl('avatar') }}" 
              alt="{{ $user->name }}" 
              onclick="event.preventDefault(); document.querySelector('#changeAvatarInput').click()">
            <small>Click avatar to change</small>
          </div>

          <div class="mb-3">
            <span class="mb-1 d-block">Name</span>
            <h3 class="h6 font-weight-bold">{{ $user->name }}</h3>
          </div>
          <div class="mb-3">
            <span class="mb-1 d-block">Email</span>
            <h3 class="h6 font-weight-bold">{{ $user->email }}</h3>
          </div>
          <div class="mb-3">
            <span class="mb-1 d-block">Role</span>
            <h3 class="h6 font-weight-bold">{{ $user->getRoleNames()[0] }}</h3>
          </div>

          <div class="d-flex justify-content-end">
            <a href="{{ route('account.edit') }}" class="btn btn-outline-primary">Edit Data</a>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection