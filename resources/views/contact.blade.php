@extends('layout')

@section('content')
<!-- Contact Hero Section -->
<section class="contact-hero py-5 mb-5">
  <div class="container">
    <div class="text-center scroll-animate">
      <h1 class="display-4 fw-bold mb-3">Get in Touch</h1>
      <p class="lead text-muted">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section py-5">
  <div class="container">
    <div class="row g-4">
      <!-- Contact Information -->
      <div class="col-lg-4">
        <div class="contact-info-card scroll-animate delay-1">
          <h3 class="fw-bold mb-4">Contact Information</h3>
          <p class="text-muted mb-4">Feel free to reach out to us through any of these channels. We're here to help!</p>
          
          <div class="contact-items">
            <div class="contact-item mb-4">
              <div class="contact-icon">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="contact-details">
                <h6 class="fw-bold mb-1">Email</h6>
                <a href="mailto:support@learnhub.com" class="text-muted text-decoration-none">support@learnhub.com</a>
                <br>
                <a href="mailto:info@learnhub.com" class="text-muted text-decoration-none">info@learnhub.com</a>
              </div>
            </div>

            <div class="contact-item mb-4">
              <div class="contact-icon">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div class="contact-details">
                <h6 class="fw-bold mb-1">Phone</h6>
                <a href="tel:+6281234567890" class="text-muted text-decoration-none">+62 812-3456-7890</a>
                <br>
                <span class="text-muted small">Mon - Fri, 9:00 AM - 6:00 PM</span>
              </div>
            </div>

            <div class="contact-item mb-4">
              <div class="contact-icon">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <div class="contact-details">
                <h6 class="fw-bold mb-1">Address</h6>
                <p class="text-muted mb-0">123 Education Street<br>Jakarta 12345<br>Indonesia</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-clock-fill"></i>
              </div>
              <div class="contact-details">
                <h6 class="fw-bold mb-1">Office Hours</h6>
                <p class="text-muted mb-0">
                  Monday - Friday: 9:00 AM - 6:00 PM<br>
                  Saturday: 10:00 AM - 4:00 PM<br>
                  Sunday: Closed
                </p>
              </div>
            </div>
          </div>

          <!-- Social Media -->
          <div class="social-media mt-5 pt-4 border-top">
            <h6 class="fw-bold mb-3">Follow Us</h6>
            <div class="social-links">
              <a href="#" class="social-link" title="Facebook">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="#" class="social-link" title="Twitter">
                <i class="bi bi-twitter"></i>
              </a>
              <a href="#" class="social-link" title="Instagram">
                <i class="bi bi-instagram"></i>
              </a>
              <a href="#" class="social-link" title="LinkedIn">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="#" class="social-link" title="YouTube">
                <i class="bi bi-youtube"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-8">
        <div class="contact-form-card scroll-animate delay-2">
          <h3 class="fw-bold mb-4">Send us a Message</h3>
          
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form method="POST" action="/contact/send" id="contactForm" class="row g-3">
            @csrf

            <div class="col-md-6">
              <label class="form-label fw-bold">
                Full Name <span class="text-danger">*</span>
              </label>
              <input 
                type="text" 
                name="name" 
                class="form-control form-control-lg" 
                value="{{ old('name') }}" 
                required
                placeholder="John Doe"
              >
              @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">
                Email Address <span class="text-danger">*</span>
              </label>
              <input 
                type="email" 
                name="email" 
                class="form-control form-control-lg" 
                value="{{ old('email') }}" 
                required
                placeholder="john@example.com"
              >
              @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">
                Subject <span class="text-muted">(Optional)</span>
              </label>
              <select name="subject" class="form-select form-select-lg">
                <option value="">Select a subject...</option>
                <option value="general">General Inquiry</option>
                <option value="course">Course Information</option>
                <option value="enrollment">Enrollment Support</option>
                <option value="payment">Payment Issue</option>
                <option value="technical">Technical Support</option>
                <option value="feedback">Feedback</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">
                Phone Number <span class="text-muted">(Optional)</span>
              </label>
              <input 
                type="tel" 
                name="phone" 
                class="form-control form-control-lg" 
                value="{{ old('phone') }}" 
                placeholder="+62 812-3456-7890"
              >
            </div>

            <div class="col-12">
              <label class="form-label fw-bold">
                Message <span class="text-danger">*</span>
              </label>
              <textarea 
                name="message" 
                class="form-control" 
                rows="6" 
                required
                placeholder="Tell us how we can help you..."
              >{{ old('message') }}</textarea>
              <small class="text-muted">Maximum 2000 characters</small>
              @error('message')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="privacy" required>
                <label class="form-check-label" for="privacy">
                  I agree to the <a href="#" class="text-primary">Privacy Policy</a> and consent to being contacted.
                </label>
              </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-lg px-5 contact-submit">
                <span class="submit-text">
                  <i class="bi bi-send me-2"></i>Send Message
                </span>
                <span class="submit-loader d-none">
                  <span class="spinner-border spinner-border-sm me-2"></span>
                  Sending...
                </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
      <p class="lead text-muted">Quick answers to common questions</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 scroll-animate delay-1">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            How do I enroll in a course?
          </h5>
          <p class="text-muted mb-0">Simply browse our courses, select the one you're interested in, and click "Enroll Now". Follow the enrollment process to complete your registration.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-2">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            What payment methods do you accept?
          </h5>
          <p class="text-muted mb-0">We accept credit/debit cards, PayPal, bank transfers, and Dana. All payments are processed securely through our payment gateway.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-3">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            Do I get a certificate after completion?
          </h5>
          <p class="text-muted mb-0">Yes! Upon successful completion of any course, you'll receive a certificate of completion that you can add to your resume and LinkedIn profile.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-4">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            Can I get a refund?
          </h5>
          <p class="text-muted mb-0">We offer a 30-day money-back guarantee. If you're not satisfied with your course, contact us within 30 days for a full refund.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
