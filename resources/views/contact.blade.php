@extends('layout')

@section('content')
<!-- Contact Hero Section -->
<section class="contact-hero py-5 mb-5">
  <div class="container">
    <div class="text-center scroll-animate">
      <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
      <p class="lead text-muted">Kami senang mendengar dari Anda. Kirimkan pesan kepada kami dan kami akan segera menanggapi.</p>
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
          <h3 class="fw-bold mb-4">Informasi Kontak</h3>
          <p class="text-muted mb-4">Silakan hubungi kami melalui salah satu saluran berikut. Kami siap membantu!</p>
          
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
                <h6 class="fw-bold mb-1">Alamat</h6>
                <p class="text-muted mb-0">Jl. Raya Ubud No. 123<br>Denpasar 80222<br>Indonesia</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-clock-fill"></i>
              </div>
              <div class="contact-details">
                <h6 class="fw-bold mb-1">Jam Kerja</h6>
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
            <h6 class="fw-bold mb-3">Ikuti Kami</h6>
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
          <h3 class="fw-bold mb-4">Kirimkan Pesan kepada Kami</h3>
          
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
                Nama Lengkap <span class="text-danger">*</span>
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
                Alamat Email <span class="text-danger">*</span>
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
                  Subjek <span class="text-muted">(Opsional)</span>
              </label>
              <select name="subject" class="form-select form-select-lg">
                <option value="">Pilih subjek...</option>
                <option value="general">Pesan Umum</option>
                <option value="course">Informasi Kursus</option>
                <option value="enrollment">Dukungan Pendaftaran</option>
                <option value="payment">Masalah Pembayaran</option>
                <option value="technical">Dukungan Teknis</option>
                <option value="feedback">Umpan Balik</option>
                <option value="other">Lainnya</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">
                Nomor Telepon <span class="text-muted">(Opsional)</span>
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
                Pesan <span class="text-danger">*</span>
              </label>
              <textarea 
                name="message" 
                class="form-control" 
                rows="6" 
                required
                placeholder="Beritahu kami bagaimana kami dapat membantu Anda..."
              >{{ old('message') }}</textarea>
              <small class="text-muted">Maksimal 2000 karakter</small>
              @error('message')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="privacy" required>
                <label class="form-check-label" for="privacy">
                  Saya setuju dengan <a href="#" class="text-primary">Kebijakan Privasi</a> dan menyetujui untuk dihubungi.
                </label>
              </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-lg px-5 contact-submit">
                <span class="submit-text">
                  <i class="bi bi-send me-2"></i>Kirim Pesan
                </span>
                <span class="submit-loader d-none">
                  <span class="spinner-border spinner-border-sm me-2"></span>
                  Mengirim...
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
      <h2 class="display-5 fw-bold mb-3">Pertanyaan yang Sering Diajukan</h2>
      <p class="lead text-muted">Jawaban cepat untuk pertanyaan umum</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 scroll-animate delay-1">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            Bagaimana cara mendaftar di kursus?
          </h5>
          <p class="text-muted mb-0">Cukup jelajahi kursus kami, pilih yang Anda inginkan, dan klik "Daftar Sekarang". Ikuti proses pendaftaran untuk menyelesaikan pendaftaran Anda.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-2">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            Metode pembayaran apa yang Anda terima?
          </h5>
          <p class="text-muted mb-0">Kami menerima kartu kredit/debit, PayPal, transfer bank, dan Dana. Semua pembayaran diproses dengan aman melalui pintu gerbang pembayaran kami.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-3">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            Apakah saya mendapatkan sertifikat setelah selesai?
          </h5>
          <p class="text-muted mb-0">Ya! Setelah berhasil menyelesaikan kursus apa pun, Anda akan menerima sertifikat penyelesaian yang dapat Anda tambahkan ke CV dan profil LinkedIn Anda.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-4">
        <div class="faq-card">
          <h5 class="fw-bold mb-2">
            <i class="bi bi-question-circle text-primary me-2"></i>
            Apakah saya dapat mendapatkan pengembalian uang?
          </h5>
          <p class="text-muted mb-0">Kami menawarkan garansi pengembalian uang 30 hari. Jika Anda tidak puas dengan kursus Anda, hubungi kami dalam 30 hari untuk pengembalian uang penuh.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
