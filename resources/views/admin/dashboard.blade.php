@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Dashboard</h2>
    <p class="text-muted">Welcome to the admin panel. Here's an overview of your platform.</p>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Courses</h6>
                        <h2 class="mb-0 fw-bold text-primary">{{ $stats['total_projects'] }}</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-book text-primary" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Enrollments</h6>
                        <h2 class="mb-0 fw-bold text-success">{{ $stats['total_enrollments'] }}</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-people text-success" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Payments</h6>
                        <h2 class="mb-0 fw-bold text-warning">{{ $stats['total_payments'] }}</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-credit-card text-warning" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Messages</h6>
                        <h2 class="mb-0 fw-bold text-info">{{ $stats['total_contacts'] }}</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-envelope text-info" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Enrollments -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-people me-2"></i>Recent Enrollments
                </h5>
            </div>
            <div class="card-body">
                @if(empty($stats['recent_enrollments']))
                    <p class="text-muted mb-0">No enrollments yet.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Course</th>
                                    <th>Student</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_enrollments'] as $enrollment)
                                    @php
                                        $parts = explode(' | ', $enrollment);
                                        $course = '';
                                        $name = '';
                                        foreach ($parts as $part) {
                                            if (strpos($part, 'Course:') === 0) $course = trim(str_replace('Course:', '', $part));
                                            if (strpos($part, 'Name:') === 0) $name = trim(str_replace('Name:', '', $part));
                                        }
                                    @endphp
                                    <tr>
                                        <td class="small text-muted">{{ substr($enrollment, 1, 19) }}</td>
                                        <td class="small">{{ $course ?: 'N/A' }}</td>
                                        <td class="small">{{ $name ?: 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('admin.enrollments') }}" class="btn btn-sm btn-outline-primary w-100 mt-2">View All</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-envelope me-2"></i>Recent Messages
                </h5>
            </div>
            <div class="card-body">
                @if(empty($stats['recent_contacts']))
                    <p class="text-muted mb-0">No messages yet.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_contacts'] as $contact)
                                    @php
                                        $parts = explode(' | ', $contact);
                                        $name = '';
                                        $subject = 'General Inquiry';
                                        foreach ($parts as $part) {
                                            if (strpos($part, 'Name:') === 0) $name = trim(str_replace('Name:', '', $part));
                                            if (strpos($part, 'Subject:') === 0) $subject = trim(str_replace('Subject:', '', $part));
                                        }
                                    @endphp
                                    <tr>
                                        <td class="small text-muted">{{ substr($contact, 1, 19) }}</td>
                                        <td class="small">{{ $name ?: 'N/A' }}</td>
                                        <td class="small">{{ $subject }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-outline-primary w-100 mt-2">View All</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-lightning me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Add New Course
                    </a>
                    <a href="{{ route('admin.enrollments') }}" class="btn btn-outline-success">
                        <i class="bi bi-people me-2"></i>View Enrollments
                    </a>
                    <a href="{{ route('admin.payments') }}" class="btn btn-outline-warning">
                        <i class="bi bi-credit-card me-2"></i>View Payments
                    </a>
                    <a href="{{ route('admin.contacts') }}" class="btn btn-outline-info">
                        <i class="bi bi-envelope me-2"></i>View Messages
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

