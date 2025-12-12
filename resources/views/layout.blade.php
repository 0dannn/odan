<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'My Website' }}</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body { padding-top: 72px; }
      footer { background: #f8f9fa; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/">My Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/portfolio') }}">     Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">       Contact</a></li>

      @if(session('is_admin'))
      <li class="nav-item"><a class="nav-link" href="{{ url('/admin/projects') }}">Manage</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.logout') }}">    Logout</a></li>
      @else
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">   Admin</a></li>
        @endif
      </ul>

    </div>
  </div>
</nav>

<div class="container">
    <!-- Flash messages -->
    @if(session('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger mt-3">
        <ul class="mb-0">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
</div>

<footer class="mt-5 py-4">
  <div class="container text-center">
    <small>&copy; {{ date('Y') }} My Website</small>
  </div>
</footer>

<!-- Bootstrap JS bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
