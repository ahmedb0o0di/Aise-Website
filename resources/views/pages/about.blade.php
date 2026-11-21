@extends('layouts.app')

@section('title', 'About Us')

@section('content')
   <!-- ABOUT PAGE HERO BANNER -->
   <section class="about-hero-banner position-relative text-center d-flex align-items-center justify-content-center" 
      style="min-height: 420px; padding: 160px 0 90px; background-image: url('{{ $settings->about_hero_image_url }}'); background-size: cover; background-position: center center; position: relative; overflow: hidden;">
      <!-- Elegant Dark Gradient Overlay guaranteeing high contrast in both themes -->
      <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(180deg, rgba(12, 12, 16, 0.72) 0%, rgba(12, 12, 16, 0.92) 100%); pointer-events: none;"></div>
      <div class="container position-relative" style="z-index: 2;">
         <div class="sec-badge mx-auto mb-3" data-aos="fade-down" style="background: rgba(255, 82, 37, 0.15); color: #ff5225; border: 1px solid rgba(255, 82, 37, 0.35);">
            <i class="fas fa-shield-halved me-1"></i> {{ $settings->about_badge ?? 'About Our Agency' }}
         </div>
         <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up" style="letter-spacing: -0.5px;">
            {!! $settings->about_title ?? 'About Our <span style="background: linear-gradient(135deg, #ff5225 0%, #ff8a65 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Agency</span>' !!}
         </h1>
         <p class="lead mx-auto mb-4" data-aos="fade-up" data-aos-delay="100" style="max-width: 680px; color: rgba(255, 255, 255, 0.88); font-size: 1.15rem; line-height: 1.6;">
            {{ $settings->tagline ?? 'We Transform Bold Ideas Into Strategic Digital Experiences' }}
         </p>
         <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb justify-content-center mb-0" style="background: transparent; font-size: 0.9rem;">
               <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.75); text-decoration: none;"><i class="fas fa-home me-1"></i> Home</a></li>
               <li class="breadcrumb-item active" aria-current="page" style="color: #ff5225 !important; font-weight: 600;">About Us</li>
            </ol>
         </nav>
      </div>
   </section>

   <!-- ABOUT CONTENT -->
   <section id="about" class="py-5">
      <div class="container">
         <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
               <div class="about-img-wrap">
                  <img class="about-img" src="{{ $settings->about_image_url }}" alt="About">
                  <div class="about-exp">
                     <div class="about-exp-n">{{ $settings->about_experience_years ?? '2025' }}</div>
                     <div class="about-exp-l">{{ str_contains($settings->about_experience_years ?? '', '202') ? 'Established' : 'Years of Excellence' }}</div>
                  </div>
               </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
               <div class="about-cnt">
                  <h2 class="sec-title mb-4">Driving Measurable Results Through Strategic Digital Intelligence</h2>
                  <p class="about-desc mb-3">{{ $settings->about_description_1 }}</p>
                  @if(!empty($settings->about_description_2))
                     <p class="about-desc mb-4">{{ $settings->about_description_2 }}</p>
                  @endif
                  <div class="row g-3 mb-4">
                     <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                           <i class="fas fa-check-circle text-primary fs-4"></i>
                           <span class="fw-semibold">Award-Winning Creative Studio</span>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                           <i class="fas fa-check-circle text-primary fs-4"></i>
                           <span class="fw-semibold">Data-Backed Growth Engineering</span>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                           <i class="fas fa-check-circle text-primary fs-4"></i>
                           <span class="fw-semibold">50+ Specialist Strategists</span>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                           <i class="fas fa-check-circle text-primary fs-4"></i>
                           <span class="fw-semibold">24/7 Dedicated Support & SLA</span>
                        </div>
                     </div>
                  </div>
                  <a href="{{ route('contact') }}" class="btn-p">Get in Touch <i class="fas fa-arrow-right ms-1"></i></a>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- FEATURES HIGHLIGHT -->
   @if($features->count() > 0)
   <section id="features" class="py-5" style="background:var(--bg2);">
      <div class="container">
         <div class="row g-4">
            @foreach($features as $feat)
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
               <div class="feat-card">
                  <div class="feat-ico"><i class="{{ $feat->icon }}"></i></div>
                  <h4 class="feat-title">{{ $feat->title }}</h4>
                  <p class="feat-desc">{{ $feat->description }}</p>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   @endif

   <!-- TEAM -->
   <section id="team" class="py-5">
      <div class="container">
         <div class="row sec-hd text-center">
            <div class="col-12" data-aos="fade-up">
               <div class="sec-badge mx-auto">Our Experts</div>
               <h2 class="sec-title">Meet the Leaders Behind the Growth</h2>
            </div>
         </div>
         <div class="row g-4">
            @foreach($team as $tm)
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
               <div class="tm-card" data-bs-toggle="modal" data-bs-target="#tmM{{ $tm->id }}">
                  <div class="tm-img-wrap">
                     <img class="tm-img" src="{{ asset($tm->image ?? 'assets/images/team/team-1.jpg') }}" alt="{{ $tm->name }}">
                     <div class="tm-img-ov">
                        <div class="tm-view"><i class="fas fa-user"></i></div>
                     </div>
                  </div>
                  <div class="tm-info">
                     <h5 class="tm-name">{{ $tm->name }}</h5>
                     <div class="tm-role">{{ $tm->role }}</div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
@endsection
