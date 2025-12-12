@extends('layout')

@section('content')
<!-- About Hero Section -->
<section class="about-hero py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 scroll-animate">
        <div class="about-badge mb-3">
          <span class="badge bg-primary">Tentang LearnHub</span>
        </div>
        <h1 class="display-4 fw-bold mb-4">Mewujudkan Pelajar di Seluruh Dunia</h1>
        <p class="lead mb-4">Kami berkomitmen untuk membuat pendidikan berkualitas terjangkau bagi semua orang. LearnHub menyatukan instruktur profesional, kursus komprehensif, dan komunitas pendukung untuk membantu Anda mencapai tujuan belajar Anda.</p>
        <div class="about-stats d-flex gap-4">
          <div>
            <h3 class="fw-bold mb-0 text-primary">800+</h3>
            <p class="text-muted mb-0">Pelajar Aktif</p>
          </div>
          <div>
            <h3 class="fw-bold mb-0 text-primary">20+</h3>
            <p class="text-muted mb-0">Kursus Profesional</p>
          </div>
          <div>
            <h3 class="fw-bold mb-0 text-primary">98%</h3>
            <p class="text-muted mb-0">Tingkat Keberhasilan</p>
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
          <h3 class="fw-bold mb-3">Misi Kami</h3>
          <p class="text-muted">Untuk memajukan pendidikan dengan menyediakan kursus online berkualitas tinggi dan terjangkau yang memberdayakan individu untuk mempelajari keterampilan baru, memajukan karir, dan mencapai tujuan pribadi dan profesional.</p>
          <p class="text-muted">Kami percaya bahwa setiap orang berhak mendapatkan pendidikan dunia tingkat yang memadai, tanpa memandang lokasi, latar belakang, atau situasi keuangan.</p>
        </div>
      </div>
      <div class="col-md-6 scroll-animate delay-2">
        <div class="vision-card h-100">
          <div class="card-icon mb-3">
            <i class="bi bi-eye"></i>
          </div>
          <h3 class="fw-bold mb-3">Visi Kami</h3>
          <p class="text-muted">Untuk menjadi platform pembelajaran online terkemuka yang mengubah hidup melalui pendidikan. Kami menggambarkan dunia di mana siapa saja dapat mempelajari apa saja, di mana saja, kapan saja.</p>
          <p class="text-muted">Pada tahun 2030, kami bertujuan untuk telah membantu lebih dari 1 juta pelajar mencapai tujuan belajar dan membuka potensi penuh mereka.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-about py-5">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Mengapa Memilih LearnHub?</h2>
      <p class="lead text-muted">Kami berkomitmen untuk kesuksesan Anda setiap langkah perjalanan</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4 scroll-animate delay-1">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-people-fill"></i>
          </div>
          <h5 class="fw-bold mb-3">Instruktur Profesional</h5>
          <p class="text-muted">Learn from industry professionals with years of real-world experience. Our instructors are carefully selected for their expertise and teaching ability.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-2">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-book-fill"></i>
          </div>
          <h5 class="fw-bold mb-3">Konten Komprehensif</h5>
          <p class="text-muted">Kursus kami dirancang untuk komprehensif, praktis, dan sesuai dengan standar industri terkini dan praktik terbaik.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-3">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-clock-history"></i>
          </div>
          <h5 class="fw-bold mb-3">Akses Selamanya</h5>
          <p class="text-muted">Setelah Anda mendaftar, Anda mendapatkan akses selamanya ke materi kursus, termasuk semua pembaruan dan penambahan konten di masa depan.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-1">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-headset"></i>
          </div>
          <h5 class="fw-bold mb-3">Dukungan 24/7</h5>
          <p class="text-muted">Tim dukungan kami siap membantu Anda dengan pertanyaan atau masalah yang mungkin Anda temui.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-2">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-trophy-fill"></i>
          </div>
          <h5 class="fw-bold mb-3">Sertifikat</h5>
          <p class="text-muted">Dapatkan sertifikat yang diakui industri setelah menyelesaikan kursus yang dapat Anda tambahkan ke CV dan profil LinkedIn Anda.</p>
        </div>
      </div>
      <div class="col-md-4 scroll-animate delay-3">
        <div class="feature-box text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-people"></i>
          </div>
          <h5 class="fw-bold mb-3">Komunitas</h5>
          <p class="text-muted">Bergabunglah dengan komunitas pelajar yang aktif, berbagi pengetahuan, bekerja sama pada proyek, dan berhubungan dengan individu yang sama-sama tertarik pada hal yang sama.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Values Section -->
