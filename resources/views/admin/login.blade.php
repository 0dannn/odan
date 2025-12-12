@extends('layout')

@section('content')
<section class="admin-login-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="login-card scroll-animate">
          <div class="text-center mb-4">
            <div class="admin-logo mb-3">
              <div class="logo-circle">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <h2 class="fw-bold mb-2">Admin Login</h2>
            <p class="text-muted">Enter your password to access the admin panel</p>
          </div>

          @if($errors->any())
            <div class="alert alert-danger">
              <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
            </div>
          @endif

          <form method="POST" action="{{ route('admin.login.post') }}" id="adminLoginForm">
            @csrf

            <div class="mb-4">
              <label class="form-label fw-bold">
                <i class="bi bi-key me-2"></i>Password
              </label>
              <input 
                name="password" 
                type="password" 
                class="form-control form-control-lg" 
                required
                placeholder="Enter admin password"
                autofocus
              >
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
              <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>

            <div class="text-center">
              <a href="{{ url('/') }}" class="text-muted text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i>Back to website
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
