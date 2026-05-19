@extends('frontend.master')
@section('content')

  <!-- GALLERY HERO START -->
  <section class="gallery-page-hero">
    <div class="gallery-hero-shape shape-one"></div>
    <div class="gallery-hero-shape shape-two"></div>

    <div class="container gallery-hero-wrap">
      <span class="gallery-page-tag">
        <i class="fa-solid fa-images"></i>
        Clinic Gallery
      </span>

      <h1>Explore our clinic, care and smile moments.</h1>

      <p>
        Take a look inside OM Dental Clinic including our modern setup,
        hygienic treatment rooms, dental equipment and patient-friendly spaces.
      </p>

      <div class="page-breadcrumb">
        <a href="{{ route('frontend.home') }}">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>Gallery</span>
      </div>
    </div>
  </section>
  <!-- GALLERY HERO END -->


  <!-- GALLERY START -->
  <section class="gallery-section">
    <div class="gallery-bg-shape shape-left"></div>
    <div class="gallery-bg-shape shape-right"></div>

    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Our Gallery</span>
        <h2>A glimpse of our dental care environment.</h2>
        <p>
          Browse images of our clinic, dental chair, treatment setup, equipment,
          hygiene process and patient care atmosphere.
        </p>
      </div>

    @if(isset($galleryItems) && $galleryItems->count())

    <div class="gallery-tabs">
        <button class="active" type="button" data-filter="all">
            All
        </button>

        @foreach($galleryCategories as $category)
            <button type="button" data-filter="{{ $category->slug }}">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <div class="premium-gallery-grid">

        @foreach($galleryItems as $item)
            @php
                $imageUrl = $item->getFirstMediaUrl('gallery_image')
                    ?: asset('assets/img/default-gallery.png');

                $categorySlug = optional($item->category)->slug ?: 'uncategorized';

                $cardClass = $item->card_size && $item->card_size !== 'normal'
                    ? $item->card_size
                    : '';
            @endphp

            <a href="{{ $imageUrl }}"
               class="gallery-card {{ $cardClass }}"
               data-category="{{ $categorySlug }}"
               target="_blank">

                <img src="{{ $imageUrl }}"
                     alt="{{ $item->alt_text ?: $item->title }}">

                <div class="gallery-overlay">
                    @if($item->label)
                        <span>{{ $item->label }}</span>
                    @endif

                    @if($item->title)
                        <h3>{{ $item->title }}</h3>
                    @endif

                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </div>
            </a>
        @endforeach

    </div>

@else

    <div class="gallery-tabs">
        <button class="active" type="button">All</button>
        <button type="button">Clinic</button>
        <button type="button">Treatment Room</button>
        <button type="button">Equipment</button>
        <button type="button">Smile Care</button>
    </div>

    <div class="premium-gallery-grid">

        <a href="{{ asset('assets/img/gallery-1.png') }}" class="gallery-card large" target="_blank">
            <img src="{{ asset('assets/img/gallery-1.png') }}" alt="OM Dental Clinic Interior">
            <div class="gallery-overlay">
                <span>Clinic Interior</span>
                <h3>Modern Clinic Setup</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-2.png') }}" class="gallery-card" target="_blank">
            <img src="{{ asset('assets/img/gallery-2.png') }}" alt="Dental Treatment Room">
            <div class="gallery-overlay">
                <span>Treatment Room</span>
                <h3>Comfortable Dental Chair</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-3.png') }}" class="gallery-card" target="_blank">
            <img src="{{ asset('assets/img/gallery-3.png') }}" alt="Dental Equipment">
            <div class="gallery-overlay">
                <span>Equipment</span>
                <h3>Advanced Tools</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-4.png') }}" class="gallery-card tall" target="_blank">
            <img src="{{ asset('assets/img/gallery-4.png') }}" alt="Dental Consultation">
            <div class="gallery-overlay">
                <span>Consultation</span>
                <h3>Patient First Care</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-5.png') }}" class="gallery-card" target="_blank">
            <img src="{{ asset('assets/img/gallery-5.png') }}" alt="Dental Hygiene">
            <div class="gallery-overlay">
                <span>Hygiene</span>
                <h3>Clean & Safe Process</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-6.png') }}" class="gallery-card" target="_blank">
            <img src="{{ asset('assets/img/gallery-6.png') }}" alt="Smile Care">
            <div class="gallery-overlay">
                <span>Smile Care</span>
                <h3>Healthy Smile Moments</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-7.png') }}" class="gallery-card wide" target="_blank">
            <img src="{{ asset('assets/img/gallery-7.png') }}" alt="Clinic Reception">
            <div class="gallery-overlay">
                <span>Reception</span>
                <h3>Patient Friendly Space</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

        <a href="{{ asset('assets/img/gallery-8.png') }}" class="gallery-card" target="_blank">
            <img src="{{ asset('assets/img/gallery-8.png') }}" alt="Dental Treatment">
            <div class="gallery-overlay">
                <span>Treatment</span>
                <h3>Gentle Dental Care</h3>
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </a>

    </div>

