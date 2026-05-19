@extends('frontend.master')
@section('content')


  <!-- ABOUT HERO START -->
  <section class="about-page-hero">
    <div class="about-hero-shape shape-one"></div>
    <div class="about-hero-shape shape-two"></div>

    <div class="container about-hero-wrap">
      <span class="about-page-tag">
        <i class="fa-solid fa-tooth"></i>
        About OM Dental Clinic
      </span>

      <h1>Modern dental care with comfort, hygiene and trust.</h1>

      <p>
        We provide professional, gentle and technology-driven dental care
        for every smile.
      </p>

      <div class="page-breadcrumb">
        <a href="/index.html">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>About Clinic</span>
      </div>
    </div>
  </section>
  <!-- ABOUT HERO END -->

  @php
    $about = $aboutPageSection ?? null;

    $aboutImage = $about && $about->getFirstMediaUrl('about_intro_image')
        ? $about->getFirstMediaUrl('about_intro_image')
        : asset('assets/img/clinic.png');
@endphp

@if($about)

<!-- ABOUT INTRO START -->
<section class="about-intro-section">
    <div class="container about-intro-grid">

        <div class="about-intro-image">
            <img src="{{ $aboutImage }}"
                 alt="{{ $about->intro_title ?: 'OM Dental Clinic' }}">

            @if($about->experience_number || $about->experience_text)
                <div class="about-experience-card">
                    @if($about->experience_number)
                        <strong>{{ $about->experience_number }}</strong>
                    @endif

                    @if($about->experience_text)
                        <span>{{ $about->experience_text }}</span>
                    @endif
                </div>
            @endif
        </div>

        <div class="about-intro-content">

            @if($about->intro_tag)
                <span class="section-tag">{{ $about->intro_tag }}</span>
            @endif

            @if($about->intro_title)
                <h2>{{ $about->intro_title }}</h2>
            @endif

            @if($about->intro_description_1)
                <p>{{ $about->intro_description_1 }}</p>
            @endif

            @if($about->intro_description_2)
                <p>{{ $about->intro_description_2 }}</p>
            @endif

            <div class="about-feature-list">

                @if($about->feature_1_title)
                    <div>
                        <i class="{{ $about->feature_1_icon ?: 'fa-solid fa-user-doctor' }}"></i>
                        <span>{{ $about->feature_1_title }}</span>
                    </div>
                @endif

                @if($about->feature_2_title)
                    <div>
                        <i class="{{ $about->feature_2_icon ?: 'fa-solid fa-shield-heart' }}"></i>
                        <span>{{ $about->feature_2_title }}</span>
                    </div>
                @endif

                @if($about->feature_3_title)
                    <div>
                        <i class="{{ $about->feature_3_icon ?: 'fa-solid fa-microscope' }}"></i>
                        <span>{{ $about->feature_3_title }}</span>
                    </div>
                @endif

                @if($about->feature_4_title)
                    <div>
                        <i class="{{ $about->feature_4_icon ?: 'fa-solid fa-heart-pulse' }}"></i>
                        <span>{{ $about->feature_4_title }}</span>
                    </div>
                @endif

            </div>

            @if($about->intro_button_text && $about->intro_button_url)
                <a href="{{ $about->intro_button_url }}" class="btn btn-primary">
                    {{ $about->intro_button_text }}
                </a>
            @endif

        </div>

    </div>
</section>
<!-- ABOUT INTRO END -->


<!-- MISSION VISION START -->
<section class="about-mission-section">
    <div class="container mission-grid">

        @if($about->mission_title || $about->mission_description)
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="{{ $about->mission_icon ?: 'fa-solid fa-bullseye' }}"></i>
                </div>

                @if($about->mission_title)
                    <h3>{{ $about->mission_title }}</h3>
                @endif

                @if($about->mission_description)
                    <p>{{ $about->mission_description }}</p>
                @endif
            </div>
        @endif

        @if($about->vision_title || $about->vision_description)
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="{{ $about->vision_icon ?: 'fa-solid fa-eye' }}"></i>
                </div>

                @if($about->vision_title)
                    <h3>{{ $about->vision_title }}</h3>
                @endif

                @if($about->vision_description)
                    <p>{{ $about->vision_description }}</p>
                @endif
            </div>
        @endif

        @if($about->approach_title || $about->approach_description)
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="{{ $about->approach_icon ?: 'fa-solid fa-hand-holding-heart' }}"></i>
                </div>

                @if($about->approach_title)
                    <h3>{{ $about->approach_title }}</h3>
                @endif

                @if($about->approach_description)
                    <p>{{ $about->approach_description }}</p>
                @endif
            </div>
        @endif

    </div>
</section>
<!-- MISSION VISION END -->

@else

