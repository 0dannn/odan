@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Contact Messages</h2>
        <p class="text-muted mb-0">View all contact form submissions</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if(empty($contacts))
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
                <p class="text-muted mt-3">No messages found.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date & Time</th>
                            <th>Subject</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            @php
                                $parts = explode(' | ', $contact);
                                $date = substr($contact, 1, 19);
                                $subject = 'General Inquiry';
                                $name = '';
                                $email = '';
                                $phone = 'N/A';
                                $message = '';
                                
                                foreach ($parts as $part) {
                                    if (strpos($part, 'Subject:') === 0) $subject = trim(str_replace('Subject:', '', $part));
                                    if (strpos($part, 'Name:') === 0) $name = trim(str_replace('Name:', '', $part));
                                    if (strpos($part, 'Email:') === 0) $email = trim(str_replace('Email:', '', $part));
                                    if (strpos($part, 'Phone:') === 0) $phone = trim(str_replace('Phone:', '', $part));
                                    if (strpos($part, 'Message:') === 0) $message = trim(str_replace('Message:', '', $part));
                                }
                            @endphp
                            <tr>
                                <td class="small">{{ $date }}</td>
                                <td><span class="badge bg-info">{{ $subject }}</span></td>
                                <td>{{ $name }}</td>
                                <td><a href="mailto:{{ $email }}">{{ $email }}</a></td>
                                <td>{{ $phone }}</td>
                                <td class="small">{{ Str::limit($message, 50) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