@endif

    </div>
  </section>
  <!-- GALLERY END -->


  <!-- BEFORE AFTER OPTIONAL START -->
  <section class="gallery-before-after-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Smile Transformations</span>
        <h2>Before and after treatment gallery.</h2>
        <p>
          Optional section for treatment transformation images such as cleaning,
          whitening, smile designing and alignment improvement.
        </p>
      </div>

      <div class="gallery-ba-grid">

      @if(isset($beforeAfterGalleries) && $beforeAfterGalleries->count())

    @foreach($beforeAfterGalleries as $beforeAfterGallery)
        @php
            $beforeImage = $beforeAfterGallery->getFirstMediaUrl('before_image')
                ?: asset('assets/img/before_1.png');

            $afterImage = $beforeAfterGallery->getFirstMediaUrl('after_image')
                ?: asset('assets/img/after_1.png');
        @endphp

        <div class="gallery-ba-card">
            <div class="gallery-ba-images">
                <div>
                    <span>{{ $beforeAfterGallery->before_label ?: 'Before' }}</span>
                    <img src="{{ $beforeImage }}"
                         alt="{{ $beforeAfterGallery->before_alt ?: $beforeAfterGallery->title }}">
                </div>

                <div>
                    <span>{{ $beforeAfterGallery->after_label ?: 'After' }}</span>
                    <img src="{{ $afterImage }}"
                         alt="{{ $beforeAfterGallery->after_alt ?: $beforeAfterGallery->title }}">
                </div>
            </div>

            @if($beforeAfterGallery->title)
                <h3>{{ $beforeAfterGallery->title }}</h3>
            @endif

            @if($beforeAfterGallery->description)
                <p>{{ $beforeAfterGallery->description }}</p>
            @endif
        </div>
    @endforeach

@else

    <div class="gallery-ba-card">
        <div class="gallery-ba-images">
            <div>
                <span>Before</span>
                <img src="{{ asset('assets/img/before_1.png') }}" alt="Before Teeth Cleaning">
            </div>

            <div>
                <span>After</span>
                <img src="{{ asset('assets/img/after_1.png') }}" alt="After Teeth Cleaning">
            </div>
        </div>

        <h3>Teeth Cleaning Result</h3>
        <p>Cleaner, brighter and healthier-looking teeth after professional scaling.</p>
    </div>

    <div class="gallery-ba-card">
        <div class="gallery-ba-images">
            <div>
                <span>Before</span>
                <img src="{{ asset('assets/img/before_2.png') }}" alt="Before Smile Designing">
            </div>

            <div>
                <span>After</span>
                <img src="{{ asset('assets/img/after_2.png') }}" alt="After Smile Designing">
            </div>
        </div>

        <h3>Smile Designing Result</h3>
        <p>Natural smile enhancement with careful planning and cosmetic care.</p>
    </div>

@endif

      </div>

    </div>
  </section>
  <!-- BEFORE AFTER OPTIONAL END -->


  <!-- CTA START -->
  <section class="final-cta">
    <div class="container final-cta-box">
      <div>
        <span>Like our clinic environment?</span>
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