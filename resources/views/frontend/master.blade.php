<!DOCTYPE html>
<html lang="en">

@php
  $websiteSetting = \App\Models\WebsiteSetting::with('media')->first();
  $siteName = $websiteSetting->site_name ?? 'OM Dental Clinic';
  $siteTagline = $websiteSetting->site_tagline ?? 'Best Dental Care & Appointment Booking';
  $metaTitle = $websiteSetting->meta_title ?? 'OM Dental Clinic | Best Dental Care & Appointment Booking';
  $metaDescription = $websiteSetting->meta_description ?? 'OM Dental Clinic provides professional dental care, root canal, teeth cleaning, implants, braces, smile designing and emergency dental services.';
  $metaKeywords = $websiteSetting->meta_keywords ?? '';
  $ogTitle = $websiteSetting->og_title ?? $metaTitle;
  $ogDescription = $websiteSetting->og_description ?? $metaDescription;
  $logoUrl = $websiteSetting?->getFirstMediaUrl('site_logo') ?: asset('assets/img/logo.png');
  $faviconUrl = $websiteSetting?->getFirstMediaUrl('site_favicon') ?: asset('favicon.ico');
  $ogImageUrl = $websiteSetting?->getFirstMediaUrl('og_image');
  $contactNumber = $websiteSetting->contact_number ?? '+91 99999 99999';
  $contactEmail = $websiteSetting->contact_email ?? 'info@omdentalclinic.com';
  $whatsappNumber = $websiteSetting->whatsapp_number ?? '919999999999';
  $clinicAddress = $websiteSetting->clinic_address ?? 'Clinic Address Here, Your City, Your State, India';
  $callLink = 'tel:' . preg_replace('/\s+/', '', $contactNumber);
  $whatsappLink = 'https://wa.me/' . preg_replace('/\D+/', '', $whatsappNumber);
  $footerServices = \App\Models\ServiceSection::where('status', 1)
      ->orderBy('sort_order', 'asc')
      ->take(4)
      ->get();
@endphp

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>{{ $metaTitle }}</title>
  <meta name="description" content="{{ $metaDescription }}" />
  @if($metaKeywords)
    <meta name="keywords" content="{{ $metaKeywords }}" />
  @endif
  <meta property="og:title" content="{{ $ogTitle }}" />
  <meta property="og:description" content="{{ $ogDescription }}" />
  @if($ogImageUrl)
    <meta property="og:image" content="{{ $ogImageUrl }}" />
  @endif
  <meta property="og:type" content="website" />
  <link rel="icon" href="{{ $faviconUrl }}" />

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

  <!-- HEADER START -->
  <header class="site-header" id="siteHeader">
    <div class="container header-wrapper">

      <a href="{{ route('frontend.home') }}" class="logo-link" aria-label="{{ $siteName }} Home">
        <img src="{{ $logoUrl }}" alt="{{ $siteName }} Logo" class="logo" />
      </a>

      <nav class="navbar" id="navbar">
        <a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home', 'frontend.index') || request()->is('index', 'index.html') ? 'active' : '' }}">Home</a>
        <a href="{{ route('frontend.about') }}" class="{{ request()->routeIs('frontend.about') || request()->is('about.html') ? 'active' : '' }}">About</a>
        <a href="{{ route('frontend.dentist-profile') }}" class="{{ request()->routeIs('frontend.dentist-profile') || request()->is('dentist-profile.html') ? 'active' : '' }}">Dentist</a>
        <a href="{{ route('frontend.services.index') }}" class="{{ request()->routeIs('frontend.services.index') || request()->is('services.html') ? 'active' : '' }}">Services</a>
        <a href="{{ route('frontend.gallery') }}" class="{{ request()->routeIs('frontend.gallery') || request()->is('gallery.html') ? 'active' : '' }}">Gallery</a>
        <a href="{{ route('frontend.testimonials') }}" class="{{ request()->routeIs('frontend.testimonials') || request()->is('testimonials.html') ? 'active' : '' }}">Testimonials</a>
        <a href="{{ route('frontend.faq') }}" class="{{ request()->routeIs('frontend.faq') || request()->is('faq.html', 'faqs', 'faqs.html') ? 'active' : '' }}">FAQs</a>
        <a href="{{ route('frontend.contact') }}" class="{{ request()->routeIs('frontend.contact') || request()->is('contact.html') ? 'active' : '' }}">Contact</a>
      </nav>

      <div class="header-actions">
        <a href="{{ $callLink }}" class="header-call">
          <i class="fa-solid fa-phone"></i>
          <span>Call Now</span>
        </a>

        <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
          Book Appointment
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Open Menu">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>

    </div>
  </header>
  <!-- HEADER END -->



  @yield('content')


  
  <!-- FOOTER START -->
  <footer class="footer">
    <div class="container footer-grid">

      <div>
        <h3>{{ $siteName }}</h3>
        <p>
          {{ $siteTagline }}
        </p>
      </div>

      <div>
        <h4>Quick Links</h4>
        <a href="{{ route('frontend.about') }}">About Clinic</a>
        <a href="{{ route('frontend.dentist-profile') }}">Dentist Profile</a>
        <a href="{{ route('frontend.services.index') }}">Services</a>
        <a href="{{ route('frontend.appointment') }}">Book Appointment</a>
      </div>

      <div>
        <h4>Services</h4>
        @forelse($footerServices as $footerService)
          <a href="{{ route('frontend.services.index') }}">{{ \Illuminate\Support\Str::limit($footerService->title, 24) }}</a>
        @empty
          <a href="{{ route('frontend.services.index') }}">Root Canal</a>
          <a href="{{ route('frontend.services.index') }}">Teeth Cleaning</a>
          <a href="{{ route('frontend.services.index') }}">Dental Implants</a>
          <a href="{{ route('frontend.services.index') }}">Smile Designing</a>
        @endforelse
      </div>

      <div>
        <h4>Contact</h4>
        <p><i class="fa-solid fa-phone"></i> {{ $contactNumber }}</p>
        <p><i class="fa-solid fa-envelope"></i> {{ $contactEmail }}</p>
        <p><i class="fa-solid fa-location-dot"></i> {{ $clinicAddress }}</p>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© 2026 {{ $siteName }}. All Rights Reserved.</p>
    </div>
  </footer>
  <!-- FOOTER END -->


  <!-- FLOATING BUTTONS START -->
  <div class="floating-actions">
    <a href="{{ $whatsappLink }}?text=Hi%20{{ urlencode($siteName) }}%2C%20I%20want%20to%20book%20an%20appointment."
      class="float-btn whatsapp" target="_blank" aria-label="WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <a href="{{ $callLink }}" class="float-btn call" aria-label="Call">
      <i class="fa-solid fa-phone"></i>
    </a>
  </div>
  <!-- FLOATING BUTTONS END -->


  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
