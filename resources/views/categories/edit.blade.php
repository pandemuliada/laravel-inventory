@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h2 class="title-2 mb-4">Update Category</h2>

          <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $category->name }}" name="name" />
              @error('name')
              <small class="form-text text-muted">{{ $message }}</small>
              @enderror
            </div>

            <div class="d-flex align-items-center justify-content-end">
              <a role="button" href="{{ route('categories.index') }}" class="btn btn-outline-secondary mr-2">Cancel</a>
              <button class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection