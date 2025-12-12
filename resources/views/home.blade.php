@extends('layout')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="display-4 fw-bold mb-4 scroll-animate">Pelajari Keterampilan yang Penting</h1>
        <p class="lead mb-4 scroll-animate delay-1">Bergabunglah dengan ribuan pelajar yang mempelajari teknologi mutakhir dan membangun proyek dunia nyata. Mulailah perjalananmu hari ini dan ubah kariermu.</p>
        <div class="d-flex gap-3 flex-wrap scroll-animate delay-2">
          <a class="btn btn-primary btn-lg" href="/portfolio">Jelajahi Kursus</a>
          <a class="btn btn-outline-primary btn-lg" href="/about">Pelajari lebih lanjut</a>
        </div>
        <div class="mt-4 d-flex gap-4 scroll-animate delay-3">
          <div>
            <h3 class="fw-bold mb-0">800+</h3>
            <p class="text-muted mb-0">Pelajar</p>
          </div>
          <div>
            <h3 class="fw-bold mb-0">20+</h3>
            <p class="text-muted mb-0">Courses</p>
          </div>
          <div>
            <h3 class="fw-bold mb-0">98%</h3>
            <p class="text-muted mb-0">Kepuasan</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <div class="hero-image-placeholder p-5 bg-light rounded-4 shadow-lg scroll-animate delay-1">
          <i class="bi bi-mortarboard-fill" style="font-size: 8rem; color: var(--primary-color);"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Courses Section -->
