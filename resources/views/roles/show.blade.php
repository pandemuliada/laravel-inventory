@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h2 class="title-2 mb-4">Role Detail</h2>
          <div>
            <p>Role name : {{ $role->name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection