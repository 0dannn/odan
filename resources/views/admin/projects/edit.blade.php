@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="fw-bold mb-1">Edit Course</h2>
    <p class="text-muted mb-0">Update course information</p>
  </div>
  <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left me-2"></i>Back to Courses
  </a>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" id="courseForm">
      @csrf
      @method('PUT')

      <div class="row g-3">
        <div class="col-12">
          <label class="form-label fw-bold">
            Course Title <span class="text-danger">*</span>
          </label>
          <input 
            name="title" 
            value="{{ old('title', $project->title) }}" 
            class="form-control form-control-lg" 
            required
            placeholder="e.g., Complete Web Development Bootcamp"
          >
          @error('title')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label class="form-label fw-bold">Description</label>
          <textarea 
            name="description" 
            class="form-control" 
            rows="5"
            placeholder="Describe what students will learn in this course..."
          >{{ old('description', $project->description) }}</textarea>
          <small class="text-muted">Provide a detailed description of the course content and learning outcomes.</small>
          @error('description')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label fw-bold">
            Course Link <span class="text-muted">(Optional)</span>
          </label>
          <input 
            name="link" 
            value="{{ old('link', $project->link) }}" 
            class="form-control" 
            type="url"
            placeholder="https://example.com/course"
          >
          <small class="text-muted">Link to course preview or external resource.</small>
          @error('link')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label fw-bold">
            Course Image <span class="text-muted">(Optional)</span>
          </label>
          <input 
            name="image" 
            type="file" 
            class="form-control"
            accept="image/*"
          >
          <small class="text-muted">Upload a new image to replace the current one. Max file size: 2MB.</small>
          @error('image')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
          
          @if($project->image)
            <div class="mt-3">
              <label class="form-label small">Current Image:</label>
              <div class="border rounded p-2 d-inline-block">
                <img src="{{ asset('projects/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail" style="max-width:200px; height:auto;">
              </div>
            </div>
          @endif
        </div>

        <div class="col-12">
          <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            <strong>Note:</strong> Changes will be reflected immediately on the courses page.
          </div>
        </div>

        <div class="col-12">
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="bi bi-check-circle me-2"></i>Update Course
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
