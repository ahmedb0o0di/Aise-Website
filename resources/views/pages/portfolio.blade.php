@extends('layouts.app')

@section('title', 'Work & Portfolio')

@section('content')
   <!-- WORK / PORTFOLIO HERO BANNER -->
   <section class="work-hero-banner position-relative text-center d-flex align-items-center justify-content-center" 
      style="min-height: 420px; padding: 160px 0 90px; background-image: url('{{ $settings->portfolio_hero_image_url }}'); background-size: cover; background-position: center center; position: relative; overflow: hidden;">
      <!-- Elegant Dark Gradient Overlay guaranteeing high contrast in both themes -->
      <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(180deg, rgba(12, 12, 16, 0.72) 0%, rgba(12, 12, 16, 0.92) 100%); pointer-events: none;"></div>
      <div class="container position-relative" style="z-index: 2;">
         <div class="sec-badge mx-auto mb-3" data-aos="fade-down" style="background: rgba(255, 82, 37, 0.15); color: #ff5225; border: 1px solid rgba(255, 82, 37, 0.35);">
            <i class="fas fa-briefcase me-1"></i> Case Studies & Portfolio
         </div>
         <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up" style="letter-spacing: -0.5px;">
            Recent Projects & <span style="background: linear-gradient(135deg, #ff5225 0%, #ff8a65 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Impact</span>
         </h1>
         <p class="lead mx-auto mb-4" data-aos="fade-up" data-aos-delay="100" style="max-width: 680px; color: rgba(255, 255, 255, 0.88); font-size: 1.15rem; line-height: 1.6;">
            Explore how we engineer brand authority, high-performance systems, and digital growth for our partners.
         </p>
         <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb justify-content-center mb-0" style="background: transparent; font-size: 0.9rem;">
               <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.75); text-decoration: none;"><i class="fas fa-home me-1"></i> Home</a></li>
               <li class="breadcrumb-item active" aria-current="page" style="color: #ff5225 !important; font-weight: 600;">Work</li>
            </ol>
         </nav>
      </div>
   </section>

   <!-- PORTFOLIO GRID -->
   <section id="portfolio" class="py-5">
      <div class="container">
         <div class="row sec-hd align-items-end mb-4">
            <div class="col-12 text-center">
               <div class="filter-tabs justify-content-center">
                  <button class="ftab active" data-filter="all">All Projects</button>
                  @foreach($categories as $cat)
                     <button class="ftab" data-filter="{{ $cat->slug }}">{{ $cat->name }}</button>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="row g-4" id="pfGrid">
            @foreach($projects as $p)
            <div class="col-lg-4 col-md-6 pf-cat" data-cat="{{ $p->category->slug ?? 'all' }}" data-aos="fade-up">
               <div class="pf-item" style="height:320px;" data-bs-toggle="modal" data-bs-target="#pfM{{ $p->id }}">
                  <img class="pf-img" src="{{ asset($p->image ?? 'assets/images/portfolio/p1.jpg') }}" alt="{{ $p->title }}">
                  <div class="pf-ov">
                     <div>
                        <div class="pf-cat">{{ $p->category->name ?? 'Work' }}</div>
                        <h3 class="pf-name">{{ $p->title }}</h3>
                     </div>
                  </div>
                  <div class="pf-plus"><i class="fas fa-plus"></i></div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
@endsection
