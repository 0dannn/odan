@extends('layout')

@section('content')
<section class="payment-success-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="success-card text-center scroll-animate">
          <div class="success-icon mb-4">
            <div class="icon-circle success">
              <i class="bi bi-check-circle-fill"></i>
            </div>
          </div>
          <h1 class="display-4 fw-bold mb-3">Payment Successful!</h1>
          <p class="lead text-muted mb-4">Your payment has been processed successfully via Dana.</p>

          @if($paymentDetails)
            <div class="payment-details-card mb-5">
              <h5 class="fw-bold mb-4">Payment Details</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Payment Reference</span>
                    <span class="detail-value">{{ $paymentDetails['reference'] }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Payment Method</span>
                    <span class="detail-value">Dana</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Amount Paid</span>
                    <span class="detail-value">Rp {{ number_format($paymentDetails['amount'] * 15000, 0, ',', '.') }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Date & Time</span>
                    <span class="detail-value">{{ $paymentDetails['timestamp']->format('d M Y, H:i') }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if($enrollment)
            <div class="enrollment-details mb-5">
              <h5 class="fw-bold mb-4">Enrollment Confirmed</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Course</span>
                    <span class="detail-value">{{ $enrollment['course_name'] }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Student Name</span>
                    <span class="detail-value">{{ $enrollment['name'] }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $enrollment['email'] }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $paymentDetails['phone'] ?? ($enrollment['phone'] ?? 'N/A') }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endif

          <div class="next-steps mb-5">
            <h5 class="fw-bold mb-3">What's Next?</h5>
            <div class="row g-3">
              <div class="col-md-4">
                <div class="step-card">
                  <i class="bi bi-envelope-check"></i>
                  <h6>Check Your Email</h6>
                  <p class="small text-muted">We've sent you course access details and receipt.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="step-card">
                  <i class="bi bi-play-circle"></i>
                  <h6>Start Learning</h6>
                  <p class="small text-muted">Access your course materials immediately.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="step-card">
                  <i class="bi bi-receipt"></i>
                  <h6>Download Receipt</h6>
                  <p class="small text-muted">Your payment receipt is available in your email.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="action-buttons">
            <a href="/portfolio" class="btn btn-primary btn-lg me-2">Browse More Courses</a>
            <a href="/" class="btn btn-outline-primary btn-lg">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

