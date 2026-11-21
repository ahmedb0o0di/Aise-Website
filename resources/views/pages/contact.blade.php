@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
   <!-- CONTACT PAGE HERO BANNER -->
   <section class="contact-hero-banner position-relative text-center d-flex align-items-center justify-content-center" 
      style="min-height: 420px; padding: 160px 0 90px; background-image: url('{{ $settings->contact_hero_image_url }}'); background-size: cover; background-position: center center; position: relative; overflow: hidden;">
      <!-- Elegant Dark Gradient Overlay guaranteeing high contrast in both themes -->
      <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(180deg, rgba(12, 12, 16, 0.72) 0%, rgba(12, 12, 16, 0.92) 100%); pointer-events: none;"></div>
      <div class="container position-relative" style="z-index: 2;">
         <div class="sec-badge mx-auto mb-3" data-aos="fade-down" style="background: rgba(255, 82, 37, 0.15); color: #ff5225; border: 1px solid rgba(255, 82, 37, 0.35);">
            <i class="fas fa-paper-plane me-1"></i> Get in Touch
         </div>
         <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up" style="letter-spacing: -0.5px;">
            Let's Start a <span style="background: linear-gradient(135deg, #ff5225 0%, #ff8a65 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Conversation</span>
         </h1>
         <p class="lead mx-auto mb-4" data-aos="fade-up" data-aos-delay="100" style="max-width: 680px; color: rgba(255, 255, 255, 0.88); font-size: 1.15rem; line-height: 1.6;">
            Ready to grow? Tell us about your project and our senior directors will respond with a strategic consultation blueprint within 24 hours.
         </p>
         <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb justify-content-center mb-0" style="background: transparent; font-size: 0.9rem;">
               <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.75); text-decoration: none;"><i class="fas fa-home me-1"></i> Home</a></li>
               <li class="breadcrumb-item active" aria-current="page" style="color: #ff5225 !important; font-weight: 600;">Contact Us</li>
            </ol>
         </nav>
      </div>
   </section>

   <!-- CONTACT FORM SECTION -->
   <section id="contact" class="py-5">
      <div class="container">
         <div class="row g-5 align-items-start">
            <div class="col-lg-4" data-aos="fade-right">
               <div class="ci-item">
                  <div class="ci-ico"><i class="fas fa-map-marker-alt"></i></div>
                  <div>
                     <div class="ci-lbl">Our Headquarters</div>
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
                     <div class="ci-lbl">Phone Direct</div>
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
                     <div class="ci-lbl">Email Inquiries</div>
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
            <div class="col-lg-8" data-aos="fade-left">
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
                           <label class="form-label">Company / Brand</label>
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
                           <textarea name="message" class="form-control" rows="5" placeholder="Describe your goals, challenges, and timeline..." required></textarea>
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
      </div>
   </section>
   <!-- GOOGLE MAP EMBED SECTION -->
   <section class="py-5" style="background: var(--bg);">
      <div class="container">
         <div class="row sec-hd mb-4 text-center">
            <div class="col-12" data-aos="fade-up">
               <div class="sec-badge mb-2"><i class="fas fa-map-marked-alt me-1"></i> Location & Navigation</div>
               <h2 class="sec-title">Find Us on <span>Google Maps</span></h2>
               <p class="sec-desc mx-auto" style="max-width: 620px;">
                  {{ $settings->contact_address }}
               </p>
            </div>
         </div>
         <div class="row">
            <div class="col-12" data-aos="fade-up">
               <div style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--bg2); box-shadow: 0 20px 45px rgba(0,0,0,0.22);">
                  <div class="d-flex justify-content-between align-items-center py-3 px-4 flex-wrap gap-3" 
                     style="border-bottom: 1px solid rgba(255, 255, 255, 0.08); background: var(--bg2);">
                     <div class="d-flex align-items-center gap-3">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(255, 82, 37, 0.15); display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 1.25rem;">
                           <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                           <div style="font-weight: 700; font-size: 1.05rem; color: var(--text-heading, inherit);">Hurghada Headquarters</div>
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
                  <div style="position: relative; width: 100%; height: 460px;">
                     <iframe 
                        src="{{ $settings->google_map_embed ?: 'https://maps.google.com/maps?q=27.3211575,33.6996941&hl=en&z=15&output=embed' }}" 
                        width="100%" 
                        height="100%" 
                        style="border:0; display:block;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                     </iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
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
