<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'LearnHub - Online Learning Platform' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/">LearnHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/portfolio') }}">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
        </li>

        @if(session('is_admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/projects') }}">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.login') }}">Admin</a>
          </li>
        @endif
      </ul>

    </div>
  </div>
</nav>

<!-- Flash messages -->
@if(session('success'))
  <div class="container">
    <div class="alert alert-success mt-3" role="alert">
      {{ session('success') }}
    </div>
  </div>
@endif

@if($errors->any())
  <div class="container">
    <div class="alert alert-danger mt-3">
      <ul class="mb-0">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

@yield('content')

<footer class="mt-5 py-4">
  <div class="container text-center">
    <small>&copy; {{ date('Y') }} LearnHub. All rights reserved.</small>
  </div>
</footer>
</body>
</html>
