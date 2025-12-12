@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Enrollments</h2>
        <p class="text-muted mb-0">View all course enrollments</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if(empty($enrollments))
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
                <p class="text-muted mt-3">No enrollments found.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date & Time</th>
                            <th>Course</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollments as $enrollment)
                            @php
                                $parts = explode(' | ', $enrollment);
                                $date = substr($enrollment, 1, 19);
                                $course = '';
                                $name = '';
                                $email = '';
                                $phone = 'N/A';
                                $payment = '';
                                
                                foreach ($parts as $part) {
                                    if (strpos($part, 'Course:') === 0) $course = trim(str_replace('Course:', '', $part));
                                    if (strpos($part, 'Name:') === 0) $name = trim(str_replace('Name:', '', $part));
                                    if (strpos($part, 'Email:') === 0) $email = trim(str_replace('Email:', '', $part));
                                    if (strpos($part, 'Phone:') === 0) $phone = trim(str_replace('Phone:', '', $part));
                                    if (strpos($part, 'Payment:') === 0) $payment = trim(str_replace('Payment:', '', $part));
                                }
                            @endphp
                            <tr>
                                <td class="small">{{ $date }}</td>
                                <td>{{ $course }}</td>
                                <td>{{ $name }}</td>
                                <td><a href="mailto:{{ $email }}">{{ $email }}</a></td>
                                <td>{{ $phone }}</td>
                                <td>
                                    <span class="badge bg-{{ $payment === 'dana' ? 'primary' : ($payment === 'card' ? 'success' : 'secondary') }}">
                                        {{ ucfirst($payment) }}
                                    </span>
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

