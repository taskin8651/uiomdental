
@extends('frontend.master')
@section('content')

  <!-- HERO START -->
  @php
    $hero = $heroSection ?? null;
    $heroImage = $hero && $hero->getFirstMediaUrl('hero_image')
        ? $hero->getFirstMediaUrl('hero_image')
        : asset('assets/img/hero.png');
  @endphp

  <section class="hero-section">
    <div class="hero-bg-shape shape-one"></div>
    <div class="hero-bg-shape shape-two"></div>

    <div class="container hero-wrapper">

      <div class="hero-content">
        <div class="hero-badge">
          <i class="{{ $hero->badge_icon ?? 'fa-solid fa-shield-heart' }}"></i>
          {{ $hero->badge_text ?? 'Trusted Dental Care For Your Family' }}
        </div>

        <h1>
          {{ $hero->title ?? 'Healthy Smile,' }} <br>
          <span>{{ $hero->highlight_title ?? 'Confident Life' }}</span>
        </h1>

        <p>
          {{ $hero->description ?? 'Experience gentle, modern and professional dental care at OM Dental Clinic. Book appointments online for consultation, root canal, scaling, implants, braces, smile designing and emergency dental care.' }}
        </p>

        <div class="hero-buttons">
          <a href="{{ route('frontend.appointment') }}" class="btn btn-primary btn-large">
            <i class="fa-solid fa-calendar-check"></i>
            Book Appointment
          </a>

          <a href="{{ $frontendCallLink }}" class="btn btn-outline btn-large">
            <i class="fa-solid fa-phone-volume"></i>
            Emergency Call
          </a>
        </div>

        <div class="hero-stats">
          <div>
            <strong>{{ $hero->stat_1_number ?? '10+' }}</strong>
            <span>{{ $hero->stat_1_text ?? 'Years Experience' }}</span>
          </div>
          <div>
            <strong>{{ $hero->stat_2_number ?? '5k+' }}</strong>
            <span>{{ $hero->stat_2_text ?? 'Happy Patients' }}</span>
          </div>
          <div>
            <strong>{{ $hero->stat_3_number ?? '15+' }}</strong>
            <span>{{ $hero->stat_3_text ?? 'Dental Services' }}</span>
          </div>
        </div>
      </div>

      <div class="hero-image-area">
        <div class="hero-card floating-card card-top">
          <i class="{{ $hero->top_card_icon ?? 'fa-solid fa-tooth' }}"></i>
          <div>
            <strong>{{ $hero->top_card_title ?? 'Painless Treatment' }}</strong>
            <span>{{ $hero->top_card_text ?? 'Advanced dental care' }}</span>
          </div>
        </div>

        <div class="hero-image-box">
          <img src="{{ $heroImage }}" alt="{{ $hero->title ?? 'Dentist at OM Dental Clinic' }}">
        </div>

        <div class="hero-card floating-card card-bottom">
          <i class="{{ $hero->bottom_card_icon ?? 'fa-solid fa-clock' }}"></i>
          <div>
            <strong>{{ $hero->bottom_card_title ?? 'Easy Booking' }}</strong>
            <span>{{ $hero->bottom_card_text ?? 'Online appointment' }}</span>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- HERO END -->


  <!-- APPOINTMENT STRIP START -->
  <section class="appointment-strip">
    <div class="container">
      <div class="appointment-box">
        <div class="strip-info">
          <span>Need dental help?</span>
          <h2>Book your visit with OM Dental Clinic today.</h2>
        </div>

        @if(session('message'))
    <div class="form-success-message">
        {{ session('message') }}
    </div>
@endif

