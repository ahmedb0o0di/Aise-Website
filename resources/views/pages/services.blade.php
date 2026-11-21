@extends('layouts.app')

@section('title', 'Services')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">Enterprise Solutions</div>
         <h1 class="display-4 fw-bold">Our Digital Capabilities</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">A comprehensive suite of digital engineering, AI, marketing, and media solutions designed for high-growth enterprises.</p>
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
