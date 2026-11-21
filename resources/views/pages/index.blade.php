@extends('layouts.app')

@section('title', 'Home')

@section('content')
   <!-- ==================== HERO ==================== -->
   <section id="hero">
      <div class="hero-pbg" id="heroPBG" style="transform: translateY(0px); @if(!empty($settings->hero_image_url)) background-image: url('{{ $settings->hero_image_url }}'); @endif"></div>
      <div class="hero-ov"></div>
      <div class="hero-grain"></div>
      <div class="hero-glow" style="top:-120px;right:-80px;"></div>
      <div class="container hero-content">
         <div class="row align-items-center">
            <div class="col-lg-7">
               <div class="hero-tag"><span class="hero-dot"></span>{{ $settings->hero_badge ?? 'Award-Winning Digital Agency' }}</div>
               <h1 class="hero-title">{!! $settings->hero_title ?? 'We <span class="hl">Transform</span><br>Bold Ideas Into<br>Digital <span class="hl">Growth</span>' !!}</h1>
               <p class="hero-desc">{{ $settings->hero_description ?? 'By immersing ourselves in your brand, we challenge the ordinary and turn bold ideas into strategic digital experiences that drive real, measurable growth.' }}</p>
               <div class="hero-btns">
                  <a href="{{ route('services') }}" class="btn-hp">Explore Services <i class="fas fa-arrow-right"></i></a>
                  @if(!empty($settings->hero_video_url))
                  <a href="{{ $settings->hero_video_url }}" class="btn-hs magnific_popup">
                     <div class="pico"><i class="fas fa-play"></i></div>
                     <span>Watch Our Story</span>
                  </a>
                  @endif
               </div>
               @if($heroStats->count() > 0)
               <div class="hero-stats">
                  @foreach($heroStats as $index => $stat)
                     <div class="hstat">
                        <div class="hstat-num"><span class="counter" data-count="{{ $stat->number }}">{{ $stat->number }}</span><span>{{ $stat->suffix }}</span></div>
                        <div class="hstat-lbl">{{ $stat->label }}</div>
                     </div>
                     @if(!$loop->last)
                        <div class="hstat-div"></div>
                     @endif
                  @endforeach
               </div>
               @endif
            </div>
         </div>
      </div>
      <div class="scroll-ind">
         <div class="scroll-mouse"></div>
         <div class="scroll-txt">Scroll Down</div>
      </div>
   </section>

   <!-- ==================== TICKER ==================== -->
   @if($tickerItems->count() > 0)
   <div class="ticker">
      <div class="ticker-track">
         @foreach($tickerItems as $item)
            <div class="tick-item"><span class="tick-dot"></span>{{ $item->text }}</div>
         @endforeach
         @foreach($tickerItems as $item)
            <div class="tick-item"><span class="tick-dot"></span>{{ $item->text }}</div>
         @endforeach
      </div>
   </div>
   @endif

   <!-- ==================== FEATURES ==================== -->
   @if($features->count() > 0)
   <section id="features">
      <div class="container">
         <div class="row g-4">
            @foreach($features as $feat)
            <div class="col-lg-3 col-md-6 aos-init aos-animate" data-aos="fade-up">
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

   <!-- ==================== ABOUT ==================== -->
   <section id="about">
      <div class="container">
         <div class="row align-items-center g-5">
            <div class="col-lg-5 aos-init aos-animate" data-aos="fade-right">
               <div class="about-img-wrap">
                  <img class="about-img" src="{{ $settings->about_image_url }}" alt="About Astra Intelligence Services">
                  <div class="about-exp">
                     <div class="about-exp-n">{{ $settings->about_experience_years ?? '2025' }}</div>
                     <div class="about-exp-l">{{ str_contains($settings->about_experience_years ?? '', '202') ? 'Established' : 'Years of Excellence' }}</div>
                  </div>
                  <div class="about-clients">
                     <div class="cl-avs">
                        <img class="cl-av" src="{{ asset('assets/images/about/ab1.jpg') }}" alt="">
                        <img class="cl-av" src="{{ asset('assets/images/about/ab2.jpg') }}" alt="">
                        <img class="cl-av" src="{{ asset('assets/images/about/ab3.jpg') }}" alt="">
                     </div>
                     <div class="cl-cnt">{{ $settings->about_clients_count ?? '50+' }} Enterprise Clients</div>
                     <div class="cl-lbl">{{ $settings->about_satisfaction_rate ?? '99%' }} satisfaction rate</div>
                  </div>
               </div>
            </div>
            <div class="col-lg-7 aos-init aos-animate" data-aos="fade-left">
               <div class="about-cnt">
                  <div class="sec-badge">{{ $settings->about_badge ?? 'About Astra Intelligence' }}</div>
                  <h2 class="sec-title">{!! $settings->about_title ?? 'Pioneering Next-Gen <span>Digital Intelligence</span>' !!}</h2>
                  <p class="about-desc">{{ $settings->about_description_1 }}</p>
                  @if(!empty($settings->about_description_2))
                     <p class="about-desc">{{ $settings->about_description_2 }}</p>
                  @endif
                  <a href="{{ route('contact') }}" class="btn-p">Work With Us <i class="fas fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- ==================== SERVICES ==================== -->
   <section id="services">
      <div class="container">
         <div class="row sec-hd">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
               <div class="sec-badge">Our Services</div>
               <h2 class="sec-title">Services Designed to <span>Drive Growth</span></h2>
            </div>
            <div class="col-lg-6 d-flex align-items-end aos-init aos-animate" data-aos="fade-left">
               <p class="sec-desc ms-auto">A comprehensive suite of digital marketing services, each crafted to deliver measurable impact for your business.</p>
            </div>
         </div>
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

   <!-- ==================== SHOWREEL ==================== -->
   <section id="showreel">
      <div class="sr-bg"></div>
      <div class="container sr-cnt">
         <div class="d-flex align-items-center justify-content-center flex-wrap gap-3">
            <div class="sr-yr">©2026</div>
            <div class="sr-play">
               <a href="{{ $settings->hero_video_url ?? 'https://www.youtube.com/watch?v=RXv_uIN6e-Y' }}" class="sr-play magnific_popup">
                  <div class="pico"><i class="fas fa-play"></i></div>
               </a>
            </div>
            <h2 class="sr-title">SHOWREEL</h2>
            <i class="fas fa-star sr-star"></i>
            <h2 class="sr-title">HIGHLIGHTS</h2>
         </div>
      </div>
      @if($showreelItems->count() > 0)
      <div class="mq-wrap">
         <div class="mq-track">
            @foreach($showreelItems as $it)
               <span class="mq-item">{{ $it->text }} <span>★</span></span>
            @endforeach
            @foreach($showreelItems as $it)
               <span class="mq-item">{{ $it->text }} <span>★</span></span>
            @endforeach
         </div>
      </div>
      @endif
   </section>

   <!-- ==================== PORTFOLIO ==================== -->
   <section id="portfolio">
      <div class="container">
         <div class="row sec-hd text-center mb-4">
            <div class="col-12" data-aos="fade-up">
               <div class="sec-badge mx-auto mb-2">Our Work</div>
               <h2 class="sec-title mb-3">Recent <span>Projects</span></h2>
            </div>
            <div class="col-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
               <div class="filter-tabs justify-content-center flex-nowrap" style="white-space: nowrap; overflow-x: auto; max-width: 100%;">
                  <button class="ftab active" data-filter="all">All Projects</button>
                  @foreach($categories as $cat)
                     <button class="ftab" data-filter="{{ $cat->slug }}">{{ $cat->name }}</button>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="row g-4" id="pfGrid" data-aos="fade-up" data-aos-delay="150">
            @foreach($projects as $p)
            <div class="col-lg-4 col-md-6 pf-cat" data-cat="{{ $p->filter_categories }}">
               <div class="pf-item" style="height:320px;" data-bs-toggle="modal" data-bs-target="#pfM{{ $p->id }}">
                  <img class="pf-img" src="{{ asset($p->image ?? 'assets/images/portfolio/p1.jpg') }}" alt="{{ $p->title }}">
                  <div class="pf-ov">
                     <div>
                        <div class="pf-cat">{{ $p->category_display_name }}</div>
                        <h3 class="pf-name">{{ $p->title }}</h3>
                     </div>
                  </div>
                  <div class="pf-plus"><i class="fas fa-plus"></i></div>
               </div>
            </div>
            @endforeach
         </div>

         <!-- Portfolio Pagination & View All CTA -->
         <div class="row mt-5 pt-2 align-items-center justify-content-between g-3" id="pfControls" data-aos="fade-up">
            <div class="col-12 col-md-auto d-flex justify-content-center justify-content-md-start">
               <nav aria-label="Portfolio pagination">
                  <ul class="pagination portfolio-pagination mb-0" id="pfPagination">
                     <!-- Dynamically generated via JS -->
                  </ul>
               </nav>
            </div>
            <div class="col-12 col-md-auto text-center text-md-end">
               <a href="{{ route('portfolio') }}" class="btn-p d-inline-flex align-items-center gap-2" style="padding: 12px 28px; font-size: 0.95rem; font-weight: 600; border-radius: 50px;">
                  <span>View All Projects</span>
                  <i class="fas fa-arrow-right"></i>
               </a>
            </div>
         </div>
      </div>
   </section>

   @if(false)
   <!-- ==================== TEAM ==================== -->
   <section id="team">
      <div class="container">
         <div class="row sec-hd">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
               <div class="sec-badge">Our People</div>
               <h2 class="sec-title">Meet the Team of <span>Experts</span></h2>
            </div>
            <div class="col-lg-6 d-flex align-items-end aos-init aos-animate" data-aos="fade-left">
               <p class="sec-desc ms-auto">Strategists, designers, developers, and marketers united by a passion for exceptional work and client results.</p>
            </div>
         </div>
         <div class="row g-4">
            @foreach($team as $tm)
            <div class="col-lg-3 col-md-4 col-6 aos-init aos-animate" data-aos="fade-up">
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
   @endif

   @if(false)
   <!-- ==================== PRICING ==================== -->
   <section id="pricing">
      <div class="container">
         <div class="row sec-hd">
            <div class="col-12 text-center aos-init aos-animate" data-aos="fade-up">
               <div class="sec-badge">Pricing</div>
               <h2 class="sec-title">Simple, <span>Transparent</span> Pricing</h2>
               <p class="sec-desc mx-auto">Choose the plan that fits your growth stage. All plans include a 14-day free trial.</p>
            </div>
         </div>
         <div class="pr-toggle-wrap aos-init aos-animate" data-aos="fade-up">
            <span class="pr-lbl on" id="prMoLbl">Monthly</span>
            <button class="pr-sw" id="prSw">
               <div class="pr-knob"></div>
            </button>
            <span class="pr-lbl" id="prYrLbl">Yearly <span class="save-b">Save 20%</span></span>
         </div>
         <div class="row g-4 justify-content-center">
            @foreach($plans as $index => $plan)
            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up">
               <div class="pr-card {{ $plan->is_popular ? 'feat' : '' }}">
                  @if($plan->is_popular)
                     <div class="pr-popular">Most Popular</div>
                  @endif
                  <div class="pr-tier">{{ $plan->name }}</div>
                  <div class="pr-price-wrap">
                     @if($plan->monthly_price !== 'Custom')
                        <span class="pr-cur">{{ $plan->currency }}</span>
                        <span class="pr-amt" id="pr{{ $index + 1 }}">{{ $plan->monthly_price }}</span>
                        <span class="pr-per">{{ $plan->period_label }}</span>
                     @else
                        <span class="pr-amt" style="font-size:2.5rem" id="pr{{ $index + 1 }}">Custom</span>
                     @endif
                  </div>
                  <p class="pr-desc">{{ $plan->description }}</p>
                  <div class="pr-hr"></div>
                  @if(!empty($plan->features) && is_array($plan->features))
                  <ul class="pr-feats">
                     @foreach($plan->features as $f)
                        <li class="{{ empty($f['included']) ? 'no' : '' }}">
                           <i class="fas {{ !empty($f['included']) ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                           {{ $f['text'] ?? '' }}
                        </li>
                     @endforeach
                  </ul>
                  @endif
                  <a href="{{ $plan->button_link }}" class="btn-pr">{{ $plan->button_text }}</a>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   @endif

   @if(false)
   <!-- ==================== TESTIMONIALS ==================== -->
   <section id="testimonials">
      <div class="tst-bg"></div>
      <div class="container position-relative" style="z-index:1">
         <div class="row sec-hd">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
               <div class="sec-badge">Testimonials</div>
               <h2 class="sec-title" style="color:#fff">What Our <span>Clients Say</span></h2>
            </div>
            <div class="col-lg-6 d-flex align-items-end aos-init aos-animate" data-aos="fade-left">
               <p class="sec-desc ms-auto" style="color:rgba(255,255,255,.55)">Don't take our word for it — hear from the brands we've helped grow significantly.</p>
            </div>
         </div>
         <div class="swiper tstSwiper aos-init aos-animate" data-aos="fade-up">
            <div class="swiper-wrapper pb-5">
               @foreach($testimonials as $tst)
               <div class="swiper-slide h-auto">
                  <div class="tst-card">
                     <span class="tst-q">"</span>
                     <div class="tst-stars">
                        @for($i = 1; $i <= 5; $i++)
                           @if($tst->rating >= $i)
                              <i class="fas fa-star"></i>
                           @elseif($tst->rating >= $i - 0.5)
                              <i class="fas fa-star-half-alt"></i>
                           @else
                              <i class="far fa-star"></i>
                           @endif
                        @endfor
                     </div>
                     <p class="tst-txt">{{ $tst->quote }}</p>
                     <div class="tst-auth">
                        <img class="tst-av" src="{{ asset($tst->author_image ?? 'assets/images/testimonials/testimonial-1.jpg') }}" alt="{{ $tst->author_name }}">
                        <div>
                           <div class="tst-name">{{ $tst->author_name }}</div>
                           <div class="tst-co">{{ $tst->author_title }}</div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="swiper-pagination"></div>
         </div>
      </div>
   </section>
   @endif

   <!-- ==================== FAQ ==================== -->
   <section id="faq">
      <div class="container">
         <div class="row sec-hd">
            <div class="col-lg-5 aos-init aos-animate" data-aos="fade-right">
               <div class="sec-badge">FAQ</div>
               <h2 class="sec-title">Frequently Asked <span>Questions</span></h2>
               <p class="sec-desc">Everything you need to know about partnering with Astra Intelligence Services.</p>
               <a href="{{ route('contact') }}" class="btn-p mt-4">Still have questions? <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="col-lg-7 aos-init aos-animate" data-aos="fade-left">
               <div class="accordion faq-acc" id="faqAcc">
                  @foreach($faqs as $index => $faq)
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#fq{{ $faq->id }}">
                           {{ $faq->question }}
                        </button>
                     </h2>
                     <div id="fq{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAcc">
                        <div class="accordion-body">{{ $faq->answer }}</div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- ==================== LATEST NEWS ==================== -->
   <section id="news">
      <div class="container">
         <div class="row sec-hd align-items-end">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
               <div class="sec-badge">Blog &amp; Resources</div>
               <h2 class="sec-title">Latest <span>Insights</span></h2>
            </div>
            <div class="col-lg-6 text-lg-end aos-init aos-animate" data-aos="fade-left">
               <a href="{{ route('blog') }}" class="btn-o">View All Posts <i class="fas fa-arrow-right"></i></a>
            </div>
         </div>
         <div class="row g-4">
            @foreach($articles->take(3) as $art)
            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up">
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

   <!-- ==================== CONTACT ==================== -->
   <section id="contact">
      <div class="container">
         <div class="row sec-hd">
            <div class="col-12 text-center aos-init aos-animate" data-aos="fade-up">
               <div class="sec-badge">Get in Touch</div>
               <h2 class="sec-title">Let's Start a <span>Conversation</span></h2>
               <p class="sec-desc mx-auto">Ready to grow? Tell us about your project and we'll respond within 24 hours.</p>
            </div>
         </div>
         <div class="row g-5 align-items-start">
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-right">
               <div class="ci-item">
                  <div class="ci-ico"><i class="fas fa-map-marker-alt"></i></div>
                  <div>
                     <div class="ci-lbl">Our Office</div>
                     <div class="ci-val">
                        @if(!empty($settings->google_map_link))
                           <a href="{{ $settings->google_map_link }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none">
                              {{ $settings->contact_address }} <i class="fas fa-external-link-alt ms-1 small text-primary"></i>
                           </a>
                        @else
                           {{ $settings->contact_address }}
                        @endif
                     </div>
                  </div>
               </div>
               <div class="ci-item">
                  <div class="ci-ico"><i class="fas fa-phone"></i></div>
                  <div>
                     <div class="ci-lbl">Call Us</div>
                     <div class="ci-val">
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="text-reset text-decoration-none">{{ $settings->contact_phone }}</a>
                        @if(!empty($settings->contact_phone_secondary))
                           <br><a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone_secondary) }}" class="text-reset text-decoration-none">{{ $settings->contact_phone_secondary }}</a>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="ci-item">
                  <div class="ci-ico"><i class="fas fa-envelope"></i></div>
                  <div>
                     <div class="ci-lbl">Email Us</div>
                     <div class="ci-val">
                        <a href="mailto:{{ $settings->contact_email }}" class="text-reset text-decoration-none">{{ $settings->contact_email }}</a>
                        @if(!empty($settings->contact_email_secondary))
                           <br><a href="mailto:{{ $settings->contact_email_secondary }}" class="text-reset text-decoration-none">{{ $settings->contact_email_secondary }}</a>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="ci-item">
                  <div class="ci-ico"><i class="fas fa-clock"></i></div>
                  <div>
                     <div class="ci-lbl">Business Hours</div>
                     <div class="ci-val">{{ $settings->business_hours }}</div>
                  </div>
               </div>
            </div>
            <div class="col-lg-8 aos-init aos-animate" data-aos="fade-left">
               <div class="cf-wrap">
                  <form id="contactForm">
                     @csrf
                     <div class="row g-3">
                        <div class="col-md-6">
                           <label class="form-label">First Name *</label>
                           <input type="text" name="first_name" class="form-control" placeholder="Your first name" required>
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Last Name</label>
                           <input type="text" name="last_name" class="form-control" placeholder="Your last name">
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Email Address *</label>
                           <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Phone Number</label>
                           <input type="tel" name="phone" class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Company</label>
                           <input type="text" name="company" class="form-control" placeholder="Your company name">
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Service of Interest</label>
                           <select name="service_of_interest" class="form-select">
                              <option value="">Select a service</option>
                              @foreach($services as $svc)
                                 <option value="{{ $svc->title }}">{{ $svc->title }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-12">
                           <label class="form-label">Project Budget</label>
                           <select name="budget" class="form-select">
                              <option value="">Select budget range</option>
                              <option>Under $1,000/month</option>
                              <option>$1,000 – $3,000/month</option>
                              <option>$3,000 – $10,000/month</option>
                              <option>$10,000+/month</option>
                              <option>Let's discuss</option>
                           </select>
                        </div>
                        <div class="col-12">
                           <label class="form-label">Tell Us About Your Project *</label>
                           <textarea name="message" class="form-control" rows="4" placeholder="Describe your goals, challenges, and what you're looking to achieve..." required></textarea>
                        </div>
                        <div class="col-12">
                           <button type="submit" class="btn-p w-100 justify-content-center" id="cfSubmit">
                              Send Message <i class="fas fa-paper-plane ms-1"></i>
                           </button>
                        </div>
                     </div>
                  </form>
                  <div id="cfFeedback" class="alert alert-success mt-3" style="display:none;"></div>
               </div>
            </div>
         </div>

         <!-- GOOGLE MAP EMBED IN HOMEPAGE CONTACT -->
         <div class="row mt-5">
            <div class="col-12 aos-init aos-animate" data-aos="fade-up">
               <div style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: var(--bg2); box-shadow: 0 20px 45px rgba(0,0,0,0.22);">
                  <div class="d-flex justify-content-between align-items-center py-3 px-4 flex-wrap gap-3" 
                     style="border-bottom: 1px solid rgba(255, 255, 255, 0.08); background: var(--bg2);">
                     <div class="d-flex align-items-center gap-3">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(255, 82, 37, 0.15); display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 1.25rem;">
                           <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                           <div style="font-weight: 700; font-size: 1.05rem; color: var(--text-heading, inherit);">Our Headquarters in Hurghada</div>
                           <div style="font-size: 0.88rem; color: var(--text-muted, #94a3b8);">{{ $settings->contact_address }}</div>
                        </div>
                     </div>
                     @if(!empty($settings->google_map_link))
                        <a href="{{ $settings->google_map_link }}" target="_blank" rel="noopener noreferrer" class="btn-p btn-sm d-inline-flex align-items-center gap-2" style="padding: 10px 22px; font-weight: 600; text-decoration: none;">
                           <span>Open in Google Maps</span>
                           <i class="fas fa-external-link-alt"></i>
                        </a>
                     @endif
                  </div>
                  <iframe 
                     src="{{ $settings->google_map_embed ?: 'https://maps.google.com/maps?q=27.3211575,33.6996941&hl=en&z=15&output=embed' }}" 
                     width="100%" 
                     height="420" 
                     style="border:0; display:block;" 
                     allowfullscreen="" 
                     loading="lazy" 
                     referrerpolicy="no-referrer-when-downgrade">
                  </iframe>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- ==================== CTA BOTTOM ==================== -->
   <section id="cta-bottom">
      <div class="cta-pat"></div>
      <div class="container cta-cnt">
         <div class="row align-items-center">
            <div class="col-lg-7 aos-init aos-animate" data-aos="fade-right">
               <div class="sec-badge" style="background:rgba(255,255,255,.15);color:#fff">{{ $settings->cta_badge ?? 'Ready to Grow?' }}</div>
               <h2 class="cta-title">{!! $settings->cta_title ?? 'Let\'s Work Together &<br>Build Something <span style="text-decoration:underline;text-decoration-color:rgba(255,255,255,.35)">Great</span>' !!}</h2>
               <p class="cta-desc">{{ $settings->cta_description ?? 'Join forward-thinking organizations that trust Astra to drive their digital growth and strategic intelligence. Start your consultation today.' }}</p>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0 aos-init aos-animate" data-aos="fade-left">
               <div class="d-flex gap-3 justify-content-lg-end flex-wrap">
                  <a href="{{ $settings->cta_button_link ?? route('contact') }}" class="btn-w">{{ $settings->cta_button_text ?? 'Start Free Consultation' }} <i class="fas fa-arrow-right"></i></a>
                  @if(!empty($settings->contact_phone))
                  <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="btn-hs" style="border-color:rgba(255,255,255,.25)"><i class="fas fa-phone"></i> Call Us Now</a>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
      // Pricing Monthly vs Yearly calculation
      const plans = @json($plans);
      let isYearly = false;

      $('#prSw').on('click', function() {
         isYearly = !isYearly;
         $(this).toggleClass('yr', isYearly);
         $('#prMoLbl').toggleClass('on', !isYearly);
         $('#prYrLbl').toggleClass('on', isYearly);

         plans.forEach((plan, idx) => {
            const el = $('#pr' + (idx + 1));
            if (plan.monthly_price !== 'Custom') {
               el.fadeOut(150, function() {
                  $(this).text(isYearly ? (plan.yearly_price || plan.monthly_price) : plan.monthly_price).fadeIn(150);
               });
            }
         });
      });

      // Contact Form submission
      $('#contactForm').on('submit', function(e) {
         e.preventDefault();
         const btn = $('#cfSubmit');
         btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Sending...');

         $.ajax({
            url: "{{ route('contact.submit') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(res) {
               $('#cfFeedback').removeClass('alert-danger').addClass('alert-success').text(res.message).fadeIn();
               $('#contactForm')[0].reset();
               btn.prop('disabled', false).html('Send Message <i class="fas fa-paper-plane ms-1"></i>');
            },
            error: function(err) {
               const msg = err.responseJSON && err.responseJSON.message ? err.responseJSON.message : 'An error occurred. Please try again.';
               $('#cfFeedback').removeClass('alert-success').addClass('alert-danger').text(msg).fadeIn();
               btn.prop('disabled', false).html('Send Message <i class="fas fa-paper-plane ms-1"></i>');
            }
         });
      });
   });
</script>
@endpush
