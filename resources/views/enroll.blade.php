@extends('layout')

@section('content')
<!-- Enrollment Hero Section -->
<section class="enrollment-hero py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 scroll-animate">
        <div class="enrollment-badge mb-3">
          <span class="badge bg-primary">Limited Time Offer</span>
        </div>
        <h1 class="display-4 fw-bold mb-4">Enroll in Your Course</h1>
        <p class="lead mb-4">Start your learning journey today and unlock your potential with expert-led courses.</p>
        <div class="enrollment-features">
          <div class="feature-item">
            <i class="bi bi-check-circle-fill text-success"></i>
            <span>Lifetime Access</span>
          </div>
          <div class="feature-item">
            <i class="bi bi-check-circle-fill text-success"></i>
            <span>Certificate of Completion</span>
          </div>
          <div class="feature-item">
            <i class="bi bi-check-circle-fill text-success"></i>
            <span>30-Day Money-Back Guarantee</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6 scroll-animate delay-1">
        <div class="enrollment-visual">
          <div class="visual-card">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Enrollment Form Section -->
<section class="enrollment-section py-5">
  <div class="container">
    <div class="row">
      <!-- Course Summary Card -->
      <div class="col-lg-4 mb-4">
        <div class="course-summary-card sticky-top scroll-animate delay-1">
          <div class="card-header">
            <h5 class="mb-0">Course Summary</h5>
          </div>
          <div class="card-body">
            @if($project)
              <div class="course-preview mb-3">
                @if($project->image)
                  <img src="{{ asset('projects/' . $project->image) }}" alt="{{ $project->title }}" class="w-100 rounded">
                @else
                  <div class="course-preview-placeholder">
                    <i class="bi bi-book-fill"></i>
                  </div>
                @endif
              </div>
              <h6 class="fw-bold">{{ $project->title }}</h6>
              <p class="text-muted small">{{ Str::limit($project->description ?? 'Comprehensive course with hands-on projects', 100) }}</p>
            @else
              <div class="course-preview mb-3">
                <div class="course-preview-placeholder">
                  <i class="bi bi-book-fill"></i>
                </div>
              </div>
              <h6 class="fw-bold">Select a Course</h6>
              <p class="text-muted small">Choose from our wide range of courses</p>
            @endif
            
            <div class="course-details mt-4">
              <div class="detail-item">
                <i class="bi bi-clock"></i>
                <span>40+ Hours of Content</span>
              </div>
              <div class="detail-item">
                <i class="bi bi-file-earmark-text"></i>
                <span>200+ Lessons</span>
              </div>
              <div class="detail-item">
                <i class="bi bi-download"></i>
                <span>Downloadable Resources</span>
              </div>
              <div class="detail-item">
                <i class="bi bi-people"></i>
                <span>10,000+ Students</span>
              </div>
            </div>

            <div class="pricing-section mt-4 pt-4 border-top">
              <div class="price-display">
                <span class="price-label">Total Price</span>
                <div class="price-amount">
                  @php
                    $coursePrice = $project ? rand(49, 199) : 99;
                    $oldPrice = rand(0, 1) ? rand(199, 299) : null;
                  @endphp
                  <input type="hidden" name="amount" value="{{ $coursePrice }}" form="enrollmentForm">
                  <span class="current-price">Rp {{ number_format($coursePrice * 15000, 0, ',', '.') }}</span>
                  @if($oldPrice)
                    <span class="old-price">Rp {{ number_format($oldPrice * 15000, 0, ',', '.') }}</span>
                  @endif
                </div>
              </div>
              <div class="price-breakdown mt-3">
                <div class="breakdown-item">
                  <span>Course Fee</span>
                  <span>Rp {{ number_format($coursePrice * 15000, 0, ',', '.') }}</span>
                </div>
                <div class="breakdown-item">
                  <span>Platform Fee</span>
                  <span>Free</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Enrollment Form -->
      <div class="col-lg-8">
        <div class="enrollment-form-card scroll-animate delay-2">
          <div class="card-header">
            <h5 class="mb-0">Enrollment Information</h5>
            <p class="text-muted small mb-0">Please fill in your details to complete enrollment</p>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('enroll.process') }}" id="enrollmentForm">
              @csrf
              
              @if($project)
                <input type="hidden" name="course_id" value="{{ $project->id }}">
                <input type="hidden" name="course_name" value="{{ $project->title }}">
              @else
                <div class="mb-4">
                  <label class="form-label fw-bold">Select Course <span class="text-danger">*</span></label>
                  <select name="course_name" class="form-select" required>
                    <option value="">Choose a course...</option>
                    @if(request()->has('course'))
                      <option value="{{ request()->get('course') }}" selected>{{ request()->get('course') }}</option>
                    @endif
                    <option value="Complete Web Development Bootcamp">Complete Web Development Bootcamp</option>
                    <option value="Laravel & PHP Mastery">Laravel & PHP Mastery</option>
                    <option value="React Native Mobile Development">React Native Mobile Development</option>
                    <option value="UI/UX Design Fundamentals">UI/UX Design Fundamentals</option>
                    <option value="Advanced JavaScript & ES6+">Advanced JavaScript & ES6+</option>
                    <option value="Python for Data Science">Python for Data Science</option>
                  </select>
                  @error('course_name')
                    <div class="text-danger small">{{ $message }}</div>
                  @enderror
                </div>
              @endif

              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="John Doe">
                  @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="john@example.com">
                  @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label fw-bold">Phone Number <span class="text-muted">(Optional)</span></label>
                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+1 (555) 123-4567">
                @error('phone')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label class="form-label fw-bold mb-3">Payment Method <span class="text-danger">*</span></label>
                <div class="payment-methods">
                  <div class="payment-option">
                    <input type="radio" name="payment_method" id="payment_card" value="card" class="payment-radio" required {{ old('payment_method') === 'card' ? 'checked' : '' }}>
                    <label for="payment_card" class="payment-label">
                      <div class="payment-icon">
                        <i class="bi bi-credit-card"></i>
                      </div>
                      <div class="payment-info">
                        <span class="payment-name">Credit/Debit Card</span>
                        <span class="payment-desc">Visa, Mastercard, Amex</span>
                      </div>
                    </label>
                  </div>

                  <div class="payment-option">
                    <input type="radio" name="payment_method" id="payment_paypal" value="paypal" class="payment-radio" {{ old('payment_method') === 'paypal' ? 'checked' : '' }}>
                    <label for="payment_paypal" class="payment-label">
                      <div class="payment-icon">
                        <i class="bi bi-paypal"></i>
                      </div>
                      <div class="payment-info">
                        <span class="payment-name">PayPal</span>
                        <span class="payment-desc">Pay with your PayPal account</span>
                      </div>
                    </label>
                  </div>

                  <div class="payment-option">
                    <input type="radio" name="payment_method" id="payment_bank" value="bank" class="payment-radio" {{ old('payment_method') === 'bank' ? 'checked' : '' }}>
                    <label for="payment_bank" class="payment-label">
                      <div class="payment-icon">
                        <i class="bi bi-bank"></i>
                      </div>
                      <div class="payment-info">
                        <span class="payment-name">Bank Transfer</span>
                        <span class="payment-desc">Direct bank transfer</span>
                      </div>
                    </label>
                  </div>

                  <div class="payment-option">
                    <input type="radio" name="payment_method" id="payment_dana" value="dana" class="payment-radio" {{ old('payment_method') === 'dana' ? 'checked' : '' }}>
                    <label for="payment_dana" class="payment-label payment-dana">
                      <div class="payment-icon payment-icon-dana">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                        </svg>
                      </div>
                      <div class="payment-info">
                        <span class="payment-name">Dana</span>
                        <span class="payment-desc">Pay with Dana wallet</span>
                      </div>
                    </label>
                  </div>
                </div>
                @error('payment_method')
                  <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="terms" required>
                <label class="form-check-label" for="terms">
                  I agree to the <a href="#" class="text-primary">Terms and Conditions</a> and <a href="#" class="text-primary">Privacy Policy</a>
                </label>
              </div>

              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="newsletter">
                <label class="form-check-label" for="newsletter">
                  Send me course updates and special offers via email
                </label>
              </div>

              <button type="submit" class="btn btn-primary btn-lg w-100 enrollment-submit">
                <span class="submit-text">Complete Enrollment</span>
                <span class="submit-loader d-none">
                  <span class="spinner-border spinner-border-sm me-2"></span>
                  Processing...
                </span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

