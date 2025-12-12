@extends('layout')

@section('content')
<!-- About Hero Section -->
<section class="about-hero py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 scroll-animate">
        <div class="about-badge mb-3">
          <span class="badge bg-primary">About LearnHub</span>
        </div>
        <h1 class="display-4 fw-bold mb-4">Empowering Learners Worldwide</h1>
        <p class="lead mb-4">We're on a mission to make quality education accessible to everyone. LearnHub brings together expert instructors, comprehensive courses, and a supportive community to help you achieve your learning goals.</p>
        <div class="about-stats d-flex gap-4">
          <div>
            <h3 class="fw-bold mb-0 text-primary">10K+</h3>
            <p class="text-muted mb-0">Active Students</p>
          </div>
          <div>
            <h3 class="fw-bold mb-0 text-primary">50+</h3>
            <p class="text-muted mb-0">Expert Courses</p>
          </div>
          <div>
            <h3 class="fw-bold mb-0 text-primary">98%</h3>
            <p class="text-muted mb-0">Success Rate</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 scroll-animate delay-1">
        <div class="about-visual">
          <div class="visual-card">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 scroll-animate delay-1">
        <div class="mission-card h-100">
          <div class="card-icon mb-3">
            <i class="bi bi-bullseye"></i>
          </div>
          <h3 class="fw-bold mb-3">Our Mission</h3>
          <p class="text-muted">To democratize education by providing high-quality, accessible online courses that empower individuals to learn new skills, advance their careers, and achieve their personal and professional goals.</p>
          <p class="text-muted">We believe that everyone deserves access to world-class education, regardless of their location, background, or financial situation.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-2">
        <div class="vision-card h-100">
          <div class="card-icon mb-3">
            <i class="bi bi-eye"></i>
          </div>
          <h3 class="fw-bold mb-3">Our Vision</h3>
          <p class="text-muted">To become the leading online learning platform that transforms lives through education. We envision a world where anyone can learn anything, anywhere, at any time.</p>
          <p class="text-muted">By 2030, we aim to have helped over 1 million students achieve their learning objectives and unlock their full potential.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-about py-5">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Why Choose LearnHub?</h2>
      <p class="lead text-muted">We're committed to your success every step of the way</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4 scroll-animate delay-1">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-people-fill"></i>
          </div>
          <h5 class="fw-bold mb-3">Expert Instructors</h5>
          <p class="text-muted">Learn from industry professionals with years of real-world experience. Our instructors are carefully selected for their expertise and teaching ability.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-2">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-book-fill"></i>
          </div>
          <h5 class="fw-bold mb-3">Comprehensive Content</h5>
          <p class="text-muted">Our courses are designed to be comprehensive, practical, and up-to-date with the latest industry standards and best practices.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-3">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-clock-history"></i>
          </div>
          <h5 class="fw-bold mb-3">Lifetime Access</h5>
          <p class="text-muted">Once you enroll, you get lifetime access to course materials, including all future updates and new content additions.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-1">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-headset"></i>
          </div>
          <h5 class="fw-bold mb-3">24/7 Support</h5>
          <p class="text-muted">Our dedicated support team is available around the clock to help you with any questions or issues you may encounter.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-2">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-trophy-fill"></i>
          </div>
          <h5 class="fw-bold mb-3">Certificates</h5>
          <p class="text-muted">Earn industry-recognized certificates upon course completion that you can add to your resume and LinkedIn profile.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-3">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-people"></i>
          </div>
          <h5 class="fw-bold mb-3">Community</h5>
          <p class="text-muted">Join a vibrant community of learners, share knowledge, collaborate on projects, and network with like-minded individuals.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Values Section -->
<section class="values-section py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Our Core Values</h2>
      <p class="lead text-muted">The principles that guide everything we do</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6 scroll-animate delay-1">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-heart-fill"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Passion</h5>
          <p class="text-muted small">We're passionate about education and helping others succeed.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 scroll-animate delay-2">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-star-fill"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Excellence</h5>
          <p class="text-muted small">We strive for excellence in everything we create and deliver.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 scroll-animate delay-3">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Integrity</h5>
          <p class="text-muted small">We operate with honesty, transparency, and ethical practices.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 scroll-animate delay-4">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-lightbulb-fill"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Innovation</h5>
          <p class="text-muted small">We continuously innovate to improve the learning experience.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="team-section py-5">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Meet Our Team</h2>
      <p class="lead text-muted">The passionate people behind LearnHub</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 scroll-animate delay-1">
        <div class="team-card text-center">
          <div class="team-avatar mb-3">
            <div class="avatar-circle bg-primary">JD</div>
          </div>
          <h5 class="fw-bold mb-1">John Doe</h5>
          <p class="text-muted small mb-3">Founder & CEO</p>
          <p class="text-muted small">10+ years in education technology. Passionate about making learning accessible to everyone.</p>
          <div class="team-social mt-3">
            <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-link"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 scroll-animate delay-2">
        <div class="team-card text-center">
          <div class="team-avatar mb-3">
            <div class="avatar-circle bg-success">SM</div>
          </div>
          <h5 class="fw-bold mb-1">Sarah Mitchell</h5>
          <p class="text-muted small mb-3">Head of Curriculum</p>
          <p class="text-muted small">Former software engineer turned educator. Designs courses that bridge theory and practice.</p>
          <div class="team-social mt-3">
            <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-link"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 scroll-animate delay-3">
        <div class="team-card text-center">
          <div class="team-avatar mb-3">
            <div class="avatar-circle bg-danger">MJ</div>
          </div>
          <h5 class="fw-bold mb-1">Michael Johnson</h5>
          <p class="text-muted small mb-3">Lead Instructor</p>
          <p class="text-muted small">Full-stack developer with expertise in modern web technologies. Makes complex topics simple.</p>
          <div class="team-social mt-3">
            <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-link"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Statistics Section -->
<section class="stats-section py-5 bg-primary text-white">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-3 scroll-animate delay-1">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">10K+</h2>
          <p class="mb-0">Happy Students</p>
        </div>
      </div>
      <div class="col-md-3 scroll-animate delay-2">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">50+</h2>
          <p class="mb-0">Expert Courses</p>
        </div>
      </div>
      <div class="col-md-3 scroll-animate delay-3">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">98%</h2>
          <p class="mb-0">Success Rate</p>
        </div>
      </div>
      <div class="col-md-3 scroll-animate delay-4">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">24/7</h2>
          <p class="mb-0">Support Available</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-about py-5">
  <div class="container text-center">
    <div class="cta-content scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Ready to Start Learning?</h2>
      <p class="lead mb-4">Join thousands of students who are already transforming their careers with LearnHub</p>
      <div class="cta-buttons">
        <a href="/portfolio" class="btn btn-primary btn-lg me-2">Browse Courses</a>
        <a href="/contact" class="btn btn-outline-primary btn-lg">Get in Touch</a>
      </div>
    </div>
  </div>
</section>
@endsection
