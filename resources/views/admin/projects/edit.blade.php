@extends('layout')

@section('content')
<div class="py-4">
  <h1>Edit Project</h1>

  <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="row g-3">
    @csrf
    @method('PUT')

    <div class="col-12">
      <label class="form-label">Title</label>
      <input name="title" value="{{ old('title', $project->title) }}" class="form-control" required>
    </div>

    <div class="col-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="4">{{ old('description', $project->description) }}</textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Link (optional)</label>
      <input name="link" value="{{ old('link', $project->link) }}" class="form-control" placeholder="https://example.com">
    </div>

    <div class="col-md-6">
      <label class="form-label">Image (replace)</label>
      <input name="image" type="file" class="form-control">
      @if($project->image)
        <div class="mt-2">
          <img src="{{ asset('projects/' . $project->image) }}" alt="" style="max-width:150px;">
        </div>
      @endif
    </div>

    <div class="col-12">
      <button class="btn btn-primary">Update project</button>
      <a href="{{ route('admin.projects.index') }}" class="btn btn-link">Cancel</a>
    </div>
  </form>
</div>
@endsection
