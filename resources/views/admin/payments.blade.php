@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Payments</h2>
        <p class="text-muted mb-0">View all payment transactions</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if(empty($payments))
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
                <p class="text-muted mt-3">No payments found.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date & Time</th>
                            <th>Reference</th>
                            <th>Course</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            @php
                                $parts = explode(' | ', $payment);
                                $date = substr($payment, 1, 19);
                                $ref = '';
                                $course = '';
                                $phone = '';
                                $amount = '';
                                
                                foreach ($parts as $part) {
                                    if (strpos($part, 'Ref:') === 0) $ref = trim(str_replace('Ref:', '', $part));
                                    if (strpos($part, 'Course:') === 0) $course = trim(str_replace('Course:', '', $part));
                                    if (strpos($part, 'Phone:') === 0) $phone = trim(str_replace('Phone:', '', $part));
                                    if (strpos($part, 'Amount:') === 0) $amount = trim(str_replace('Amount:', '', $part));
                                }
                            @endphp
                            <tr>
                                <td class="small">{{ $date }}</td>
                                <td><code>{{ $ref }}</code></td>
                                <td>{{ $course }}</td>
                                <td>{{ $phone }}</td>
                                <td class="fw-bold text-success">{{ $amount }}</td>
                                <td>
                                    <span class="badge bg-success">Completed</span>
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

