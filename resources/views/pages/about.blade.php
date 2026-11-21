@extends('layouts.app')

@section('title', 'About Us')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">{{ $settings->about_badge ?? 'About Our Agency' }}</div>
         <h1 class="display-4 fw-bold">{!! $settings->about_title ?? 'About Our Agency' !!}</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">{{ $settings->tagline }}</p>
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
