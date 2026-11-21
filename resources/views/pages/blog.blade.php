@extends('layouts.app')

@section('title', 'Blog & Insights')

@section('content')
   <!-- BLOG HERO BANNER -->
   <section class="blog-hero-banner position-relative text-center d-flex align-items-center justify-content-center" 
      style="min-height: 420px; padding: 160px 0 90px; background-image: url('{{ $settings->blog_hero_image_url }}'); background-size: cover; background-position: center center; position: relative; overflow: hidden;">
      <!-- Elegant Dark Gradient Overlay guaranteeing high contrast in both themes -->
      <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(180deg, rgba(12, 12, 16, 0.72) 0%, rgba(12, 12, 16, 0.92) 100%); pointer-events: none;"></div>
      <div class="container position-relative" style="z-index: 2;">
         <div class="sec-badge mx-auto mb-3" data-aos="fade-down" style="background: rgba(255, 82, 37, 0.15); color: #ff5225; border: 1px solid rgba(255, 82, 37, 0.35);">
            <i class="fas fa-newspaper me-1"></i> Intelligence & Trends
         </div>
         <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up" style="letter-spacing: -0.5px;">
            Latest Articles & <span style="background: linear-gradient(135deg, #ff5225 0%, #ff8a65 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Insights</span>
         </h1>
         <p class="lead mx-auto mb-4" data-aos="fade-up" data-aos-delay="100" style="max-width: 680px; color: rgba(255, 255, 255, 0.88); font-size: 1.15rem; line-height: 1.6;">
            Expert perspectives on generative search, brand equity, algorithmic growth, and AI transformation.
         </p>
         <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb justify-content-center mb-0" style="background: transparent; font-size: 0.9rem;">
               <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.75); text-decoration: none;"><i class="fas fa-home me-1"></i> Home</a></li>
               <li class="breadcrumb-item active" aria-current="page" style="color: #ff5225 !important; font-weight: 600;">Blog</li>
            </ol>
         </nav>
      </div>
   </section>

   <!-- ARTICLES LIST -->
   <section id="news" class="py-5">
      <div class="container">
         <div class="row g-4">
            @foreach($articles as $art)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="news-card" data-bs-toggle="modal" data-bs-target="#artM{{ $art->id }}">
                  <div class="news-img-wrap"><img class="news-img" src="{{ asset($art->image ?? 'assets/images/blog/blog-1.jpg') }}" alt="{{ $art->title }}"></div>
                  <div class="news-body">
                     <span class="news-cat">{{ $art->category }}</span>
                     <h4 class="news-title">{{ $art->title }}</h4>
                     <p class="news-ex">{{ $art->excerpt }}</p>
                     <div class="news-meta">
                        <span><i class="fas fa-calendar"></i> {{ $art->published_at ? $art->published_at->format('M d, Y') : '' }}</span>
                        <span><i class="fas fa-clock"></i> {{ $art->reading_time }}</span>
                     </div>
                     <div class="news-rm">Read Article <i class="fas fa-arrow-right"></i></div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
@endsection
