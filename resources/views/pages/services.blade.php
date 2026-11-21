@extends('layouts.app')

@section('title', 'Services')

@section('content')
   <!-- SERVICES HERO BANNER -->
   <section class="services-hero-banner position-relative text-center d-flex align-items-center justify-content-center" 
      style="min-height: 420px; padding: 160px 0 90px; background-image: url('{{ $settings->services_hero_image_url }}'); background-size: cover; background-position: center center; position: relative; overflow: hidden;">
      <!-- Elegant Dark Gradient Overlay guaranteeing high contrast in both themes -->
      <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(180deg, rgba(12, 12, 16, 0.72) 0%, rgba(12, 12, 16, 0.92) 100%); pointer-events: none;"></div>
      <div class="container position-relative" style="z-index: 2;">
         <div class="sec-badge mx-auto mb-3" data-aos="fade-down" style="background: rgba(255, 82, 37, 0.15); color: #ff5225; border: 1px solid rgba(255, 82, 37, 0.35);">
            <i class="fas fa-cubes me-1"></i> Enterprise Solutions
         </div>
         <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up" style="letter-spacing: -0.5px;">
            Our Digital <span style="background: linear-gradient(135deg, #ff5225 0%, #ff8a65 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Capabilities</span>
         </h1>
         <p class="lead mx-auto mb-4" data-aos="fade-up" data-aos-delay="100" style="max-width: 680px; color: rgba(255, 255, 255, 0.88); font-size: 1.15rem; line-height: 1.6;">
            A comprehensive suite of digital engineering, AI, marketing, and media solutions designed for high-growth enterprises.
         </p>
         <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb justify-content-center mb-0" style="background: transparent; font-size: 0.9rem;">
               <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.75); text-decoration: none;"><i class="fas fa-home me-1"></i> Home</a></li>
               <li class="breadcrumb-item active" aria-current="page" style="color: #ff5225 !important; font-weight: 600;">Services</li>
            </ol>
         </nav>
      </div>
   </section>

   <!-- SERVICES LIST -->
   <section id="services" class="py-5">
      <div class="container">
         <div class="row g-4">
            @foreach($services as $index => $svc)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="svc-card" data-bs-toggle="modal" data-bs-target="#svcM{{ $svc->id }}">
                  <div class="svc-arr"><i class="fas fa-arrow-right"></i></div>
                  <div class="svc-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                  <div class="svc-ico"><i class="{{ $svc->icon }}"></i></div>
                  <h3 class="svc-title">{{ $svc->title }}</h3>
                  <p class="svc-desc">{{ $svc->short_description }}</p>
                  @if(!empty($svc->tags) && is_array($svc->tags))
                  <div class="svc-tags">
                     @foreach($svc->tags as $tag)
                        <span class="svc-tag">{{ $tag }}</span>
                     @endforeach
                  </div>
                  @endif
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>

   <!-- BOTTOM CTA -->
   <section id="cta-bottom">
      <div class="cta-pat"></div>
      <div class="container cta-cnt">
         <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
               <div class="sec-badge" style="background:rgba(255,255,255,.15);color:#fff">Need a Custom Solution?</div>
               <h2 class="cta-title">Let's Build Your Bespoke Enterprise Stack</h2>
               <p class="cta-desc">Speak directly with our technical leads to architect a solution tailored to your operational KPIs.</p>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
               <a href="{{ route('contact') }}" class="btn-w">Request Proposal <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
         </div>
      </div>
   </section>
@endsection
