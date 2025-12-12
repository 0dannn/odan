@extends('layout')

@section('content')
<div class="py-4">
  <h1>Add Project</h1>

  <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="row g-3">
    @csrf

    <div class="col-12">
      <label class="form-label">Title</label>
      <input name="title" value="{{ old('title') }}" class="form-control" required>
    </div>

    <div class="col-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Link (optional)</label>
      <input name="link" value="{{ old('link') }}" class="form-control" placeholder="https://example.com">
    </div>

    <div class="col-md-6">
      <label class="form-label">Image (optional)</label>
      <input name="image" type="file" class="form-control">
    </div>

    <div class="col-12">
      <button class="btn btn-primary">Save project</button>
      <a href="{{ route('admin.projects.index') }}" class="btn btn-link">Cancel</a>
    </div>
  </form>
</div>
@endsection
