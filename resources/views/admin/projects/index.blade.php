@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="fw-bold mb-1">Manage Courses</h2>
    <p class="text-muted mb-0">Create, edit, and manage your courses</p>
  </div>
  <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-2"></i>Add New Course
  </a>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body">
    @if($projects->isEmpty())
      <div class="text-center py-5">
        <i class="bi bi-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
        <p class="text-muted mt-3">No courses yet. Create your first course!</p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mt-2">
          <i class="bi bi-plus-circle me-2"></i>Add Course
        </a>
      </div>
    @else
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="table-light">
            <tr>
              <th style="width: 120px">Preview</th>
              <th>Title</th>
              <th>Description</th>
              <th>Link</th>
              <th>Created</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($projects as $p)
            <tr>
              <td>
                @if($p->image)
                  <img src="{{ asset('projects/' . $p->image) }}" alt="{{ $p->title }}" class="img-thumbnail" style="max-width:100px; height:auto;">
                @else
                  <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width:100px; height:60px;">
                    <i class="bi bi-image text-muted"></i>
                  </div>
                @endif
              </td>
              <td>
                <strong>{{ $p->title }}</strong>
              </td>
              <td>
                <small class="text-muted">{{ Str::limit($p->description ?? 'No description', 50) }}</small>
              </td>
              <td>
                @if($p->link)
                  <a href="{{ $p->link }}" target="_blank" class="text-primary">
                    <i class="bi bi-box-arrow-up-right"></i>
                  </a>
                @else
                  <span class="text-muted">-</span>
                @endif
              </td>
              <td>
                <small class="text-muted">{{ $p->created_at->format('M d, Y') }}</small>
              </td>
              <td class="text-end">
                <div class="d-flex gap-2 justify-content-end">
                  <a href="{{ route('enroll.course', $p->id) }}" class="btn btn-sm btn-outline-info" target="_blank" title="View Course">
                    <i class="bi bi-eye"></i> View
                  </a>
                  <a href="{{ route('admin.projects.edit', $p) }}" class="btn btn-sm btn-outline-primary" title="Edit Course">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Course">
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</div>
@endsection
