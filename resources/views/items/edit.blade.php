@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h2 class="title-2 mb-4">Update Item</h2>

          <form action="{{ route('items.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
              <label for="name">Name</label>
            <input type="text" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $item->name }}" />
              @error('name')
              <small class="form-text text-muted">{{ $message }}</small>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" autofocus class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter description" value="{{ $item->description }}" />
              @error('description')
              <small class="form-text text-muted">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                <option value="">Choose category<option
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $item->category->id ? "selected" : "" }}>{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category')
              <small class="form-text text-muted">{{ $message }}</small>
              @enderror
            </div>

            <div class="d-flex align-items-center justify-content-end">
              <a role="button" href="{{ route('items.index') }}" class="btn btn-outline-secondary mr-2">Cancel</a>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection