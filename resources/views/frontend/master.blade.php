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
  $callLink = 'tel:' . preg_replace('/\s+/', '', $contactNumber);
  $whatsappLink = 'https://wa.me/' . preg_replace('/\D+/', '', $whatsappNumber);
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

      <a href="/" class="logo-link" aria-label="{{ $siteName }} Home">
        <img src="{{ $logoUrl }}" alt="{{ $siteName }} Logo" class="logo" />
      </a>

      <nav class="navbar" id="navbar">
        <a href="/" class="active">Home</a>
        <a href="about.html">About</a>
        <a href="dentist-profile.html">Dentist</a>
        <a href="services.html">Services</a>
        <a href="gallery.html">Gallery</a>
        <a href="testimonials.html">Testimonials</a>
        <a href="faqs.html">FAQs</a>
        <a href="contact.html">Contact</a>
      </nav>

      <div class="header-actions">
        <a href="{{ $callLink }}" class="header-call">
          <i class="fa-solid fa-phone"></i>
          <span>Call Now</span>
        </a>

        <a href="/appointment.html" class="btn btn-primary">
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
        <a href="/about.html">About Clinic</a>
        <a href="/dentist-profile.html">Dentist Profile</a>
        <a href="/services.html">Services</a>
        <a href="/appointment.html">Book Appointment</a>
      </div>

      <div>
        <h4>Services</h4>
        <a href="#">Root Canal</a>
        <a href="#">Teeth Cleaning</a>
        <a href="#">Dental Implants</a>
        <a href="#">Smile Designing</a>
      </div>

      <div>
        <h4>Contact</h4>
        <p><i class="fa-solid fa-phone"></i> {{ $contactNumber }}</p>
        <p><i class="fa-solid fa-envelope"></i> {{ $contactEmail }}</p>
        <p><i class="fa-solid fa-location-dot"></i> Your Clinic Address</p>
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