<form class="quick-form" method="POST" action="{{ route('frontend.appointment') }}">
    @csrf

    <input type="text"
           name="name"
           value="{{ old('name') }}"
           placeholder="Your Name"
           required>

    @if($errors->has('name'))
        <small class="form-error">{{ $errors->first('name') }}</small>
    @endif

    <input type="tel"
           name="phone"
           value="{{ old('phone') }}"
           placeholder="Mobile Number"
           required>

    @if($errors->has('phone'))
        <small class="form-error">{{ $errors->first('phone') }}</small>
    @endif

    <select name="service" required>
        <option value="">Select Service</option>
        <option value="Dental Consultation" {{ old('service') == 'Dental Consultation' ? 'selected' : '' }}>
            Dental Consultation
        </option>
        <option value="Teeth Cleaning" {{ old('service') == 'Teeth Cleaning' ? 'selected' : '' }}>
            Teeth Cleaning
        </option>
        <option value="Root Canal Treatment" {{ old('service') == 'Root Canal Treatment' ? 'selected' : '' }}>
            Root Canal Treatment
        </option>
        <option value="Dental Implant" {{ old('service') == 'Dental Implant' ? 'selected' : '' }}>
            Dental Implant
        </option>
        <option value="Braces / Orthodontics" {{ old('service') == 'Braces / Orthodontics' ? 'selected' : '' }}>
            Braces / Orthodontics
        </option>
        <option value="Emergency Dental Care" {{ old('service') == 'Emergency Dental Care' ? 'selected' : '' }}>
            Emergency Dental Care
        </option>
    </select>

    @if($errors->has('service'))
        <small class="form-error">{{ $errors->first('service') }}</small>
    @endif

    <button type="submit">
        Request Callback
    </button>