<section class="values-section py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Nilai Inti Kami</h2>
      <p class="lead text-muted">Prinsip-prinsip yang mengarahkan segala yang kami lakukan</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6 scroll-animate delay-1">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-heart-fill"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Semangat</h5>
          <p class="text-muted small">Kami bersemangat tentang pendidikan dan membantu orang lain mencapai kesuksesan.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 scroll-animate delay-2">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-star-fill"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Ekselensi</h5>
          <p class="text-muted small">Kami berusaha untuk ekselensi dalam segala yang kami ciptakan dan sampaikan.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 scroll-animate delay-3">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Integritas</h5>
          <p class="text-muted small">Kami beroperasi dengan jujur, transparan, dan praktik etis.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 scroll-animate delay-4">
        <div class="value-card text-center">
          <div class="value-icon">
            <i class="bi bi-lightbulb-fill"></i>
          </div>
          <h5 class="fw-bold mt-3 mb-2">Inovasi</h5>
          <p class="text-muted small">Kami terus berinovasi untuk meningkatkan pengalaman belajar.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="team-section py-5">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Temui Tim Kami</h2>
      <p class="lead text-muted">Orang-orang yang bersemangat di balik LearnHub</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 scroll-animate delay-1">
        <div class="team-card text-center">
          <div class="team-avatar mb-3">
            <div class="avatar-circle bg-primary">JD</div>
          </div>
          <h5 class="fw-bold mb-1">Gede Erik Aktama</h5>
          <p class="text-muted small mb-3">Pemilik & CEO</p>
          <p class="text-muted small">10+ tahun dalam teknologi pendidikan. Bersemangat tentang membuat pendidikan terjangkau bagi semua orang.</p>
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
          <h5 class="fw-bold mb-1">Jordan Immanuel</h5>
          <p class="text-muted small mb-3">Kepala Kurikulum</p>
          <p class="text-muted small">Seorang insinyur perangkat lunak yang menjadi pendidik. Merancang kursus yang menghubungkan teori dan praktik.</p>
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
          <h5 class="fw-bold mb-1">Claudio Mamahit</h5>
          <p class="text-muted small mb-3">Instruktur Pimpinan</p>
          <p class="text-muted small">Pengembang Full-stack dengan keahlian dalam teknologi web modern. Membuat topik kompleks menjadi sederhana.</p>
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
          <h2 class="display-3 fw-bold mb-2">800+</h2>
          <p class="mb-0">Pelajar Puas</p>
        </div>
      </div>
      <div class="col-md-3 scroll-animate delay-2">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">20+</h2>
          <p class="mb-0">Kursus Profesional</p>
        </div>
      </div>
      <div class="col-md-3 scroll-animate delay-3">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">98%</h2>
          <p class="mb-0">Tingkat Kesuksesan</p>
        </div>
      </div>
      <div class="col-md-3 scroll-animate delay-4">
        <div class="stat-box">
          <h2 class="display-3 fw-bold mb-2">24/7</h2>
          <p class="mb-0">Dukungan Tersedia</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-about py-5">
  <div class="container text-center">
    <div class="cta-content scroll-animate">
      <h2 class="display-5 fw-bold mb-3">Siap Mulai Belajar?</h2>
      <p class="lead mb-4">Bergabunglah dengan ribuan pelajar dan mulai perjalanan belajar Anda hari ini</p>
      <div class="cta-buttons">
        <a href="/portfolio" class="btn btn-primary btn-lg me-2">Jelajahi Kursus</a>
        <a href="/contact" class="btn btn-outline-primary btn-lg">Hubungi Kami</a>
      </div>
    </div>
  </div>
</section>
@endsection
