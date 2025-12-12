<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - {{ $title ?? 'LearnHub' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .admin-sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            padding: 0;
        }
        .admin-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: #60a5fa;
        }
        .admin-content {
            background: #f8f9fa;
            min-height: 100vh;
        }
        .admin-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 2rem;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="admin-sidebar" style="width: 250px;">
        <div class="p-4 border-bottom border-secondary">
            <h4 class="mb-0 fw-bold">LearnHub Admin</h4>
            <small class="text-white-50">Control Panel</small>
        </div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                <i class="bi bi-book me-2"></i>Courses
            </a>
            <a class="nav-link {{ request()->routeIs('admin.enrollments') ? 'active' : '' }}" href="{{ route('admin.enrollments') }}">
                <i class="bi bi-people me-2"></i>Enrollments
            </a>
            <a class="nav-link {{ request()->routeIs('admin.payments') ? 'active' : '' }}" href="{{ route('admin.payments') }}">
                <i class="bi bi-credit-card me-2"></i>Payments
            </a>
            <a class="nav-link {{ request()->routeIs('admin.contacts') ? 'active' : '' }}" href="{{ route('admin.contacts') }}">
                <i class="bi bi-envelope me-2"></i>Messages
            </a>
            <a class="nav-link {{ request()->routeIs('admin.logs') ? 'active' : '' }}" href="{{ route('admin.logs') }}">
                <i class="bi bi-file-text me-2"></i>Logs
            </a>
            <div class="mt-auto p-3 border-top border-secondary">
                <a class="nav-link" href="{{ route('admin.logout') }}">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="admin-content flex-grow-1">
        <div class="admin-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">{{ $title ?? 'Admin Panel' }}</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ url('/') }}" class="btn btn-sm btn-outline-secondary" target="_blank">
                    <i class="bi bi-box-arrow-up-right me-1"></i>View Site
                </a>
                <a href="{{ route('admin.logout') }}" class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </a>
            </div>
        </div>

        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