</form>
      </div>
    </div>
  </section>
  <!-- APPOINTMENT STRIP END -->


  <!-- ABOUT START -->
  @php
    $about = $aboutPageSection ?? null;
    $aboutImage = $about && $about->getFirstMediaUrl('about_intro_image')
        ? $about->getFirstMediaUrl('about_intro_image')
        : asset('assets/img/appointment.png');
    $aboutFeatures = $about ? [
        ['icon' => $about->feature_1_icon ?: 'fa-solid fa-check', 'title' => $about->feature_1_title],
        ['icon' => $about->feature_2_icon ?: 'fa-solid fa-check', 'title' => $about->feature_2_title],
        ['icon' => $about->feature_3_icon ?: 'fa-solid fa-check', 'title' => $about->feature_3_title],
        ['icon' => $about->feature_4_icon ?: 'fa-solid fa-check', 'title' => $about->feature_4_title],
    ] : [
        ['icon' => 'fa-solid fa-check', 'title' => 'Experienced Dentist'],
        ['icon' => 'fa-solid fa-check', 'title' => 'Hygienic Clinic Setup'],
        ['icon' => 'fa-solid fa-check', 'title' => 'Latest Equipment'],
        ['icon' => 'fa-solid fa-check', 'title' => 'Patient Friendly Care'],
    ];
  @endphp

  <section class="section about-section">
    <div class="container about-wrapper">

      <div class="about-image">
        <img src="{{ $aboutImage }}" alt="{{ $about->intro_title ?? 'OM Dental Clinic' }}">
        <div class="experience-badge">
          <strong>{{ $about->experience_number ?? '10+' }}</strong>
          <span>{{ $about->experience_text ?? 'Years of Smile Care' }}</span>
        </div>
      </div>

      <div class="section-content">
        <span class="section-tag">{{ $about->intro_tag ?? 'About OM Dental Clinic' }}</span>
        <h2>{{ $about->intro_title ?? 'Modern dental care with comfort, hygiene and trust.' }}</h2>
        <p>
          {{ $about->intro_description_1 ?? 'OM Dental Clinic is dedicated to providing high-quality dental care with advanced technology, clean environment and patient-friendly treatment. From routine consultation to complex smile correction, we focus on safe, comfortable and reliable dental solutions.' }}
        </p>

        @if($about && $about->intro_description_2)
          <p>{{ $about->intro_description_2 }}</p>
        @endif

        <div class="about-points">
          @foreach($aboutFeatures as $feature)
            @if($feature['title'])
              <div>
                <i class="{{ $feature['icon'] }}"></i>
                {{ $feature['title'] }}
              </div>
            @endif
          @endforeach
        </div>

        <a href="{{  route('frontend.about') }}" class="btn btn-primary">
          {{ $about->intro_button_text ?? 'More About Clinic' }}
        </a>
      </div>

    </div>
  </section>
  <!-- ABOUT END -->


  <!-- DENTIST HIGHLIGHT START -->
  @php
    $dentist = $dentistProfileSection ?? null;
    $dentistImage = $dentist && $dentist->getFirstMediaUrl('dentist_profile_image')
        ? $dentist->getFirstMediaUrl('dentist_profile_image')
        : asset('assets/img/dentist.png');
  @endphp

  <section class="section dentist-section">
    <div class="container dentist-card">

      <div class="dentist-photo">
        <img src="{{ $dentistImage }}" alt="{{ $dentist->doctor_name ?? 'Dentist Profile' }}">
      </div>

      <div class="dentist-info">
        <span class="section-tag">{{ $dentist->profile_tag ?? 'Meet Our Dentist' }}</span>
        <h2>{{ $dentist->doctor_name ?? 'Dr. Your Dentist Name' }}</h2>
        <h4>{{ $dentist->designation ?? 'BDS / MDS, Dental Surgeon' }}</h4>
        <p>
          {{ $dentist->description ?? 'Dedicated to creating healthy and confident smiles through precise diagnosis, gentle treatment and modern dental techniques.' }}
        </p>

        <div class="doctor-meta">
          <div>
            <strong>{{ $dentist->specialization_label ?? 'Specialization' }}</strong>
            <span>{{ $dentist->specialization_value ?? 'Root Canal, Cosmetic Dentistry, Implants' }}</span>
          </div>
          <div>
            <strong>{{ $dentist->schedule_1_label ?? 'Consultation Time' }}</strong>
            <span>{{ $dentist->schedule_1_value ?? 'Mon - Sat: 10:00 AM - 7:00 PM' }}</span>
          </div>
        </div>

        <div class="dentist-actions">
          <a href="{{ route('frontend.dentist-profile') }}" class="btn btn-outline">View Profile</a>
          <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">Book Appointment</a>
        </div>
      </div>

    </div>
  </section>
  <!-- DENTIST HIGHLIGHT END -->


  <!-- BEFORE AFTER START -->
  @php
    $fallbackBeforeAfterItems = [
        [
            'before' => asset('assets/img/before_2.png'),
            'after' => asset('assets/img/after_2.png'),
            'before_alt' => 'Before teeth whitening treatment',
            'after_alt' => 'After teeth whitening treatment',
            'title' => 'Teeth Whitening',
            'description' => 'Brighter and cleaner smile with professional whitening care.',
        ],
        [
            'before' => asset('assets/img/before_1.png'),
            'after' => asset('assets/img/after_1.png'),
            'before_alt' => 'Before smile designing treatment',
            'after_alt' => 'After smile designing treatment',
            'title' => 'Smile Designing',
            'description' => 'Natural looking smile improvement with careful treatment planning.',
        ],
        [
            'before' => asset('assets/img/before_2.png'),
            'after' => asset('assets/img/after_2.png'),
            'before_alt' => 'Before dental alignment treatment',
            'after_alt' => 'After dental alignment treatment',
            'title' => 'Dental Alignment',
            'description' => 'Improved teeth alignment for a confident and balanced smile.',
        ],
    ];
  @endphp

  <section class="before-after-section">
    <div class="before-after-shape shape-left"></div>
    <div class="before-after-shape shape-right"></div>

    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Before & After</span>
        <h2>Real smile transformation results.</h2>
        <p>
          Explore sample treatment transformation images that show visible
          improvement after professional dental care.
        </p>
      </div>

      <div class="before-after-grid">

        @forelse($beforeAfterGalleries as $beforeAfterGallery)
          @php
            $beforeImage = $beforeAfterGallery->getFirstMediaUrl('before_image') ?: asset('assets/img/before_2.png');
            $afterImage = $beforeAfterGallery->getFirstMediaUrl('after_image') ?: asset('assets/img/after_2.png');
          @endphp

          <div class="before-after-card">
            <div class="ba-images">
              <div class="ba-image-box">
                <span>{{ $beforeAfterGallery->before_label ?: 'Before' }}</span>
                <img src="{{ $beforeImage }}" alt="{{ $beforeAfterGallery->before_alt ?: $beforeAfterGallery->title }}">
              </div>

              <div class="ba-image-box">
                <span>{{ $beforeAfterGallery->after_label ?: 'After' }}</span>
                <img src="{{ $afterImage }}" alt="{{ $beforeAfterGallery->after_alt ?: $beforeAfterGallery->title }}">
              </div>
            </div>

            <div class="ba-content">
              <h3>{{ $beforeAfterGallery->title }}</h3>
              <p>{{ $beforeAfterGallery->description }}</p>
              <a href="{{ route('frontend.appointment') }}">
                Book Consultation <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        @empty
          @foreach($fallbackBeforeAfterItems as $item)
            <div class="before-after-card">
              <div class="ba-images">
                <div class="ba-image-box">
                  <span>Before</span>
                  <img src="{{ $item['before'] }}" alt="{{ $item['before_alt'] }}">
                </div>

                <div class="ba-image-box">
                  <span>After</span>
                  <img src="{{ $item['after'] }}" alt="{{ $item['after_alt'] }}">
                </div>
              </div>

              <div class="ba-content">
                <h3>{{ $item['title'] }}</h3>
                <p>{{ $item['description'] }}</p>
                <a href="{{ route('frontend.appointment') }}">
                  Book Consultation <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          @endforeach
        @endforelse

      </div>

    </div>
  </section>
  <!-- BEFORE AFTER END -->


  <!-- SERVICES START -->
  @php
    $fallbackServices = [
        [
            'image' => asset('assets/img/service.png'),
            'icon' => 'fa-solid fa-user-doctor',
            'title' => 'Dental Consultation',
            'description' => 'Complete dental checkup, diagnosis and treatment planning.',
        ],
        [
            'image' => asset('assets/img/service-1.png'),
            'icon' => 'fa-solid fa-tooth',
            'title' => 'Root Canal Treatment',
            'description' => 'Save infected teeth with painless and advanced RCT care.',
        ],
        [
            'image' => asset('assets/img/service-2.png'),
            'icon' => 'fa-solid fa-sparkles',
            'title' => 'Teeth Cleaning',
            'description' => 'Professional scaling and polishing for cleaner, healthier teeth.',
        ],
        [
            'image' => asset('assets/img/service-3.png'),
            'icon' => 'fa-solid fa-teeth',
            'title' => 'Dental Implants',
            'description' => 'Reliable tooth replacement solution for a natural smile.',
        ],
    ];
  @endphp

  <section class="section services-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Our Dental Services</span>
        <h2>Complete dental solutions for your family.</h2>
        <p>
          We offer preventive, restorative and cosmetic dental treatments with
          modern equipment and patient-first care.
        </p>
      </div>

      <div class="services-grid">

        @forelse($serviceSections as $serviceSection)
          @php
            $firstItem = $serviceSection->activeItems->first();
            $serviceImage = $serviceSection->getFirstMediaUrl('service_section_image') ?: asset('assets/img/service.png');
            $serviceIcon = $serviceSection->float_icon ?: ($firstItem->icon ?? 'fa-solid fa-tooth');
            $serviceLink = $serviceSection->button_1_url ?: route('frontend.services.index');
          @endphp

          <div class="service-card">
            <div class="service-img">
              <img src="{{ $serviceImage }}" alt="{{ $serviceSection->image_alt ?: $serviceSection->title }}">
            </div>
            <div class="service-icon">
              <i class="{{ $serviceIcon }}"></i>
            </div>
            <h3>{{ $serviceSection->title }}</h3>
            <p>{{ $serviceSection->description }}</p>
            <a href="{{ $serviceLink }}">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        @empty
          @foreach($fallbackServices as $service)
            <div class="service-card">
              <div class="service-img">
                <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}">
              </div>
              <div class="service-icon">
                <i class="{{ $service['icon'] }}"></i>
              </div>
              <h3>{{ $service['title'] }}</h3>
              <p>{{ $service['description'] }}</p>
              <a href="{{ route('frontend.services.index') }}">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          @endforeach
        @endforelse

      </div>

      <div class="center mt-40">
        <a href="{{ route('frontend.services.index') }}" class="btn btn-primary">View All Services</a>
      </div>

    </div>
  </section>
  <!-- SERVICES END -->


  <!-- WHY CHOOSE START -->
  <section class="section why-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Why Choose Us</span>
        <h2>Dental care designed around your comfort.</h2>
      </div>

      <div class="why-grid">

        <div class="why-card">
          <i class="fa-solid fa-hand-holding-heart"></i>
          <h3>Gentle Treatment</h3>
          <p>Comfort-first care with clear explanation before every procedure.</p>
        </div>

        <div class="why-card">
          <i class="fa-solid fa-microscope"></i>
          <h3>Modern Technology</h3>
          <p>Advanced tools and equipment for accurate diagnosis and treatment.</p>
        </div>

        <div class="why-card">
          <i class="fa-solid fa-shield-virus"></i>
          <h3>Hygiene & Safety</h3>
          <p>Strict sterilization and hygiene protocols for patient safety.</p>
        </div>

        <div class="why-card">
          <i class="fa-solid fa-calendar-check"></i>
          <h3>Easy Appointment</h3>
          <p>Book online, call directly or connect instantly on WhatsApp.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- WHY CHOOSE END -->


  @if(false)
  <!-- TESTIMONIAL START -->
  <section class="section testimonial-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Patient Reviews</span>
        <h2>Smiles that speak for our care.</h2>
      </div>

      <div class="testimonial-grid">

        <div class="testimonial-card">
          <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p>
            “Very clean clinic and doctor explained everything properly. My root canal
            treatment was comfortable.”
          </p>
          <h4>Rahul Kumar</h4>
          <span>Root Canal Patient</span>
        </div>

        <div class="testimonial-card">
          <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p>
            “Best dental clinic experience. Appointment booking was easy and staff was
            very supportive.”
          </p>
          <h4>Priya Singh</h4>
          <span>Teeth Cleaning Patient</span>
        </div>

        <div class="testimonial-card">
          <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p>
            “I got smile designing done here. The result is very natural and beautiful.”
          </p>
          <h4>Anjali Verma</h4>
          <span>Smile Designing Patient</span>
        </div>

      </div>

    </div>
  </section>
  <!-- TESTIMONIAL END -->


  <!-- TIMING CONTACT START -->
  <section class="section timing-contact-section">
    <div class="container timing-contact-grid">

      <div class="timing-card">
        <span class="section-tag">Clinic Timing</span>
        <h2>Visit us during working hours.</h2>

        <ul class="timing-list">
          <li>
            <span>Monday - Saturday</span>
            <strong>10:00 AM - 7:00 PM</strong>
          </li>
          <li>
            <span>Sunday</span>
            <strong>Emergency Only</strong>
          </li>
          <li>
            <span>Emergency Call</span>
            <strong>+91 99999 99999</strong>
          </li>
        </ul>

        <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
          Schedule Visit
        </a>
      </div>

      <div class="contact-card">
        <span class="section-tag">Contact Us</span>
        <h2>Have a dental problem?</h2>

        <form class="contact-form">
          <input type="text" placeholder="Full Name" required>
          <input type="tel" placeholder="Mobile Number" required>
          <input type="email" placeholder="Email Address">
          <textarea placeholder="Your Message"></textarea>
          <button type="submit" class="btn btn-primary">Submit Enquiry</button>
        </form>
      </div>

    </div>
  </section>
  <!-- TIMING CONTACT END -->
  @endif


  <!-- TESTIMONIAL START -->
  @php
    $fallbackTestimonials = [
        [
            'rating' => 5,
            'review_text' => 'Very clean clinic and doctor explained everything properly. My root canal treatment was comfortable.',
            'customer_name' => 'Rahul Kumar',
            'customer_type' => 'Root Canal Patient',
        ],
        [
            'rating' => 5,
            'review_text' => 'Best dental clinic experience. Appointment booking was easy and staff was very supportive.',
            'customer_name' => 'Priya Singh',
            'customer_type' => 'Teeth Cleaning Patient',
        ],
        [
            'rating' => 5,
            'review_text' => 'I got smile designing done here. The result is very natural and beautiful.',
            'customer_name' => 'Anjali Verma',
            'customer_type' => 'Smile Designing Patient',
        ],
    ];
  @endphp

  <section class="section testimonial-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Patient Reviews</span>
        <h2>Smiles that speak for our care.</h2>
      </div>

      <div class="testimonial-grid">

        @forelse($testimonials as $testimonial)
          <div class="testimonial-card">
            <div class="stars">
              @for($i = 1; $i <= 5; $i++)
                <i class="{{ $i <= (int) $testimonial->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
              @endfor
            </div>
            <p>"{{ $testimonial->review_text }}"</p>
            <h4>{{ $testimonial->customer_name }}</h4>
            <span>{{ $testimonial->customer_type }}</span>
          </div>
        @empty
          @foreach($fallbackTestimonials as $testimonial)
            <div class="testimonial-card">
              <div class="stars">
                @for($i = 1; $i <= 5; $i++)
                  <i class="{{ $i <= $testimonial['rating'] ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                @endfor
              </div>
              <p>"{{ $testimonial['review_text'] }}"</p>
              <h4>{{ $testimonial['customer_name'] }}</h4>
              <span>{{ $testimonial['customer_type'] }}</span>
            </div>
          @endforeach
        @endforelse

      </div>

    </div>
  </section>
  <!-- TESTIMONIAL END -->


  <!-- TIMING CONTACT START -->
  @php
    $timingDentist = $dentistProfileSection ?? null;
    $siteSetting = $websiteSetting ?? null;
    $timingItems = [
        [
            'label' => $timingDentist->schedule_1_label ?? 'Monday - Saturday',
            'value' => $timingDentist->schedule_1_value ?? '10:00 AM - 7:00 PM',
        ],
        [
            'label' => $timingDentist->schedule_3_label ?? 'Sunday',
            'value' => $timingDentist->schedule_3_value ?? 'Emergency Only',
        ],
        [
            'label' => $timingDentist->schedule_4_label ?? 'Emergency Call',
            'value' => $timingDentist->schedule_4_value ?? ($siteSetting->contact_number ?? '+91 99999 99999'),
        ],
    ];
  @endphp

  <section class="section timing-contact-section">
    <div class="container timing-contact-grid">

      <div class="timing-card">
        <span class="section-tag">{{ $timingDentist->availability_tag ?? 'Clinic Timing' }}</span>
        <h2>{{ $timingDentist->availability_title ?? 'Visit us during working hours.' }}</h2>

        <ul class="timing-list">
          @foreach($timingItems as $item)
            @if($item['label'] || $item['value'])
              <li>
                <span>{{ $item['label'] }}</span>
                <strong>{{ $item['value'] }}</strong>
              </li>
            @endif
          @endforeach
        </ul>

        <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
          Schedule Visit
        </a>
      </div>

      <div class="contact-card">
        <span class="section-tag">Contact Us</span>
        <h2>Have a dental problem?</h2>

        @if(session('message'))
          <div class="alert-success" style="margin-bottom:18px;">
            {{ session('message') }}
          </div>
        @endif

        <form class="contact-form" action="{{ route('contact.enquiry.store') }}" method="post">
          @csrf
          <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
          @error('name') <small class="text-danger">{{ $message }}</small> @enderror

          <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Mobile Number" required>
          @error('phone') <small class="text-danger">{{ $message }}</small> @enderror

          <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
          @error('email') <small class="text-danger">{{ $message }}</small> @enderror

          <select name="service" required>
            <option value="">Select Service</option>
            @foreach(['Dental Consultation', 'Teeth Cleaning / Scaling', 'Root Canal Treatment', 'Tooth Extraction', 'Dental Implants', 'Braces / Orthodontics', 'Smile Designing', 'Emergency Dental Care'] as $service)
              <option value="{{ $service }}" {{ old('service') === $service ? 'selected' : '' }}>{{ $service }}</option>
            @endforeach
          </select>
          @error('service') <small class="text-danger">{{ $message }}</small> @enderror

          <textarea name="message" placeholder="Your Message">{{ old('message') }}</textarea>
          @error('message') <small class="text-danger">{{ $message }}</small> @enderror

          <button type="submit" class="btn btn-primary">Submit Enquiry</button>
        </form>
      </div>

    </div>
  </section>
  <!-- TIMING CONTACT END -->


  <!-- MAP START -->
  @php
    $mapSetting = $websiteSetting ?? null;
    $mapEmbedUrl = $mapSetting->map_embed_url ?? 'https://www.google.com/maps?q=Delhi,India&output=embed';
    $mapDirectionUrl = $mapSetting->map_direction_url ?? 'https://www.google.com/maps';
    $clinicAddress = $mapSetting->clinic_address ?? 'Clinic Address Here, Your City, Your State, India';
    $clinicName = $mapSetting->site_name ?? 'OM Dental Clinic';
  @endphp

  <section class="map-section">
    <div class="container">
      <div class="map-box">
        <iframe src="{{ $mapEmbedUrl }}" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <div class="map-info">
          <h3>{{ $clinicName }}</h3>
          <p>
            {{ $clinicAddress }}
          </p>
          <a href="{{ $mapDirectionUrl }}" target="_blank" class="btn btn-outline">
            <i class="fa-solid fa-location-arrow"></i>
            Get Directions
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- MAP END -->


  <!-- CTA START -->
  <section class="final-cta">
    <div class="container final-cta-box">
      <div>
        <span>Ready for a healthier smile?</span>
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
