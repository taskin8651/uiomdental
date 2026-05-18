<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>OM Dental Clinic | Best Dental Care & Appointment Booking</title>
  <meta name="description"
    content="OM Dental Clinic provides professional dental care, root canal, teeth cleaning, implants, braces, smile designing and emergency dental services." />

  <link rel="stylesheet" href="assets/css/style.css" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

  <!-- HEADER START -->
  <header class="site-header" id="siteHeader">
    <div class="container header-wrapper">

      <a href="/index.html" class="logo-link" aria-label="OM Dental Clinic Home">
        <img src="assets/img/logo.png" alt="OM Dental Clinic Logo" class="logo" />
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
        <a href="tel:+919999999999" class="header-call">
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
        <h3>OM Dental Clinic</h3>
        <p>
          Professional dental care for consultation, cleaning, root canal,
          implants, braces, smile designing and emergency treatment.
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
        <p><i class="fa-solid fa-phone"></i> +91 99999 99999</p>
        <p><i class="fa-solid fa-envelope"></i> info@omdentalclinic.com</p>
        <p><i class="fa-solid fa-location-dot"></i> Your Clinic Address</p>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© 2026 OM Dental Clinic. All Rights Reserved.</p>
    </div>
  </footer>
  <!-- FOOTER END -->


  <!-- FLOATING BUTTONS START -->
  <div class="floating-actions">
    <a href="https://wa.me/919999999999?text=Hi%20OM%20Dental%20Clinic%2C%20I%20want%20to%20book%20an%20appointment."
      class="float-btn whatsapp" target="_blank" aria-label="WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <a href="tel:+919999999999" class="float-btn call" aria-label="Call">
      <i class="fa-solid fa-phone"></i>
    </a>
  </div>
  <!-- FLOATING BUTTONS END -->


  <script src="assets/js/main.js"></script>
</body>

</html>
