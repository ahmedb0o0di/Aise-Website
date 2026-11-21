@extends('layouts.app')

@section('title', 'Our Team')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">Our People</div>
         <h1 class="display-4 fw-bold">The Strategic Minds</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">A multidisciplinary collective of creators, data scientists, engineers, and brand strategists committed to excellence.</p>
      </div>
   </section>

   <!-- TEAM GRID -->
   <section id="team" class="py-5">
      <div class="container">
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
                     <div class="tm-soc">
                        @if(!empty($tm->linkedin_url))<a href="{{ $tm->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                        @if(!empty($tm->twitter_url))<a href="{{ $tm->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                        @if(!empty($tm->dribbble_url))<a href="{{ $tm->dribbble_url }}" target="_blank"><i class="fab fa-dribbble"></i></a>@endif
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
@endsection