<section class="featured-courses py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-5 fw-bold mb-3 scroll-animate">Kursus Unggulan</h2>
      <p class="lead text-muted scroll-animate delay-1">Kursus pilihan khusus untuk membantumu memulai perjalanan belajar.</p>
    </div>
    @php
      $sampleCourses = [
        [
          'title' => 'Complete Web Development Bootcamp',
          'description' => 'Master HTML, CSS, JavaScript, and modern frameworks. Build real-world projects and land your dream job.',
          'category' => 'web',
          'level' => 'Beginner',
          'price' => 99,
          'oldPrice' => 199,
          'icon' => 'code-slash',
          'color' => 'primary'
        ],
        [
          'title' => 'Laravel & PHP Mastery',
          'description' => 'Learn Laravel framework from scratch. Build robust APIs, authentication systems, and scalable applications.',
          'category' => 'backend',
          'level' => 'Intermediate',
          'price' => 129,
          'oldPrice' => null,
          'icon' => 'server',
          'color' => 'success'
        ],
        [
          'title' => 'React Native Mobile Development',
          'description' => 'Create cross-platform mobile applications. Learn React Native and publish apps to iOS and Android stores.',
          'category' => 'mobile',
          'level' => 'Advanced',
          'price' => 149,
          'oldPrice' => 249,
          'icon' => 'phone',
          'color' => 'danger'
        ]
      ];
      $coursesToShow = isset($featuredProjects) && $featuredProjects->count() > 0 ? $featuredProjects : collect($sampleCourses);
    @endphp
    <div class="row g-4">
      @foreach($coursesToShow as $index => $course)
        @if($course instanceof \App\Models\Project)
          <div class="col-md-4">
            <div class="card h-100 shadow-sm scroll-animate delay-{{ $index + 1 }}">
              <div class="card-img-top bg-primary text-white p-4 text-center" style="height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                @if($course->image)
                  <img src="{{ asset('projects/' . $course->image) }}" alt="{{ $course->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div>
                    <i class="bi bi-book-fill" style="font-size: 4rem;"></i>
                    <h5 class="mt-3 mb-0">Course</h5>
                  </div>
                @endif
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $course->title }}</h5>
                <p class="card-text text-muted">{{ Str::limit($course->description ?? 'Master this course and advance your skills with hands-on projects and real-world examples.', 100) }}</p>
                <div class="mt-auto">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-success">Featured</span>
                    <span class="text-muted"><strong>Rp {{ number_format(rand(99, 199) * 15000, 0, ',', '.') }}</strong></span>
                  </div>
                  <a href="{{ route('enroll.course', $course->id) }}" class="btn btn-primary w-100">
                    <i class="bi bi-play-circle me-2"></i>Enroll Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="col-md-4">
            <div class="card h-100 shadow-sm scroll-animate delay-{{ $index + 1 }}">
              <div class="card-img-top bg-{{ $course['color'] }} text-white p-4 text-center" style="height: 180px; display: flex; align-items: center; justify-content: center;">
                <div>
                  <i class="bi bi-{{ $course['icon'] }}" style="font-size: 4rem;"></i>
                  <h5 class="mt-3 mb-0">{{ ucfirst($course['category']) }}</h5>
                </div>
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $course['title'] }}</h5>
                <p class="card-text text-muted">{{ $course['description'] }}</p>
                <div class="mt-auto">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-{{ $course['level'] === 'Beginner' ? 'success' : ($course['level'] === 'Intermediate' ? 'warning' : 'danger') }}">{{ $course['level'] }}</span>
                    <span class="text-muted">
                      <strong>Rp {{ number_format($course['price'] * 15000, 0, ',', '.') }}</strong>
                      @if($course['oldPrice'])
                        <small class="text-decoration-line-through text-muted ms-2">Rp {{ number_format($course['oldPrice'] * 15000, 0, ',', '.') }}</small>
                      @endif
                    </span>
                  </div>
                  <a href="{{ route('enroll') }}?course={{ urlencode($course['title']) }}" class="btn btn-{{ $course['color'] }} w-100">
                    <i class="bi bi-play-circle me-2"></i>Enroll Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
    <div class="text-center mt-5">
      <a href="/portfolio" class="btn btn-outline-primary btn-lg scroll-animate delay-4">Lihat Semua Kursus</a>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-5 fw-bold mb-3 scroll-animate">Mengapa Memilih Kami?</h2>
      <p class="lead text-muted scroll-animate delay-1">Kami berkomitmen untuk kesuksesan Anda.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="text-center p-4 scroll-animate delay-1">
          <div class="mb-3">
            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: var(--primary-color);"></i>
          </div>
          <h4 class="fw-bold mb-3">Instruktur Profesional</h4>
          <p class="text-muted">Belajar dari profesional dengan pengalaman dunia nyata dan catatan kesuksesan yang terbukti.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center p-4 scroll-animate delay-2">
          <div class="mb-3">
            <i class="bi bi-clock-history" style="font-size: 3rem; color: var(--primary-color);"></i>
          </div>
          <h4 class="fw-bold mb-3">Akses Selamanya</h4>
          <p class="text-muted">Dapatkan akses selamanya ke semua materi kursus, pembaruan, dan komunitas pelajar yang mendukung.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center p-4 scroll-animate delay-3">
          <div class="mb-3">
            <i class="bi bi-headset" style="font-size: 3rem; color: var(--primary-color);"></i>
          </div>
          <h4 class="fw-bold mb-3">24/7 Support</h4>
          <p class="text-muted">Dapatkan bantuan kapan saja Anda butuh. Tim dukungan kami siap membantu Anda dalam perjalanan belajar.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-5 fw-bold mb-3 scroll-animate">Apa yang Pelajar Katakan</h2>
      <p class="lead text-muted scroll-animate delay-1">Umpan balik real dari komunitas kami</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm scroll-animate delay-1">
          <div class="card-body">
            <div class="mb-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="card-text">"Kursus ini benar-benar mengubah jalur karier saya. Instruktur sangat hebat dan materi sangat berkualitas. Sangat direkomendasikan!"</p>
            <div class="d-flex align-items-center mt-3">
              <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <span class="fw-bold">SM</span>
              </div>
              <div class="ms-3">
                <h6 class="mb-0 fw-bold">Sarah Mitchell</h6>
                <small class="text-muted">Web Developer</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm scroll-animate delay-2">
          <div class="card-body">
            <div class="mb-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="card-text">"Investasi terbaik yang pernah saya buat dalam pendidikan saya. Kursus Laravel membantu saya mendapatkan pekerjaan di perusahaan teknologi terkemuka. Terima kasih!"</p>
            <div class="d-flex align-items-center mt-3">
              <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <span class="fw-bold">JD</span>
              </div>
              <div class="ms-3">
                <h6 class="mb-0 fw-bold">John Davis</h6>
                <small class="text-muted">Backend Engineer</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm scroll-animate delay-3">
          <div class="card-body">
            <div class="mb-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="card-text">"Struktur kursus yang luar biasa dan dukungan yang sangat baik. Saya belajar React Native dan menerbitkan aplikasi pertama saya dalam 3 bulan!"</p>
            <div class="d-flex align-items-center mt-3">
              <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <span class="fw-bold">EJ</span>
              </div>
              <div class="ms-3">
                <h6 class="mb-0 fw-bold">Emily Johnson</h6>
                <small class="text-muted">Mobile Developer</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 bg-primary text-white">
  <div class="container text-center">
    <h2 class="display-5 fw-bold mb-3 scroll-animate">Siap Mulai Belajar?</h2>
    <p class="lead mb-4 scroll-animate delay-1">Bergabunglah dengan ribuan pelajar dan mulai perjalanan belajar Anda hari ini</p>
    <div class="scroll-animate delay-2">
      <a href="/contact" class="btn btn-light btn-lg me-2">Mulai Belajar</a>
      <a href="/portfolio" class="btn btn-outline-light btn-lg">Jelajahi Kursus</a>
    </div>
  </div>
</section>
@endsection
