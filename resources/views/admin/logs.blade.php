@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">System Logs</h2>
        <p class="text-muted mb-0">View application logs</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
    </a>
</div>

<div class="row g-4">
    @foreach($logs as $type => $logLines)
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0 fw-bold text-capitalize">
                        <i class="bi bi-file-text me-2"></i>{{ $type }} Logs
                    </h5>
                </div>
                <div class="card-body">
                    @if(empty($logLines))
                        <p class="text-muted mb-0">No logs available.</p>
                    @else
                        <div class="log-container" style="max-height: 400px; overflow-y: auto; background: #1e1e1e; color: #d4d4d4; padding: 1rem; border-radius: 0.5rem; font-family: 'Courier New', monospace; font-size: 0.875rem;">
                            @foreach($logLines as $line)
                                <div>{{ $line }}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

