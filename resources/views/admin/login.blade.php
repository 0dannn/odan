@extends('layout')

@section('content')
<div class="py-5" style="max-width:480px; margin:0 auto;">
  <h3 class="mb-3 text-center">Admin Login</h3>

  @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('admin.login.post') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input name="password" type="password" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between align-items-center">
      <button class="btn btn-primary">Login</button>
      <a class="btn btn-link" href="{{ url('/') }}">Back to site</a>
    </div>
  </form>
</div>
@endsection
