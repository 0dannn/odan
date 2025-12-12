@extends('layout')

@section('content')
<section class="enrollment-success py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="success-card text-center scroll-animate">
          <div class="success-icon mb-4">
            <div class="icon-circle">
              <i class="bi bi-check-circle-fill"></i>
            </div>
          </div>
          <h1 class="display-4 fw-bold mb-3">Enrollment Successful!</h1>
          <p class="lead text-muted mb-4">Congratulations! You've successfully enrolled in the course.</p>

          @if($enrollment)
            <div class="enrollment-details mb-5">
              <div class="detail-box">
                <h6 class="text-muted mb-2">Course</h6>
                <p class="fw-bold mb-0">{{ $enrollment['course_name'] }}</p>
              </div>
              <div class="detail-box">
                <h6 class="text-muted mb-2">Student Name</h6>
                <p class="fw-bold mb-0">{{ $enrollment['name'] }}</p>
              </div>
              <div class="detail-box">
                <h6 class="text-muted mb-2">Email</h6>
                <p class="fw-bold mb-0">{{ $enrollment['email'] }}</p>
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
                  <p class="small text-muted">We've sent you a confirmation email with course access details.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="step-card">
                  <i class="bi bi-play-circle"></i>
                  <h6>Start Learning</h6>
                  <p class="small text-muted">Access your course materials and begin your learning journey.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="step-card">
                  <i class="bi bi-people"></i>
                  <h6>Join Community</h6>
                  <p class="small text-muted">Connect with other students and get support from instructors.</p>
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