<!-- ABOUT INTRO START -->
<section class="about-intro-section">
    <div class="container about-intro-grid">

        <div class="about-intro-image">
            <img src="{{ asset('assets/img/clinic.png') }}" alt="OM Dental Clinic">

            <div class="about-experience-card">
                <strong>10+</strong>
                <span>Years of Smile Care</span>
            </div>
        </div>

        <div class="about-intro-content">
            <span class="section-tag">Who We Are</span>

            <h2>Dedicated to creating healthy and confident smiles.</h2>

            <p>
                OM Dental Clinic is focused on providing high-quality dental treatment
                in a clean, comfortable and patient-friendly environment.
            </p>

            <p>
                From dental consultation and teeth cleaning to root canal treatment,
                implants, braces and smile designing, our clinic offers complete dental
                solutions for families.
            </p>

            <div class="about-feature-list">
                <div>
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Experienced Dentist</span>
                </div>

                <div>
                    <i class="fa-solid fa-shield-heart"></i>
                    <span>Hygienic Setup</span>
                </div>

                <div>
                    <i class="fa-solid fa-microscope"></i>
                    <span>Modern Equipment</span>
                </div>

                <div>
                    <i class="fa-solid fa-heart-pulse"></i>
                    <span>Patient Friendly Care</span>
                </div>
            </div>

            <a href="/appointment.html" class="btn btn-primary">
                Book Appointment
            </a>
        </div>

    </div>
</section>
<!-- ABOUT INTRO END -->


<!-- MISSION VISION START -->
<section class="about-mission-section">
    <div class="container mission-grid">

        <div class="mission-card">
            <div class="mission-icon">
                <i class="fa-solid fa-bullseye"></i>
            </div>

            <h3>Our Mission</h3>

            <p>
                To provide safe, comfortable and affordable dental care with modern
                techniques and honest guidance.
            </p>
        </div>

        <div class="mission-card">
            <div class="mission-icon">
                <i class="fa-solid fa-eye"></i>
            </div>

            <h3>Our Vision</h3>

            <p>
                To become a trusted dental clinic known for ethical treatment,
                advanced care and long-term patient relationships.
            </p>
        </div>

        <div class="mission-card">
            <div class="mission-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>

            <h3>Care Approach</h3>

            <p>
                Every patient receives personal attention, proper explanation and a
                treatment plan based on comfort and need.
            </p>
        </div>

    </div>
</section>
<!-- MISSION VISION END -->

@endif


  <!-- FACILITIES START -->
  <section class="about-facility-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Clinic Facilities</span>
        <h2>Designed for safe and comfortable dental visits.</h2>
        <p>
          Our clinic is planned to make every patient feel relaxed, informed and
          confident before treatment.
        </p>
      </div>

      <div class="facility-grid">

        <div class="facility-card">
          <i class="fa-solid fa-chair"></i>
          <h3>Comfortable Setup</h3>
          <p>Modern dental chair and relaxing treatment environment.</p>
        </div>

        <div class="facility-card">
          <i class="fa-solid fa-pump-medical"></i>
          <h3>Sterilized Instruments</h3>
          <p>Proper cleaning and sterilization before every treatment.</p>
        </div>

        <div class="facility-card">
          <i class="fa-solid fa-x-ray"></i>
          <h3>Digital Diagnosis</h3>
          <p>Advanced diagnostic support for accurate treatment planning.</p>
        </div>

        <div class="facility-card">
          <i class="fa-solid fa-children"></i>
          <h3>Family Dental Care</h3>
          <p>Gentle dental treatment for adults and children.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- FACILITIES END -->


  <!-- HYGIENE START -->
  <section class="hygiene-section">
    <div class="container hygiene-grid">

      <div class="hygiene-content">
        <span class="section-tag">Hygiene & Safety</span>
        <h2>Clean clinic, safe process and trusted dental care.</h2>

        <p>
          Hygiene is one of the most important parts of dental treatment.
          At OM Dental Clinic, we follow clean treatment protocols, instrument
          sterilization and surface disinfection for patient safety.
        </p>

        <ul class="hygiene-list">
          <li><i class="fa-solid fa-check"></i> Clean and well-maintained clinic environment</li>
          <li><i class="fa-solid fa-check"></i> Sterilized dental instruments</li>
          <li><i class="fa-solid fa-check"></i> Modern treatment equipment</li>
          <li><i class="fa-solid fa-check"></i> Comfortable patient consultation</li>
        </ul>
      </div>

      <div class="hygiene-image">
        <img src="assets/img/dentist-clean.png" alt="Dental Hygiene and Technology">
      </div>

    </div>
  </section>
  <!-- HYGIENE END -->


  <!-- STATS START -->
  <section class="about-stats-section">
    <div class="container about-stats-grid">

      <div class="about-stat">
        <strong>10+</strong>
        <span>Years Experience</span>
      </div>

      <div class="about-stat">
        <strong>5k+</strong>
        <span>Happy Patients</span>
      </div>

      <div class="about-stat">
        <strong>15+</strong>
        <span>Dental Services</span>
      </div>

      <div class="about-stat">
        <strong>100%</strong>
        <span>Hygiene Focused</span>
      </div>

    </div>
  </section>
  <!-- STATS END -->


  <!-- CTA START -->
  <section class="final-cta">
    <div class="container final-cta-box">
      <div>
        <span>Ready for a healthier smile?</span>
        <h2>Book your dental appointment online today.</h2>
      </div>

      <div class="final-actions">
        <a href="/appointment.html" class="btn btn-light">Book Appointment</a>
        <a href="https://wa.me/919999999999" target="_blank" class="btn btn-dark">WhatsApp Now</a>
      </div>
    </div>
  </section>
  <!-- CTA END -->

@endsection