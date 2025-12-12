@extends('layout')

@section('content')
<!-- Courses Hero Section -->
<section class="courses-hero py-5 mb-5">
  <div class="container">
    <div class="text-center mb-5 scroll-animate">
      <h1 class="display-4 fw-bold mb-3">Explore Our Courses</h1>
      <p class="lead text-muted">Discover comprehensive courses designed to advance your career</p>
    </div>
    
    <!-- Course Categories -->
    <div class="row g-3 mb-5 justify-content-center">
      <div class="col-auto">
        <button class="btn btn-outline-primary category-filter active" data-category="all">All Courses</button>
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-primary category-filter" data-category="web">Web Development</button>
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-primary category-filter" data-category="backend">Backend</button>
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-primary category-filter" data-category="mobile">Mobile</button>
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-primary category-filter" data-category="design">Design</button>
      </div>
    </div>
  </div>
</section>

<!-- Courses Grid -->
<section class="courses-section py-4">
  <div class="container">
    <div class="row g-4" id="coursesGrid">
      @if($projects->count() > 0)
        @foreach($projects as $index => $project)
        @php
          // Determine category from title or description
          $titleLower = strtolower($project->title);
          $descLower = strtolower($project->description ?? '');
          $category = 'web';
          if (strpos($titleLower, 'laravel') !== false || strpos($titleLower, 'php') !== false || strpos($titleLower, 'backend') !== false || strpos($descLower, 'backend') !== false) {
            $category = 'backend';
          } elseif (strpos($titleLower, 'react native') !== false || strpos($titleLower, 'mobile') !== false || strpos($titleLower, 'android') !== false || strpos($titleLower, 'ios') !== false) {
            $category = 'mobile';
          } elseif (strpos($titleLower, 'design') !== false || strpos($titleLower, 'ui') !== false || strpos($titleLower, 'ux') !== false) {
            $category = 'design';
          }
          
          $price = rand(99, 199);
          $oldPrice = rand(0, 1) ? rand(199, 299) : null;
        @endphp
        <div class="col-lg-4 col-md-6 course-card-wrapper scroll-animate delay-{{ ($index % 3) + 1 }}" data-category="{{ $category }}">
          <div class="course-card h-100">
            <div class="course-image-wrapper">
              @if($project->image)
                <img src="{{ asset('projects/' . $project->image) }}" class="course-image" alt="{{ $project->title }}">
              @else
                <div class="course-image-placeholder course-{{ $category }}">
                  <i class="bi bi-book-fill"></i>
                </div>
              @endif
              <div class="course-overlay">
                <div class="course-badge">Featured</div>
                <div class="course-actions">
                  <button class="btn btn-light btn-sm" title="Add to favorites"><i class="bi bi-heart"></i></button>
                  <button class="btn btn-light btn-sm" title="Share course"><i class="bi bi-share"></i></button>
                </div>
              </div>
            </div>
            
            <div class="course-content">
              <div class="course-meta">
                <span class="course-level badge bg-{{ $category === 'web' ? 'primary' : ($category === 'backend' ? 'success' : ($category === 'mobile' ? 'danger' : 'warning')) }}">
                  {{ ucfirst($category) }}
                </span>
                <span class="course-rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <span>4.{{ rand(6, 9) }}</span>
                  <span class="text-muted">({{ number_format(rand(100, 5000), 0) }})</span>
                </span>
              </div>
              
              <h5 class="course-title">{{ $project->title }}</h5>
              <p class="course-description">{{ $project->description ?? 'Master this course and advance your skills with hands-on projects and real-world examples.' }}</p>
              
              <div class="course-footer">
                <div class="course-instructor">
                  <div class="instructor-avatar">{{ substr($project->title, 0, 2) }}</div>
                  <span class="instructor-name">Expert Instructor</span>
                </div>
                <div class="course-price">
                  <span class="price-current">Rp {{ number_format($price * 15000, 0, ',', '.') }}</span>
                  @if($oldPrice)
                    <span class="price-old">Rp {{ number_format($oldPrice * 15000, 0, ',', '.') }}</span>
                  @endif
                </div>
              </div>
              
              <div class="course-stats">
                <div class="stat-item">
                  <i class="bi bi-clock"></i>
                  <span>{{ rand(5, 40) }}h</span>
                </div>
                <div class="stat-item">
                  <i class="bi bi-people"></i>
                  <span>{{ number_format(rand(100, 5000), 0) }}+</span>
                </div>
                <div class="stat-item">
                  <i class="bi bi-file-earmark-text"></i>
                  <span>{{ rand(20, 100) }} lessons</span>
                </div>
              </div>
              
              <div class="course-cta">
                <a href="{{ route('enroll.course', $project->id) }}" class="btn btn-primary w-100">
                  <i class="bi bi-play-circle me-2"></i>Enroll Now
                </a>
                @if($project->link)
                  <a href="{{ $project->link }}" class="btn btn-outline-secondary btn-sm w-100 mt-2" target="_blank" rel="noopener">
                    <i class="bi bi-eye me-1"></i>Preview Course
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @else
        <!-- Sample Courses if no projects exist -->
        @php
          $sampleCourses = [
            [
              'title' => 'Complete Web Development Bootcamp',
              'description' => 'Learn HTML, CSS, JavaScript, React, Node.js, and more. Build 10+ real-world projects.',
              'category' => 'web',
              'level' => 'Beginner',
              'price' => 99,
              'oldPrice' => 199,
              'rating' => 4.9,
              'students' => 12500,
              'hours' => 58,
              'lessons' => 320,
              'icon' => 'code-slash'
            ],
            [
              'title' => 'Laravel & PHP Mastery',
              'description' => 'Master Laravel framework, build REST APIs, authentication, and deploy production apps.',
              'category' => 'backend',
              'level' => 'Intermediate',
              'price' => 129,
              'oldPrice' => null,
              'rating' => 4.8,
              'students' => 8500,
              'hours' => 42,
              'lessons' => 180,
              'icon' => 'server'
            ],
            [
              'title' => 'React Native Mobile Development',
              'description' => 'Create cross-platform mobile apps with React Native. iOS and Android deployment.',
              'category' => 'mobile',
              'level' => 'Advanced',
              'price' => 149,
              'oldPrice' => 249,
              'rating' => 4.7,
              'students' => 6200,
              'hours' => 35,
              'lessons' => 145,
              'icon' => 'phone'
            ],
            [
              'title' => 'UI/UX Design Fundamentals',
              'description' => 'Learn design principles, Figma, prototyping, and create stunning user interfaces.',
              'category' => 'design',
              'level' => 'Beginner',
              'price' => 89,
              'oldPrice' => 179,
              'rating' => 4.6,
              'students' => 9800,
              'hours' => 28,
              'lessons' => 95,
              'icon' => 'palette'
            ],
            [
              'title' => 'Advanced JavaScript & ES6+',
              'description' => 'Deep dive into modern JavaScript, async/await, closures, and advanced patterns.',
              'category' => 'web',
              'level' => 'Intermediate',
              'price' => 119,
              'oldPrice' => null,
              'rating' => 4.9,
              'students' => 11200,
              'hours' => 38,
              'lessons' => 210,
              'icon' => 'braces'
            ],
            [
              'title' => 'Python for Data Science',
              'description' => 'Learn Python, pandas, numpy, matplotlib, and machine learning basics.',
              'category' => 'backend',
              'level' => 'Beginner',
              'price' => 109,
              'oldPrice' => 199,
              'rating' => 4.8,
              'students' => 15400,
              'hours' => 45,
              'lessons' => 195,
              'icon' => 'graph-up'
            ]
          ];
        @endphp
        
        @foreach($sampleCourses as $index => $course)
          <div class="col-lg-4 col-md-6 course-card-wrapper scroll-animate delay-{{ ($index % 3) + 1 }}" data-category="{{ $course['category'] }}">
            <div class="course-card h-100">
              <div class="course-image-wrapper">
                <div class="course-image-placeholder course-{{ $course['category'] }}">
                  <i class="bi bi-{{ $course['icon'] }}" style="font-size: 4rem;"></i>
                </div>
                <div class="course-overlay">
                  <div class="course-badge">Popular</div>
                  <div class="course-actions">
                    <button class="btn btn-light btn-sm"><i class="bi bi-heart"></i></button>
                    <button class="btn btn-light btn-sm"><i class="bi bi-share"></i></button>
                  </div>
                </div>
              </div>
              
              <div class="course-content">
                <div class="course-meta">
                  <span class="course-level badge bg-{{ $course['level'] === 'Beginner' ? 'success' : ($course['level'] === 'Intermediate' ? 'warning' : 'danger') }}">{{ $course['level'] }}</span>
                  <span class="course-rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <span>{{ $course['rating'] }}</span>
                    <span class="text-muted">({{ number_format($course['students'] / 100, 1) }}k)</span>
                  </span>
                </div>
                
                <h5 class="course-title">{{ $course['title'] }}</h5>
                <p class="course-description">{{ $course['description'] }}</p>
                
                <div class="course-footer">
                  <div class="course-instructor">
                    <div class="instructor-avatar">{{ substr($course['title'], 0, 2) }}</div>
                    <span class="instructor-name">Expert Instructor</span>
                  </div>
                  <div class="course-price">
                    <span class="price-current">Rp {{ number_format($course['price'] * 15000, 0, ',', '.') }}</span>
                    @if($course['oldPrice'])
                      <span class="price-old">Rp {{ number_format($course['oldPrice'] * 15000, 0, ',', '.') }}</span>
                    @endif
                  </div>
                </div>
                
                <div class="course-stats">
                  <div class="stat-item">
                    <i class="bi bi-clock"></i>
                    <span>{{ $course['hours'] }}h</span>
                  </div>
                  <div class="stat-item">
                    <i class="bi bi-people"></i>
                    <span>{{ number_format($course['students']) }}+</span>
                  </div>
                  <div class="stat-item">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>{{ $course['lessons'] }} lessons</span>
                  </div>
                </div>
                
                <div class="course-cta">
                  <a href="{{ route('enroll') }}?course={{ urlencode($course['title']) }}" class="btn btn-primary w-100">
                    <i class="bi bi-play-circle me-2"></i>Enroll Now
                  </a>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
@endsection
