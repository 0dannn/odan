@extends('layout')

@section('content')
<div class="py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Manage Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add project</a>
  </div>

  @if($projects->isEmpty())
    <div class="alert alert-info">No projects yet.</div>
  @else
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Preview</th>
          <th>Title</th>
          <th>Link</th>
          <th>Created</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($projects as $p)
        <tr>
          <td style="width:120px">
            @if($p->image)
              <img src="{{ asset('projects/' . $p->image) }}" alt="" style="max-width:110px; height:auto;">
            @endif
          </td>
          <td>{{ $p->title }}</td>
          <td>{{ $p->link ? $p->link : '-' }}</td>
          <td>{{ $p->created_at->format('Y-m-d') }}</td>
          <td class="text-end">
            <a href="{{ route('admin.projects.edit', $p) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

            <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete this project?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
