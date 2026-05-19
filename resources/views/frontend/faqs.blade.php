

@extends('frontend.master')
@section('content')

  <!-- FAQ HERO START -->
  <section class="faq-page-hero">
    <div class="faq-hero-shape shape-one"></div>
    <div class="faq-hero-shape shape-two"></div>

    <div class="container faq-hero-wrap">
      <span class="faq-page-tag">
        <i class="fa-solid fa-circle-question"></i>
        Frequently Asked Questions
      </span>

      <h1>Have questions about dental care?</h1>

      <p>
        Find quick answers about appointments, consultation, treatment process,
        root canal, teeth cleaning, emergency dental care and clinic timing.
      </p>

      <div class="page-breadcrumb">
        <a href="/index.html">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>FAQs</span>
      </div>
    </div>
  </section>
  <!-- FAQ HERO END -->


  <!-- FAQ CATEGORY START -->
  <section class="faq-category-section">
    <div class="faq-category-shape shape-left"></div>
    <div class="faq-category-shape shape-right"></div>

    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Quick Help</span>
        <h2>Browse questions by common topics.</h2>
        <p>
          Get helpful information before visiting OM Dental Clinic for your
          consultation or dental treatment.
        </p>
      </div>

      <div class="faq-category-grid">

        <div class="faq-category-card">
          <i class="fa-solid fa-calendar-check"></i>
          <h3>Appointments</h3>
          <p>Booking, timing and consultation visit related questions.</p>
        </div>

        <div class="faq-category-card">
          <i class="fa-solid fa-tooth"></i>
          <h3>Treatments</h3>
          <p>Questions about RCT, cleaning, extraction and dental services.</p>
        </div>

        <div class="faq-category-card">
          <i class="fa-solid fa-shield-heart"></i>
          <h3>Hygiene & Safety</h3>
          <p>Clinic cleanliness, sterilization and safety process details.</p>
        </div>

        <div class="faq-category-card">
          <i class="fa-solid fa-truck-medical"></i>
          <h3>Emergency Care</h3>
          <p>Support for tooth pain, swelling and urgent dental problems.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- FAQ CATEGORY END -->


  <!-- FAQ ACCORDION START -->
  <section class="faq-main-section">
    <div class="faq-main-shape shape-left"></div>
    <div class="faq-main-shape shape-right"></div>

    <div class="container faq-main-grid">

      <div class="faq-left-content">
        <span class="section-tag">Common Questions</span>

        <h2>Answers before your dental visit.</h2>

        <p>
          These FAQs are designed to help patients understand our clinic process,
          appointment system and common dental treatments.
        </p>

        <div class="faq-support-card">
          <i class="fa-solid fa-headset"></i>
          <div>
            <strong>Still need help?</strong>
            <span>Call or WhatsApp us for quick support.</span>
          </div>
        </div>

        <div class="faq-left-actions">
          <a href="/appointment.html" class="btn btn-primary">
            <i class="fa-solid fa-calendar-check"></i>
            Book Appointment
          </a>

          <a href="tel:+919999999999" class="btn btn-outline">
            <i class="fa-solid fa-phone-volume"></i>
            Call Clinic
          </a>
        </div>
      </div>

  @if(isset($faqs) && $faqs->count())

    <div class="faq-accordion">
        @foreach($faqs as $faq)
            <details class="faq-item" {{ $faq->is_open ? 'open' : '' }}>
                <summary>
                    <span>{{ $faq->question }}</span>
                    <i class="fa-solid fa-plus"></i>
                </summary>

                <p>
                    {{ $faq->answer }}
                </p>
            </details>
        @endforeach
    </div>

@else

    <div class="faq-accordion">
        <details class="faq-item" open>
            <summary>
                <span>What is OM Dental Clinic?</span>
                <i class="fa-solid fa-plus"></i>
            </summary>
            <p>
                OM Dental Clinic is a dental care clinic providing consultation,
                teeth cleaning, root canal treatment, dental implants, braces,
                smile designing, tooth extraction and emergency dental care.
            </p>
        </details>
    </div>

@endif

    </div>
  </section>
  <!-- FAQ ACCORDION END -->


  <!-- FAQ CTA START -->
  <section class="faq-cta-section">
    <div class="container faq-cta-box">

      <div class="faq-cta-content">
        <span>Need personal dental guidance?</span>
        <h2>Talk to our clinic team and schedule your visit.</h2>
        <p>
          Get proper consultation for tooth pain, gum issues, cleaning, RCT,
          extraction, implants or smile care.
        </p>
      </div>

      <div class="faq-cta-actions">
        <a href="/appointment.html" class="btn btn-light">
          Book Appointment
        </a>

        <a href="https://wa.me/919999999999" target="_blank" class="btn btn-dark">
          WhatsApp Now
        </a>
      </div>

    </div>
  </section>
  <!-- FAQ CTA END -->

@endsection