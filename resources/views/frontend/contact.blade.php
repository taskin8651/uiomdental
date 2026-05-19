
@extends('frontend.master')
@section('content')

  <!-- CONTACT HERO START -->
  <section class="contact-page-hero">
    <div class="contact-hero-shape shape-one"></div>
    <div class="contact-hero-shape shape-two"></div>

    <div class="container contact-hero-wrap">
      <span class="contact-page-tag">
        <i class="fa-solid fa-headset"></i>
        Contact OM Dental Clinic
      </span>

      <h1>Have a dental problem? Let’s help you smile better.</h1>

      <p>
        Contact us for dental consultation, appointment booking, emergency care,
        clinic timing, treatment queries and location assistance.
      </p>

      <div class="page-breadcrumb">
        <a href="/index.html">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>Contact</span>
      </div>
    </div>
  </section>
  <!-- CONTACT HERO END -->


  <!-- CONTACT INFO START -->
  <section class="contact-info-section">
    <div class="contact-info-shape shape-left"></div>
    <div class="contact-info-shape shape-right"></div>

    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Get In Touch</span>
        <h2>Connect with our clinic team.</h2>
        <p>
          Call, WhatsApp, email or visit our clinic for appointment booking and
          dental care support.
        </p>
      </div>

      <div class="contact-info-grid">

        <a href="tel:+919999999999" class="contact-info-card">
          <i class="fa-solid fa-phone-volume"></i>
          <span>Call Us</span>
          <h3>+91 99999 99999</h3>
          <p>Speak with our clinic team for appointment or emergency help.</p>
        </a>

        <a href="https://wa.me/919999999999" target="_blank" class="contact-info-card">
          <i class="fa-brands fa-whatsapp"></i>
          <span>WhatsApp</span>
          <h3>Chat With Us</h3>
          <p>Send your query directly and get quick appointment support.</p>
        </a>

        <a href="mailto:info@omdentalclinic.com" class="contact-info-card">
          <i class="fa-solid fa-envelope-open-text"></i>
          <span>Email</span>
          <h3>info@omdentalclinic.com</h3>
          <p>Share treatment queries, appointment requests or feedback.</p>
        </a>

        <a href="https://www.google.com/maps" target="_blank" class="contact-info-card">
          <i class="fa-solid fa-location-dot"></i>
          <span>Clinic Address</span>
          <h3>Your Clinic Address</h3>
          <p>OM Dental Clinic, Your City, Your State, India.</p>
        </a>

      </div>

    </div>
  </section>
  <!-- CONTACT INFO END -->


  <!-- CONTACT FORM + TIMING START -->
  <section class="contact-main-section">
    <div class="contact-main-shape shape-left"></div>
    <div class="contact-main-shape shape-right"></div>

    <div class="container contact-main-grid">

      <div class="contact-form-card">
        <span class="section-tag">Send Enquiry</span>

        <h2>Book appointment or ask your dental question.</h2>

        <p>
          Fill the form and our team will contact you for appointment confirmation
          or dental consultation support.
        </p>

        @if(session('message'))
          <div class="alert-success" style="margin-bottom:18px;">
            {{ session('message') }}
          </div>
        @endif

        <form class="premium-contact-form" action="{{ route('contact.enquiry.store') }}" method="post">
          @csrf

          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Mobile Number</label>
            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Enter mobile number" required>
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Select Service</label>
            <select name="service" required>
              <option value="">Select dental service</option>
              @foreach(['Dental Consultation', 'Teeth Cleaning / Scaling', 'Root Canal Treatment', 'Tooth Extraction', 'Dental Implants', 'Braces / Orthodontics', 'Smile Designing', 'Emergency Dental Care'] as $service)
                <option value="{{ $service }}" {{ old('service') === $service ? 'selected' : '' }}>{{ $service }}</option>
              @endforeach
            </select>
            @error('service') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group full">
            <label>Your Message</label>
            <textarea name="message" placeholder="Write your dental problem or appointment preference">{{ old('message') }}</textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane"></i>
            Submit Enquiry
          </button>

        </form>
      </div>

      <div class="contact-side-card">

        <div class="clinic-timing-card">
          <div class="timing-head">
            <i class="fa-solid fa-clock"></i>
            <div>
              <span>Clinic Timing</span>
              <h3>Visit During Working Hours</h3>
            </div>
          </div>

          <ul class="clinic-timing-list">
            <li>
              <span>Monday - Saturday</span>
              <strong>10:00 AM - 7:00 PM</strong>
            </li>

            <li>
              <span>Lunch Break</span>
              <strong>2:00 PM - 3:00 PM</strong>
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
        </div>

        <div class="contact-help-card">
          <i class="fa-solid fa-shield-heart"></i>
          <h3>Need urgent dental help?</h3>
          <p>
            For severe tooth pain, swelling, bleeding or dental injury, please
            call the clinic before visiting.
          </p>

          <div class="contact-help-actions">
            <a href="/tel:+919999999999" class="btn btn-primary">
              Call Emergency
            </a>

            <a href="https://wa.me/919999999999" target="_blank" class="btn btn-outline">
              WhatsApp
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- CONTACT FORM + TIMING END -->


  <!-- MAP START -->
  <section class="contact-map-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Find Our Clinic</span>
        <h2>Visit OM Dental Clinic near you.</h2>
        <p>
          Use the map below to find directions and reach our clinic easily.
        </p>
      </div>

      <div class="contact-map-box">
        <iframe
          src="https://www.google.com/maps?q=Delhi,India&output=embed"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <div class="contact-map-info">
          <h3>OM Dental Clinic</h3>
          <p>Clinic Address Here, Your City, Your State, India</p>

          <a href="https://www.google.com/maps" target="_blank" class="btn btn-outline">
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
        <span>Ready for better dental care?</span>
        <h2>Book your dental appointment online today.</h2>
      </div>

      <div class="final-actions">
        <a href="/about.html" class="btn btn-light">Book Appointment</a>
        <a href="https://wa.me/919999999999" target="_blank" class="btn btn-dark">WhatsApp Now</a>
      </div>
    </div>
  </section>
  <!-- CTA END -->
@endsection
