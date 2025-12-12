@extends('layout')

@section('content')
<section class="dana-payment-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="dana-payment-card scroll-animate">
          <!-- Header -->
          <div class="payment-header text-center mb-4">
            <div class="dana-logo mb-3">
              <div class="dana-logo-circle">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="10" fill="#108EE9"/>
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" fill="white"/>
                  <path d="M12 7v10m-5-5h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
              </div>
            </div>
            <h2 class="fw-bold mb-2">Pay with Dana</h2>
            <p class="text-muted">Complete your payment securely</p>
          </div>

          <!-- Course Info -->
          <div class="course-info-card mb-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="fw-bold mb-1">{{ $enrollment['course_name'] }}</h6>
                <p class="text-muted small mb-0">{{ $enrollment['name'] }}</p>
              </div>
              <div class="text-end">
                <div class="amount-display">
                  <span class="amount-label">Total</span>
                  <span class="amount-value">Rp {{ number_format($amount * 15000, 0, ',', '.') }}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Payment Form -->
          <form method="POST" action="{{ route('payment.dana.process') }}" id="danaPaymentForm">
            @csrf
            <input type="hidden" name="payment_reference" value="{{ $paymentRef }}">
            <input type="hidden" name="amount" value="{{ $amount }}">

            <div class="payment-form-card">
              <div class="form-group mb-4">
                <label class="form-label fw-bold mb-2">
                  <i class="bi bi-phone me-2"></i>Dana Phone Number
                </label>
                <input 
                  type="tel" 
                  name="dana_phone" 
                  class="form-control form-control-lg" 
                  placeholder="08xxxxxxxxxx"
                  required
                  pattern="[0-9]{10,15}"
                  value="{{ old('dana_phone') }}"
                >
                <small class="text-muted">Enter your registered Dana phone number</small>
                @error('dana_phone')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>

              @if(session('error'))
                <div class="alert alert-danger">
                  <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
              @endif

              <!-- Payment Instructions -->
              <div class="payment-instructions mb-4">
                <h6 class="fw-bold mb-3">Payment Instructions</h6>
                <ol class="instruction-list">
                  <li>Enter your Dana phone number</li>
                  <li>Click "Pay with Dana" button</li>
                  <li>You will receive a payment notification on your Dana app</li>
                  <li>Confirm the payment in your Dana app</li>
                  <li>Wait for payment confirmation</li>
                </ol>
              </div>

              <!-- Security Badge -->
              <div class="security-badge mb-4">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-shield-check text-success"></i>
                  <span class="small">Secure payment powered by Dana</span>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="payment-actions">
                <button type="submit" class="btn btn-dana btn-lg w-100 mb-3" id="danaPayButton">
                  <span class="button-content">
                    <i class="bi bi-wallet2 me-2"></i>
                    Pay Rp {{ number_format($amount * 15000, 0, ',', '.') }} with Dana
                  </span>
                  <span class="button-loader d-none">
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Processing...
                  </span>
                </button>
                <a href="{{ route('enroll') }}" class="btn btn-outline-secondary w-100">
                  Cancel
                </a>
              </div>
            </div>
          </form>

          <!-- Payment Info -->
          <div class="payment-info mt-4">
            <div class="info-item">
              <i class="bi bi-clock"></i>
              <span>Payment will be processed within 1-2 minutes</span>
            </div>
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <span>Confirmation email will be sent to {{ $enrollment['email'] }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

