@extends('layouts.app')

@section('title', 'Pricing')

@section('content')
   <!-- PAGE HEADER -->
   <section class="py-5 bg-dark text-white text-center" style="padding-top:140px !important; background: var(--bg2);">
      <div class="container">
         <div class="sec-badge mx-auto mb-3">Transparent Investment</div>
         <h1 class="display-4 fw-bold">Flexible Growth Plans</h1>
         <p class="lead text-muted mx-auto" style="max-width:650px;">Transparent, predictable pricing built to scale effortlessly with your organization. Every plan includes dedicated account guidance.</p>
      </div>
   </section>

   <!-- PRICING TABLE -->
   <section id="pricing" class="py-5">
      <div class="container">
         <div class="pr-toggle-wrap mb-5" data-aos="fade-up">
            <span class="pr-lbl on" id="prMoLbl">Monthly</span>
            <button class="pr-sw" id="prSw">
               <div class="pr-knob"></div>
            </button>
            <span class="pr-lbl" id="prYrLbl">Yearly <span class="save-b">Save 20%</span></span>
         </div>
         <div class="row g-4 justify-content-center">
            @foreach($plans as $index => $plan)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
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
                  <a href="{{ route('contact') }}" class="btn-pr">{{ $plan->button_text }}</a>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>

   <!-- FAQS -->
   <section id="faq" class="py-5" style="background:var(--bg2);">
      <div class="container">
         <div class="row sec-hd text-center">
            <div class="col-12">
               <div class="sec-badge mx-auto">FAQ</div>
               <h2 class="sec-title">Common Questions About Our Plans</h2>
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-8">
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
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
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
   });
</script>
@endpush
