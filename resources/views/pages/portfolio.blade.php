@extends('layouts.app')

@section('title', 'Work & Portfolio')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">Case Studies</div>
         <h1 class="display-4 fw-bold">Recent Projects & Impact</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">Explore how we have engineered brand authority, algorithmic search dominance, and digital growth for our partners.</p>
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
