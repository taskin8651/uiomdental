@extends('frontend.master')
@section('content')


  <!-- APPOINTMENT HERO START -->
  <section class="appointment-page-hero">
    <div class="appointment-hero-shape shape-one"></div>
    <div class="appointment-hero-shape shape-two"></div>

    <div class="container appointment-hero-wrap">
      <span class="appointment-page-tag">
        <i class="fa-solid fa-calendar-check"></i>
        Book Dental Appointment
      </span>

      <h1>Schedule your visit with OM Dental Clinic.</h1>

      <p>
        Book consultation for tooth pain, teeth cleaning, root canal, extraction,
        implants, braces, smile designing and emergency dental care.
      </p>

      <div class="page-breadcrumb">
        <a href="{{ route('frontend.home') }}">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>Appointment</span>
      </div>
    </div>
  </section>
  <!-- APPOINTMENT HERO END -->


  <!-- APPOINTMENT MAIN START -->
  <section class="appointment-main-section">
    <div class="appointment-main-shape shape-left"></div>
    <div class="appointment-main-shape shape-right"></div>

    <div class="container appointment-main-grid">

      <!-- FORM CARD -->
      <div class="appointment-form-card">
        <span class="section-tag">Appointment Form</span>

        <h2>Book your dental visit online.</h2>

        <p>
          Fill out the form below and our clinic team will contact you to confirm
          your appointment timing.
        </p>

        @if(session('message'))
          <div class="alert-success" style="margin-bottom:18px;">
            {{ session('message') }}
          </div>
        @endif

        <form class="premium-appointment-form" action="{{ route('appointment.request.store') }}" method="post">
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
            <label>Patient Age</label>
            <input type="number" name="age" value="{{ old('age') }}" placeholder="Enter age">
            @error('age') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Select Service</label>
            <select name="service" required>
              <option value="">Choose dental service</option>
              @foreach(['Dental Consultation', 'Teeth Cleaning / Scaling', 'Root Canal Treatment', 'Tooth Extraction', 'Dental Filling', 'Dental Implant', 'Braces / Orthodontics', 'Smile Designing', 'Emergency Dental Care'] as $service)
                <option value="{{ $service }}" {{ old('service') === $service ? 'selected' : '' }}>{{ $service }}</option>
              @endforeach
            </select>
            @error('service') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Preferred Date</label>
            <input type="date" name="date" value="{{ old('date') }}" required>
            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Preferred Time</label>
            <select name="time" required>
              <option value="">Choose time slot</option>
              @foreach(['10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 01:00 PM', '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM', '06:00 PM - 07:00 PM'] as $time)
                <option value="{{ $time }}" {{ old('time') === $time ? 'selected' : '' }}>{{ $time }}</option>
              @endforeach
            </select>
            @error('time') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Visit Type</label>
            <select name="visit_type">
              <option value="">Select visit type</option>
              @foreach(['First Visit', 'Follow-up Visit', 'Emergency Visit'] as $visitType)
                <option value="{{ $visitType }}" {{ old('visit_type') === $visitType ? 'selected' : '' }}>{{ $visitType }}</option>
              @endforeach
            </select>
            @error('visit_type') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group full">
            <label>Your Dental Problem</label>
            <textarea name="message" placeholder="Write your dental concern, symptoms or appointment preference">{{ old('message') }}</textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane"></i>
            Submit Appointment Request
          </button>

        </form>
      </div>

      <!-- SIDE INFO -->
      <aside class="appointment-side-wrap">

        <div class="appointment-side-card">
          <div class="appointment-side-head">
            <i class="fa-solid fa-clock"></i>
            <div>
              <span>Clinic Timing</span>
              <h3>Doctor Availability</h3>
            </div>
          </div>

          <ul class="appointment-timing-list">
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

        <div class="appointment-help-card">
          <i class="fa-solid fa-truck-medical"></i>

          <h3>Need emergency dental help?</h3>

          <p>
            For severe tooth pain, swelling, bleeding, broken tooth or injury,
            call the clinic before visiting.
          </p>

          <div class="appointment-help-actions">
            <a href="{{ $frontendCallLink }}" class="btn btn-primary">
              Call Emergency
            </a>

            <a href="{{ $frontendWhatsappAppointmentLink }}" target="_blank" class="btn btn-outline">
              WhatsApp
            </a>
          </div>
        </div>

        <div class="appointment-note-card">
          <i class="fa-solid fa-circle-info"></i>

          <div>
            <strong>Appointment Note</strong>
            <span>
              Appointment confirmation depends on doctor availability and current
              booking schedule.
            </span>
          </div>
        </div>

      </aside>

    </div>
  </section>
  <!-- APPOINTMENT MAIN END -->


  <!-- APPOINTMENT PROCESS START -->
  <section class="appointment-process-section">
    <div class="container">

      <div class="section-heading center">
        <span class="section-tag">Booking Process</span>
        <h2>Simple steps to confirm your visit.</h2>
        <p>
          Book your appointment online and get confirmation from our clinic team.
        </p>
      </div>

      <div class="appointment-process-grid">

        <div class="appointment-process-card">
          <span>01</span>
          <i class="fa-solid fa-clipboard-list"></i>
          <h3>Submit Form</h3>
          <p>Fill your basic details, service and preferred date/time.</p>
        </div>

        <div class="appointment-process-card">
          <span>02</span>
          <i class="fa-solid fa-phone-volume"></i>
          <h3>Clinic Call Back</h3>
          <p>Our clinic team contacts you for appointment confirmation.</p>
        </div>

        <div class="appointment-process-card">
          <span>03</span>
          <i class="fa-solid fa-user-doctor"></i>
          <h3>Visit Dentist</h3>
          <p>Meet the dentist for checkup, diagnosis and treatment planning.</p>
        </div>

        <div class="appointment-process-card">
          <span>04</span>
          <i class="fa-solid fa-tooth"></i>
          <h3>Start Treatment</h3>
          <p>Begin treatment after clear explanation and patient consent.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- APPOINTMENT PROCESS END -->


  <!-- GUIDELINES START -->
  <section class="appointment-guidelines-section">
    <div class="container appointment-guidelines-grid">

      <div class="appointment-guidelines-content">
        <span class="section-tag">Before You Visit</span>

        <h2>Appointment guidelines for patients.</h2>

        <p>
          Please follow these simple instructions for a smooth and comfortable
          dental visit.
        </p>

        <ul class="appointment-guidelines-list">
          <li><i class="fa-solid fa-check"></i> Reach 10 minutes before your scheduled time</li>
          <li><i class="fa-solid fa-check"></i> Carry previous dental reports or prescriptions, if any</li>
          <li><i class="fa-solid fa-check"></i> Inform the dentist about allergies or medical history</li>
          <li><i class="fa-solid fa-check"></i> Call before visiting for emergency dental problems</li>
        </ul>
      </div>

      <div class="appointment-guidelines-image">
        <img src="assets/img/clinic.jpg" alt="OM Dental Clinic Appointment">

        <div class="guidelines-float-card">
          <i class="fa-solid fa-shield-heart"></i>
          <div>
            <strong>Comfort Visit</strong>
            <span>Patient-friendly care</span>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- GUIDELINES END -->


  <!-- CTA START -->
  <section class="final-cta">
    <div class="container final-cta-box">
      <div>
        <span>Want quick appointment support?</span>
        <h2>Call or WhatsApp OM Dental Clinic today.</h2>
      </div>

      <div class="final-actions">
        <a href="{{ $frontendCallLink }}" class="btn btn-light">Call Clinic</a>
        <a href="{{ $frontendWhatsappAppointmentLink }}" target="_blank" class="btn btn-dark">WhatsApp Now</a>
      </div>
    </div>
  </section>
  <!-- CTA END -->
@endsection
