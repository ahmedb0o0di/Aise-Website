@extends('layouts.app')

@section('title', 'Blog & Insights')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">Intelligence & Trends</div>
         <h1 class="display-4 fw-bold">Latest Articles & Insights</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">Expert perspectives on generative search, brand equity, algorithmic growth, and AI transformation.</p>
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
