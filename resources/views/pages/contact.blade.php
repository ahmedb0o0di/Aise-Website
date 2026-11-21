@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">Get in Touch</div>
         <h1 class="display-4 fw-bold">Let's Start a Conversation</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">Ready to grow? Tell us about your project and our senior directors will respond with a strategic consultation blueprint within 24 hours.</p>
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
   <section class="pb-5 pt-0">
      <div class="container">
         <div class="row">
            <div class="col-12" data-aos="fade-up">
               <div style="border-radius:18px; overflow:hidden; border:1px solid rgba(255,255,255,0.08); background:var(--bg2); box-shadow:0 15px 35px rgba(0,0,0,0.25);">
                  <div class="d-flex justify-content-between align-items-center py-3 px-4 flex-wrap gap-2" style="border-bottom:1px solid rgba(255,255,255,0.08);">
                     <div>
                        <h5 class="mb-0 text-white"><i class="fas fa-map-marked-alt text-primary me-2"></i> Find Us on Google Maps</h5>
                        <small class="text-muted">{{ $settings->contact_address }}</small>
                     </div>
                     @if(!empty($settings->google_map_link))
                        <a href="{{ $settings->google_map_link }}" target="_blank" rel="noopener noreferrer" class="btn-p btn-sm" style="padding:7px 18px; font-size:13px;">
                           <i class="fas fa-directions me-1"></i> Open Location in Google Maps
                        </a>
                     @endif
                  </div>
                  <iframe 
                     src="{{ $settings->google_map_embed ?: 'https://maps.google.com/maps?q=27.3211575,33.6996941&hl=en&z=15&output=embed' }}" 
                     width="100%" 
                     height="450" 
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
