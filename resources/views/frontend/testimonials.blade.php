
@extends('frontend.master')
@section('content')

  <!-- TESTIMONIAL HERO START -->
  <section class="testimonial-page-hero">
    <div class="testimonial-hero-shape shape-one"></div>
    <div class="testimonial-hero-shape shape-two"></div>

    <div class="container testimonial-hero-wrap">
      <span class="testimonial-page-tag">
        <i class="fa-solid fa-star"></i>
        Patient Testimonials
      </span>

      <h1>Smiles that speak for our dental care.</h1>

      <p>
        Read what our patients say about their dental consultation, cleaning,
        root canal, smile designing and overall clinic experience.
      </p>

      <div class="page-breadcrumb">
        <a href="{{ route('frontend.home') }}">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>Testimonials</span>
      </div>
    </div>
  </section>
  <!-- TESTIMONIAL HERO END -->


  <!-- RATING SUMMARY START -->
  <section class="rating-summary-section">
    <div class="rating-shape shape-left"></div>
    <div class="rating-shape shape-right"></div>

    <div class="container rating-summary-grid">

      <div class="rating-summary-card">
        <div class="rating-score">
          <strong>4.9</strong>
          <span>/5</span>
        </div>

        <div class="rating-stars">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>

        <h3>Trusted by happy patients</h3>
        <p>
          Based on patient feedback for hygiene, treatment comfort,
          explanation and clinic experience.
        </p>
      </div>

      <div class="rating-stat-list">

        <div class="rating-stat-box">
          <i class="fa-solid fa-user-check"></i>
          <div>
            <strong>5k+</strong>
            <span>Happy Patients</span>
          </div>
        </div>

        <div class="rating-stat-box">
          <i class="fa-solid fa-tooth"></i>
          <div>
            <strong>15+</strong>
            <span>Dental Services</span>
          </div>
        </div>

        <div class="rating-stat-box">
          <i class="fa-solid fa-shield-heart"></i>
          <div>
            <strong>100%</strong>
            <span>Hygiene Focused</span>
          </div>
        </div>

        <div class="rating-stat-box">
          <i class="fa-solid fa-calendar-check"></i>
          <div>
            <strong>Easy</strong>
            <span>Appointment Booking</span>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- RATING SUMMARY END -->


  <!-- TESTIMONIALS GRID START -->
  <section class="testimonials-page-section">
    <div class="testimonials-bg-shape shape-left"></div>
    <div class="testimonials-bg-shape shape-right"></div>

    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Patient Reviews</span>
        <h2>Real feedback from our dental patients.</h2>
        <p>
          Patient comfort, clear communication and trusted dental care are at the
          heart of every treatment experience.
        </p>
      </div>

      <div class="testimonials-page-grid">

       @if(isset($testimonials) && $testimonials->count())

    @foreach($testimonials as $testimonial)
        <div class="testimonial-page-card {{ $testimonial->is_featured ? 'featured-review' : '' }}">
            <div class="quote-icon">
                <i class="fa-solid fa-quote-left"></i>
            </div>

            <div class="review-stars">
                @for($i = 1; $i <= 5; $i++)
                    <i class="{{ $i <= $testimonial->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                @endfor
            </div>

            @if($testimonial->review_text)
                <p>
                    “{{ $testimonial->review_text }}”
                </p>
            @endif

            <div class="review-author">
                <div class="author-avatar">
                    {{ $testimonial->avatar_letter ?: strtoupper(substr($testimonial->customer_name, 0, 1)) }}
                </div>

                <div>
                    @if($testimonial->customer_name)
                        <h4>{{ $testimonial->customer_name }}</h4>
                    @endif

                    @if($testimonial->customer_type)
                        <span>{{ $testimonial->customer_type }}</span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

@else

    <div class="testimonial-page-card featured-review">
        <div class="quote-icon">
            <i class="fa-solid fa-quote-left"></i>
        </div>

        <div class="review-stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
        </div>

        <p>
            “Very clean clinic and doctor explained everything properly. My root
            canal treatment was comfortable and the staff was very supportive.”
        </p>

        <div class="review-author">
            <div class="author-avatar">R</div>
            <div>
                <h4>Rahul Kumar</h4>
                <span>Root Canal Patient</span>
            </div>
        </div>
    </div>

@endif

      </div>

    </div>
  </section>
  <!-- TESTIMONIALS GRID END -->


  <!-- REVIEW HIGHLIGHT START -->
  <section class="review-highlight-section">
    <div class="container review-highlight-grid">

      <div class="review-highlight-image">
        <img src="assets/img/aa.png" alt="OM Dental Clinic Patient Care">

        <div class="review-highlight-badge">
          <i class="fa-solid fa-heart"></i>
          <div>
            <strong>Patient First</strong>
            <span>Comfort care approach</span>
          </div>
        </div>
      </div>

      <div class="review-highlight-content">
        <span class="section-tag">Why Patients Trust Us</span>

        <h2>Comfort, hygiene and clear dental guidance.</h2>

        <p>
          Patients choose OM Dental Clinic because we focus on proper diagnosis,
          honest consultation, clean treatment environment and gentle dental
          procedures. Every visit is planned to make patients feel comfortable
          and confident.
        </p>

        <div class="review-points">
          <div>
            <i class="fa-solid fa-check"></i>
            <span>Clear explanation before treatment</span>
          </div>

          <div>
            <i class="fa-solid fa-check"></i>
            <span>Clean and hygienic clinic setup</span>
          </div>

          <div>
            <i class="fa-solid fa-check"></i>
            <span>Gentle treatment and patient comfort</span>
          </div>

          <div>
            <i class="fa-solid fa-check"></i>
            <span>Easy appointment and follow-up care</span>
          </div>
        </div>

        <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
          Book Appointment
        </a>
      </div>

    </div>
  </section>
  <!-- REVIEW HIGHLIGHT END -->


  <!-- CTA START -->
  <section class="final-cta">
    <div class="container final-cta-box">
      <div>
        <span>Want a comfortable dental experience?</span>
        <h2>Book your dental appointment online today.</h2>
      </div>

      <div class="final-actions">
        <a href="{{ route('frontend.appointment') }}" class="btn btn-light">Book Appointment</a>
        <a href="{{ $frontendWhatsappAppointmentLink }}" target="_blank" class="btn btn-dark">WhatsApp Now</a>
      </div>
    </div>
  </section>
  <!-- CTA END -->

@endsection