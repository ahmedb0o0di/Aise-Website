<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="{{ $settings->meta_description ?? 'Astra Intelligence Services — We transform bold ideas into strategic digital experiences that drive real, measurable growth.' }}">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title', 'Home') — {{ $settings->site_name ?? 'Astra Intelligence Services Egypt' }}</title>

   <!-- Favicon -->
   <link rel="icon" type="image/png" href="{{ asset($settings->favicon ?? 'favicon.png') }}">
   <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

   <!-- Google Fonts: Phudu & Instrument Sans -->
   <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Phudu:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

   <!-- Font Awesome 6 Icons -->
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/all.min.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

   <!-- Vendor Stylesheets -->
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/swiper-bundle.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">

   <!-- Structured Custom Stylesheets -->
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   @stack('styles')
</head>

<body>
   <!-- LOADER -->
   <div id="loader">
      <div class="ldr-brand d-flex align-items-center gap-3 mb-2">
         <img src="{{ asset($settings->logo_light ?? 'assets/images/logo-white.png') }}" alt="{{ $settings->site_name }}" class="brand-logo">
      </div>
      <div class="ldr-bar">
         <div class="ldr-prog"></div>
      </div>
   </div>

   <!-- CURSOR -->
   <div class="c-dot" id="cDot"></div>
   <div class="c-ring" id="cRing"></div>

   <!-- SCROLL TOP -->
   <button id="scrtop"><i class="fas fa-arrow-up"></i></button>

   <!-- ==================== TOPBAR ==================== -->
   <div id="topbar">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-7 tb-l">
               @if(!empty($settings->contact_email))
                  <a href="mailto:{{ $settings->contact_email }}"><i class="fas fa-envelope"></i>{{ $settings->contact_email }}</a>
               @endif
               @if(!empty($settings->contact_phone))
                  <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}"><i class="fas fa-phone"></i>{{ $settings->contact_phone }}</a>
               @endif
               @if(!empty($settings->contact_address))
                  <a href="{{ $settings->google_map_link ?: route('contact') }}" @if(!empty($settings->google_map_link)) target="_blank" rel="noopener noreferrer" @endif><i class="fas fa-map-marker-alt"></i>{{ $settings->contact_address }}</a>
               @endif
            </div>
            <div class="col-lg-5">
               <div class="tb-r">
                  <div class="tb-soc">
                     @if(!empty($settings->twitter_url))<a href="{{ $settings->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                     @if(!empty($settings->linkedin_url))<a href="{{ $settings->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                     @if(!empty($settings->instagram_url))<a href="{{ $settings->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                     @if(!empty($settings->facebook_url))<a href="{{ $settings->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                     @if(!empty($settings->dribbble_url))<a href="{{ $settings->dribbble_url }}" target="_blank"><i class="fab fa-dribbble"></i></a>@endif
                     @if(!empty($settings->youtube_url))<a href="{{ $settings->youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>@endif
                  </div>
                  <button class="t-toggle" id="themeBtn">
                     <div class="t-icon"><i class="fas fa-sun" id="thIco"></i></div>
                     <span id="thLbl">Light Mode</span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- ==================== NAVBAR ==================== -->
   <nav id="navbar" class="navbar navbar-expand-lg">
      <div class="container">
         <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset($settings->logo_dark ?? 'assets/images/logo.png') }}" alt="{{ $settings->site_name }}" class="brand-logo logo-dark">
            <img src="{{ asset($settings->logo_light ?? 'assets/images/logo-white.png') }}" alt="{{ $settings->site_name }}" class="brand-logo logo-light">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <div class="tog-wrap">
               <span class="tog-line"></span><span class="tog-line"></span><span class="tog-line"></span>
            </div>
         </button>
         <div class="collapse navbar-collapse justify-content-center" id="navMenu">
            <ul class="navbar-nav gap-1">
               <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
               <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
               <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
               <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">Work</a></li>
               <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
               <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
            </ul>
         </div>
         <a href="{{ route('contact') }}" class="nav-link nav-cta ms-3 d-none d-lg-inline-flex">Get Started <i class="fas fa-arrow-right ms-1"></i></a>
      </div>
   </nav>

   <!-- MAIN CONTENT -->
   <main>
      @yield('content')
   </main>

   <!-- ==================== FOOTER ==================== -->
   <footer id="footer">
      <div class="container">
         <div class="row g-5">
            <div class="col-lg-5 col-md-12">
               <a class="ft-brand d-flex align-items-center gap-2 mb-3" href="{{ route('home') }}">
                  <img src="{{ asset($settings->logo_light ?? 'assets/images/logo-white.png') }}" alt="{{ $settings->site_name }}" class="brand-logo" style="height: 80px;">
               </a>
               <p class="ft-desc">{{ $settings->footer_about ?? 'Astra Intelligence Services Egypt delivers strategic security consulting, intelligence solutions, and advanced digital capabilities.' }}</p>
               <div class="ft-soc">
                  @if(!empty($settings->twitter_url))<a href="{{ $settings->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                  @if(!empty($settings->linkedin_url))<a href="{{ $settings->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                  @if(!empty($settings->instagram_url))<a href="{{ $settings->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                  @if(!empty($settings->facebook_url))<a href="{{ $settings->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                  @if(!empty($settings->dribbble_url))<a href="{{ $settings->dribbble_url }}" target="_blank"><i class="fab fa-dribbble"></i></a>@endif
                  @if(!empty($settings->youtube_url))<a href="{{ $settings->youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>@endif
               </div>
            </div>
            <div class="col-lg-3 col-md-5 col-6">
               <h6 class="ft-heading">Company</h6>
               <ul class="ft-links">
                  <li><a href="{{ route('about') }}">About Us</a></li>
                  <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                  <li><a href="{{ route('blog') }}">Blog</a></li>
                  <li><a href="{{ route('contact') }}">Contact</a></li>
               </ul>
            </div>
            <div class="col-lg-4 col-md-7">
               <h6 class="ft-heading">Contact Info</h6>
               <div class="ft-ci"><i class="fas fa-map-marker-alt"></i><span>@if(!empty($settings->google_map_link))<a href="{{ $settings->google_map_link }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none">{{ $settings->contact_address }}</a>@else{{ $settings->contact_address }}@endif</span></div>
               <div class="ft-ci"><i class="fas fa-phone"></i><span><a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="text-reset text-decoration-none">{{ $settings->contact_phone }}</a>@if(!empty($settings->contact_phone_secondary))<br><a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone_secondary) }}" class="text-reset text-decoration-none">{{ $settings->contact_phone_secondary }}</a>@endif</span></div>
               <div class="ft-ci"><i class="fas fa-envelope"></i><span><a href="mailto:{{ $settings->contact_email }}" class="text-reset text-decoration-none">{{ $settings->contact_email }}</a>@if(!empty($settings->contact_email_secondary))<br><a href="mailto:{{ $settings->contact_email_secondary }}" class="text-reset text-decoration-none">{{ $settings->contact_email_secondary }}</a>@endif</span></div>
               @if(!empty($settings->business_hours))
               <div class="ft-ci"><i class="fas fa-clock"></i><span>{{ $settings->business_hours }}</span></div>
               @endif
               <h6 class="ft-heading mt-4">Newsletter</h6>
               <form id="newsletterForm" class="d-flex gap-2">
                  @csrf
                  <input type="email" name="email" id="nlEmail" class="form-control"
                     style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);color:#fff"
                     placeholder="Your email address" required>
                  <button type="submit" class="btn-p" style="padding:10px 16px;flex-shrink:0"><i class="fas fa-paper-plane"></i></button>
               </form>
               <div id="nlFeedback" class="mt-2 text-success small" style="display:none;"></div>
            </div>
         </div>
      </div>
      <div class="ft-div"></div>
      <div class="container">
         <div class="ft-bottom">
            <div class="ft-copy">{{ $settings->footer_copyright ?? '© 2026 Astra Intelligence Services Egypt. All rights reserved.' }}</div>
         </div>
      </div>
   </footer>

   <!-- ==================== DYNAMIC MODALS ==================== -->
   <!-- SERVICE MODALS -->
   @foreach($services as $svc)
   <div class="modal fade" id="svcM{{ $svc->id }}" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content overflow-hidden">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <div class="mod-svc-header-img position-relative" style="width: 100%; height: 210px; overflow: hidden; background: #0c0c10;">
               <img src="{{ $svc->image_url }}" alt="{{ $svc->title }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
               <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(12,12,16,0.2) 0%, rgba(12,12,16,0.85) 100%);"></div>
               <div class="position-absolute bottom-0 start-0 p-4 d-flex align-items-center gap-3">
                  <div class="mod-svc-ico mb-0" style="width: 52px; height: 52px; min-width: 52px; font-size: 1.35rem; background: rgba(255, 82, 37, 0.95); color: #fff; box-shadow: 0 4px 14px rgba(0,0,0,0.4); border-radius: 12px; display: flex; align-items: center; justify-content: center;"><i class="{{ $svc->icon }}"></i></div>
                  <div>
                     <span class="badge mb-1" style="background: rgba(255, 82, 37, 0.2); color: #ff5225; border: 1px solid rgba(255, 82, 37, 0.35); font-size: 0.72rem; letter-spacing: 0.05em; text-transform: uppercase;">Service Overview</span>
                     <h4 class="modal-title text-white mb-0" style="font-weight: 700; text-shadow: 0 2px 8px rgba(0,0,0,0.6);">{{ $svc->title }}</h4>
                  </div>
               </div>
            </div>
            <div class="modal-body pt-3">
               <p style="color:var(--text2);margin-bottom:22px;line-height:1.82">{{ $svc->full_description ?? $svc->short_description }}</p>
               @if(!empty($svc->included_features) && is_array($svc->included_features))
                  <h6 style="font-weight:700;margin-bottom:14px">What's Included</h6>
                  @foreach($svc->included_features as $feat)
                     <div class="sub-svc">
                        <div class="sub-svc-n">{{ $feat['title'] ?? '' }}</div>
                        <div class="sub-svc-d">{{ $feat['desc'] ?? '' }}</div>
                     </div>
                  @endforeach
               @endif
               <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
                  <a href="{{ route('contact') }}" class="btn-p">Book Consultation <i class="fas fa-arrow-right ms-1"></i></a>
                  <button type="button" class="btn-modal-close" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i> Close</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforeach

   <!-- PORTFOLIO MODALS -->
   @foreach($projects as $p)
   <div class="modal fade" id="pfM{{ $p->id }}" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content overflow-hidden">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <div class="modal-header">
               <div>
                  <div class="modal-cat">{{ $p->category->name ?? 'Project' }}</div>
                  <h5 class="modal-title">{{ $p->title }}</h5>
               </div>
            </div>
            <div class="modal-body">
               <img src="{{ asset($p->image ?? 'assets/images/portfolio/p1.jpg') }}" alt="{{ $p->title }}" class="mod-proj-img">
               <div class="proj-meta-grid">
                  <div class="pm-item"><div class="pm-lbl">Client</div><div class="pm-val">{{ $p->client ?? 'Confidential' }}</div></div>
                  <div class="pm-item"><div class="pm-lbl">Year</div><div class="pm-val">{{ $p->year ?? '2026' }}</div></div>
                  <div class="pm-item"><div class="pm-lbl">Services</div><div class="pm-val">{{ $p->services_provided ?? 'Digital Agency' }}</div></div>
               </div>
               @if(!empty($p->overview))
                  <h6 style="font-weight:700;margin-bottom:8px">Project Overview</h6>
                  <p style="color:var(--text2);margin-bottom:20px;line-height:1.78">{{ $p->overview }}</p>
               @endif
               @if(!empty($p->challenges))
                  <h6 style="font-weight:700;margin-bottom:8px">The Challenge</h6>
                  <p style="color:var(--text2);margin-bottom:20px;line-height:1.78">{{ $p->challenges }}</p>
               @endif
               @if(!empty($p->solution))
                  <h6 style="font-weight:700;margin-bottom:8px">Our Solution</h6>
                  <p style="color:var(--text2);margin-bottom:20px;line-height:1.78">{{ $p->solution }}</p>
               @endif
               @if(!empty($p->results))
                  <h6 style="font-weight:700;margin-bottom:8px">Results & Impact</h6>
                  <p style="color:var(--text2);margin-bottom:24px;line-height:1.78">{{ $p->results }}</p>
               @endif
               <div class="mt-4 pt-3 border-top d-flex flex-wrap justify-content-between align-items-center gap-3">
                  <div class="d-flex align-items-center gap-2">
                     <a href="{{ route('contact') }}" class="btn-p">Start Similar Project <i class="fas fa-arrow-right ms-1"></i></a>
                     @if(!empty($p->live_url))
                        <a href="{{ $p->live_url }}" target="_blank" rel="noopener noreferrer" class="btn-o" style="padding: 10px 22px; border-radius: 50px; font-weight: 600; font-size: 0.92rem;"><i class="fas fa-external-link-alt me-1"></i> Visit Live Website</a>
                     @endif
                  </div>
                  <button type="button" class="btn-modal-close" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i> Close</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforeach

   <!-- TEAM MODALS -->
   @foreach($team as $tm)
   <div class="modal fade" id="tmM{{ $tm->id }}" tabindex="-1">
      <div class="modal-dialog modal-md modal-dialog-centered">
         <div class="modal-content overflow-hidden">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <div class="modal-header">
               <h5 class="modal-title">{{ $tm->name }}</h5>
            </div>
            <div class="modal-body text-center">
               <img src="{{ asset($tm->image ?? 'assets/images/team/team-1.jpg') }}" alt="{{ $tm->name }}" style="width:130px;height:130px;border-radius:50%;object-fit:cover;margin:0 auto 16px;border:3px solid var(--primary)">
               <div class="tm-role mb-2" style="font-weight:600;color:var(--primary)">{{ $tm->role }}</div>
               <p style="color:var(--text2);line-height:1.75;font-size:0.95rem">{{ $tm->bio }}</p>
               <div class="d-flex justify-content-center gap-3 mt-4">
                  @if(!empty($tm->linkedin_url))<a href="{{ $tm->linkedin_url }}" target="_blank" class="btn-o p-2"><i class="fab fa-linkedin-in"></i></a>@endif
                  @if(!empty($tm->twitter_url))<a href="{{ $tm->twitter_url }}" target="_blank" class="btn-o p-2"><i class="fab fa-twitter"></i></a>@endif
                  @if(!empty($tm->dribbble_url))<a href="{{ $tm->dribbble_url }}" target="_blank" class="btn-o p-2"><i class="fab fa-dribbble"></i></a>@endif
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforeach

   <!-- ARTICLE MODALS -->
   @foreach($articles as $art)
   <div class="modal fade" id="artM{{ $art->id }}" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content overflow-hidden">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <div class="modal-header">
               <div>
                  <div class="news-cat">{{ $art->category }}</div>
                  <h5 class="modal-title">{{ $art->title }}</h5>
               </div>
            </div>
            <div class="modal-body">
               @if(!empty($art->image))
                  <img src="{{ asset($art->image) }}" alt="{{ $art->title }}" class="mod-proj-img mb-3">
               @endif
               <div class="d-flex gap-3 text-muted small mb-3">
                  <span><i class="fas fa-user me-1"></i>{{ $art->author_name }}</span>
                  <span><i class="fas fa-calendar me-1"></i>{{ $art->published_at ? $art->published_at->format('M d, Y') : '' }}</span>
                  <span><i class="fas fa-clock me-1"></i>{{ $art->reading_time }}</span>
               </div>
               <div style="color:var(--text2);line-height:1.8">
                  {!! $art->content !!}
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforeach

   <!-- Vendor Scripts -->
   <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/aos.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>

   <!-- Main JS -->
   <script src="{{ asset('assets/js/main.js') }}"></script>

   <!-- AJAX Handlers for Newsletter & Forms -->
   <script>
      $(document).ready(function() {
         $('#newsletterForm').on('submit', function(e) {
            e.preventDefault();
            const email = $('#nlEmail').val();
            const btn = $(this).find('button');
            btn.prop('disabled', true);

            $.ajax({
               url: "{{ route('newsletter.submit') }}",
               method: "POST",
               data: {
                  _token: "{{ csrf_token() }}",
                  email: email
               },
               success: function(res) {
                  $('#nlFeedback').text(res.message).fadeIn();
                  $('#nlEmail').val('');
                  btn.prop('disabled', false);
                  setTimeout(() => { $('#nlFeedback').fadeOut(); }, 5000);
               },
               error: function(err) {
                  $('#nlFeedback').text('Failed to subscribe. Please try again.').fadeIn();
                  btn.prop('disabled', false);
               }
            });
         });
      });
   </script>
   @stack('scripts')
</body>
</html>
