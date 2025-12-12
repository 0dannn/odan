@extends('layout')

@section('content')
<div class="py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Portfolio</h1>
    <a href="{{ url('/admin/projects') }}" class="btn btn-sm btn-outline-secondary">Manage projects</a>
  </div>

  <div class="row g-4">
    @forelse($projects as $project)
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          @if($project->image)
            <img src="{{ asset('projects/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}">
          @else
            <img src="https://via.placeholder.com/600x300?text={{ urlencode($project->title) }}" class="card-img-top" alt="{{ $project->title }}">
          @endif

          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <div class="mt-auto">
              @if($project->link)
                <a href="{{ $project->link }}" class="btn btn-sm btn-primary" target="_blank" rel="noopener">View</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <p>No projects yet — go to <a href="{{ url('/admin/projects') }}">Admin → Projects</a> to add one.</p>
      </div>
    @endforelse
  </div>
</div>
@endsection
