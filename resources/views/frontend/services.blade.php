@extends('frontend.master')
@section('content')


  <!-- SERVICES HERO START -->
  <section class="services-page-hero">
    <div class="services-hero-shape shape-one"></div>
    <div class="services-hero-shape shape-two"></div>

    <div class="container services-hero-wrap">
      <span class="services-page-tag">
        <i class="fa-solid fa-tooth"></i>
        Our Dental Services
      </span>

      <h1>Complete dental care for your healthy smile.</h1>

      <p>
        From routine consultation to advanced dental treatments, OM Dental Clinic
        provides safe, comfortable and modern dental solutions for your family.
      </p>

      <div class="page-breadcrumb">
        <a href="/index.html">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>Services</span>
      </div>
    </div>
  </section>
  <!-- SERVICES HERO END -->

@if(isset($serviceSections) && $serviceSections->count())

    @foreach($serviceSections as $section)

        @php
            /*
            |--------------------------------------------------------------------------
            | Same Static Classes Mapping
            |--------------------------------------------------------------------------
            | Ye mapping tumhare old static HTML ki classes ko same rakhta hai.
            | Database me sort_order ke according:
            | 1 = Dental Consultation
            | 2 = Teeth Cleaning
            | 3 = Root Canal
            | 4 = Tooth Extraction
            */

            $classMap = [
                0 => [
                    'section'    => 'dental-consultation-section',
                    'shape'      => 'consultation-bg-shape',
                    'grid'       => 'dental-consultation-grid',
                    'image'      => 'dental-consultation-image',
                    'content'    => 'dental-consultation-content',
                    'benefits'   => 'consultation-benefits',
                    'actions'    => 'consultation-actions',
                    'float_card' => 'consultation-float-card',
                    'comment'    => 'DENTAL CONSULTATION',
                ],
                1 => [
                    'section'    => 'teeth-cleaning-section',
                    'shape'      => 'cleaning-bg-shape',
                    'grid'       => 'teeth-cleaning-grid',
                    'image'      => 'teeth-cleaning-image',
                    'content'    => 'teeth-cleaning-content',
                    'benefits'   => 'cleaning-benefits',
                    'actions'    => 'cleaning-actions',
                    'float_card' => 'cleaning-float-card',
                    'comment'    => 'TEETH CLEANING / SCALING',
                ],
                2 => [
                    'section'    => 'root-canal-section',
                    'shape'      => 'root-canal-bg-shape',
                    'grid'       => 'root-canal-grid',
                    'image'      => 'root-canal-image',
                    'content'    => 'root-canal-content',
                    'benefits'   => 'root-canal-benefits',
                    'actions'    => 'root-canal-actions',
                    'float_card' => 'root-canal-float-card',
                    'comment'    => 'ROOT CANAL TREATMENT',
                ],
                3 => [
                    'section'    => 'tooth-extraction-section',
                    'shape'      => 'extraction-bg-shape',
                    'grid'       => 'tooth-extraction-grid',
                    'image'      => 'tooth-extraction-image',
                    'content'    => 'tooth-extraction-content',
                    'benefits'   => 'extraction-benefits',
                    'actions'    => 'extraction-actions',
                    'float_card' => 'extraction-float-card',
                    'comment'    => 'TOOTH EXTRACTION',
                ],
            ];

            $classes = $classMap[$loop->index] ?? $classMap[0];

            $imageUrl = $section->getFirstMediaUrl('service_section_image')
                ?: asset('assets/img/default-service.jpg');

            $imageAlt = $section->image_alt ?: $section->title;

            $isImageLeft = $section->layout_type === 'image_left';
        @endphp

        <!-- {{ $classes['comment'] }} START -->
        <section class="{{ $classes['section'] }}">
            <div class="{{ $classes['shape'] }} shape-left"></div>
            <div class="{{ $classes['shape'] }} shape-right"></div>

            <div class="container {{ $classes['grid'] }}">

                {{-- IMAGE LEFT --}}
                @if($isImageLeft)
                    <div class="{{ $classes['image'] }}">
                        <img src="{{ $imageUrl }}" alt="{{ $imageAlt }}">

                        @if($section->float_title || $section->float_subtitle || $section->float_icon)
                            <div class="{{ $classes['float_card'] }}">
                                <i class="{{ $section->float_icon ?: 'fa-solid fa-tooth' }}"></i>

                                <div>
                                    @if($section->float_title)
                                        <strong>{{ $section->float_title }}</strong>
                                    @endif

                                    @if($section->float_subtitle)
                                        <span>{{ $section->float_subtitle }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                {{-- CONTENT --}}
                <div class="{{ $classes['content'] }}">
                    @if($section->tag)
                        <span class="section-tag">{{ $section->tag }}</span>
                    @endif

                    @if($section->title)
                        <h2>{{ $section->title }}</h2>
                    @endif

                    @if($section->description)
                        <p>
                            {{ $section->description }}
                        </p>
                    @endif

                    @if($section->activeItems && $section->activeItems->count())
                        <div class="{{ $classes['benefits'] }}">

                            @foreach($section->activeItems as $item)
                                <div>
                                    @if($item->icon)
                                        <i class="{{ $item->icon }}"></i>
                                    @endif

                                    @if($item->title)
                                        <h4>{{ $item->title }}</h4>
                                    @endif

                                    @if($item->description)
                                        <p>{{ $item->description }}</p>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    @endif

                    <div class="{{ $classes['actions'] }}">

                        @if($section->button_1_text && $section->button_1_url)
                            <a href="{{ $section->button_1_url }}" class="btn btn-primary">
                                @if($section->button_1_icon)
                                    <i class="{{ $section->button_1_icon }}"></i>
                                @endif

                                {{ $section->button_1_text }}
                            </a>
                        @endif

                        @if($section->button_2_text && $section->button_2_url)
                            <a href="{{ $section->button_2_url }}" class="btn btn-outline">
                                @if($section->button_2_icon)
                                    <i class="{{ $section->button_2_icon }}"></i>
                                @endif

                                {{ $section->button_2_text }}
                            </a>
                        @endif

                    </div>
                </div>

                {{-- IMAGE RIGHT --}}
                @if(!$isImageLeft)
                    <div class="{{ $classes['image'] }}">
                        <img src="{{ $imageUrl }}" alt="{{ $imageAlt }}">

                        @if($section->float_title || $section->float_subtitle || $section->float_icon)
                            <div class="{{ $classes['float_card'] }}">
                                <i class="{{ $section->float_icon ?: 'fa-solid fa-tooth' }}"></i>

                                <div>
                                    @if($section->float_title)
                                        <strong>{{ $section->float_title }}</strong>
                                    @endif

                                    @if($section->float_subtitle)
                                        <span>{{ $section->float_subtitle }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
        </section>
        <!-- {{ $classes['comment'] }} END -->

    @endforeach

@else

    <section class="dental-consultation-section">
        <div class="consultation-bg-shape shape-left"></div>
        <div class="consultation-bg-shape shape-right"></div>

        <div class="container dental-consultation-grid">
            <div class="dental-consultation-content">
                <span class="section-tag">Dental Services</span>

                <h2>No dental services found.</h2>

                <p>
                    Services will be available soon. Please add active service sections
                    from the admin panel.
                </p>

                <div class="consultation-actions">
                    <a href="/appointment.html" class="btn btn-primary">
                        <i class="fa-solid fa-calendar-check"></i>
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </section>

@endif

  <!-- CTA START -->
  <section class="final-cta">
    <div class="container final-cta-box">
      <div>
        <span>Need dental treatment?</span>
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