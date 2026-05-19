
@extends('frontend.master')
@section('content')



   @php
    $dentist = $dentistProfileSection ?? null;

    $dentistImage = ($dentist && $dentist->getFirstMediaUrl('dentist_profile_image'))
        ? $dentist->getFirstMediaUrl('dentist_profile_image')
        : asset('assets/img/dentist.png');

    $profileTag = $dentist->profile_tag ?? 'Dentist Profile';
    $doctorName = $dentist->doctor_name ?? 'Dr. Your Dentist Name';
    $designation = $dentist->designation ?? 'BDS / MDS, Dental Surgeon';

    $description = $dentist->description
        ?? 'Dedicated to providing gentle, hygienic and result-focused dental care with modern treatment techniques and a patient-first approach.';

    $experienceNumber = $dentist->experience_number ?? '10+';
    $experienceText = $dentist->experience_text ?? 'Years Experience';

    $qualificationIcon = $dentist->qualification_icon ?? 'fa-solid fa-graduation-cap';
    $qualificationLabel = $dentist->qualification_label ?? 'Qualification';
    $qualificationValue = $dentist->qualification_value ?? 'BDS / MDS';

    $specializationIcon = $dentist->specialization_icon ?? 'fa-solid fa-stethoscope';
    $specializationLabel = $dentist->specialization_label ?? 'Specialization';
    $specializationValue = $dentist->specialization_value ?? 'Root Canal, Cosmetic Dentistry';

    $button1Text = $dentist->button_1_text ?? 'Book Appointment';
    $button1Url = $dentist->button_1_url ?? route('frontend.appointment');
    $button1Icon = $dentist->button_1_icon ?? 'fa-solid fa-calendar-check';

    $button2Text = $dentist->button_2_text ?? 'Call Now';
    $button2Url = $dentist->button_2_url ?? $frontendCallLink;
    $button2Icon = $dentist->button_2_icon ?? 'fa-solid fa-phone-volume';
@endphp

<!-- DENTIST PROFILE INTRO START -->
<section class="dentist-profile-intro-section">
    <div class="dentist-profile-shape shape-left"></div>
    <div class="dentist-profile-shape shape-right"></div>

    <div class="container dentist-profile-intro-grid">

        <div class="dentist-profile-photo-wrap">
            <div class="dentist-profile-photo">
                <img src="{{ $dentistImage }}" alt="{{ $doctorName }}">
            </div>

            @if($experienceNumber || $experienceText)
                <div class="dentist-profile-badge">
                    <i class="fa-solid fa-tooth"></i>

                    <div>
                        @if($experienceNumber)
                            <strong>{{ $experienceNumber }}</strong>
                        @endif

                        @if($experienceText)
                            <span>{{ $experienceText }}</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <div class="dentist-profile-content">
            @if($profileTag)
                <span class="section-tag">{{ $profileTag }}</span>
            @endif

            @if($doctorName)
                <h2>{{ $doctorName }}</h2>
            @endif

            @if($designation)
                <h4>{{ $designation }}</h4>
            @endif

            @if($description)
                <p>{{ $description }}</p>
            @endif

            <div class="dentist-profile-info">
                @if($qualificationLabel || $qualificationValue)
                    <div>
                        <i class="{{ $qualificationIcon }}"></i>

                        @if($qualificationLabel)
                            <span>{{ $qualificationLabel }}</span>
                        @endif

                        @if($qualificationValue)
                            <strong>{{ $qualificationValue }}</strong>
                        @endif
                    </div>
                @endif

                @if($specializationLabel || $specializationValue)
                    <div>
                        <i class="{{ $specializationIcon }}"></i>

                        @if($specializationLabel)
                            <span>{{ $specializationLabel }}</span>
                        @endif

                        @if($specializationValue)
                            <strong>{{ $specializationValue }}</strong>
                        @endif
                    </div>
                @endif
            </div>

            <div class="dentist-profile-actions">
                @if($button1Text && $button1Url)
                    <a href="{{ $button1Url }}" class="btn btn-primary">
                        @if($button1Icon)
                            <i class="{{ $button1Icon }}"></i>
                        @endif
                        {{ $button1Text }}
                    </a>
                @endif

                @if($button2Text && $button2Url)
                    <a href="{{ $button2Url }}" class="btn btn-outline">
                        @if($button2Icon)
                            <i class="{{ $button2Icon }}"></i>
                        @endif
                        {{ $button2Text }}
                    </a>
                @endif
            </div>
        </div>

    </div>
</section>
<!-- DENTIST PROFILE INTRO END -->




    <!-- QUALIFICATION SPECIALIZATION START -->
    <section class="qualification-section">
        <div class="qualification-shape shape-left"></div>
        <div class="qualification-shape shape-right"></div>

        <div class="container">

            <div class="section-heading center">
                <span class="section-tag">Qualification & Specialization</span>
                <h2>Expert dental care backed by professional training.</h2>
                <p>
                    Our dentist combines clinical knowledge, modern treatment techniques and
                    patient-focused care to deliver safe and comfortable dental solutions.
                </p>
            </div>

            <div class="qualification-grid">

                <!-- QUALIFICATION CARD -->
                <div class="qualification-main-card">
                    <div class="qualification-card-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>

                    <span>Qualification</span>
                    <h3>BDS / MDS</h3>

                    <p>
                        Professionally trained in dental diagnosis, preventive care, restorative
                        treatment and patient-focused oral healthcare.
                    </p>

                    <ul>
                        <li><i class="fa-solid fa-check"></i> Dental consultation and diagnosis</li>
                        <li><i class="fa-solid fa-check"></i> Preventive and restorative dentistry</li>
                        <li><i class="fa-solid fa-check"></i> Modern treatment planning</li>
                    </ul>
                </div>

                <!-- SPECIALIZATION CARD -->
                <div class="specialization-card">
                    <div class="specialization-header">
                        <div>
                            <span>Specialization</span>
                            <h3>Focused Treatment Expertise</h3>
                        </div>
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>

                    <div class="specialization-list">

                        <div class="specialization-item">
                            <i class="fa-solid fa-tooth"></i>
                            <div>
                                <h4>Root Canal Treatment</h4>
                                <p>Painless treatment to save infected or damaged teeth.</p>
                            </div>
                        </div>

                        <div class="specialization-item">
                            <i class="fa-solid fa-sparkles"></i>
                            <div>
                                <h4>Cosmetic Dentistry</h4>
                                <p>Smile designing, whitening and natural smile improvement.</p>
                            </div>
                        </div>

                        <div class="specialization-item">
                            <i class="fa-solid fa-teeth"></i>
                            <div>
                                <h4>Dental Implants</h4>
                                <p>Reliable tooth replacement solution for missing teeth.</p>
                            </div>
                        </div>

                        <div class="specialization-item">
                            <i class="fa-solid fa-child-reaching"></i>
                            <div>
                                <h4>Pediatric Dentistry</h4>
                                <p>Gentle dental care for children and young patients.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- QUALIFICATION SPECIALIZATION END -->


    <!-- EXPERIENCE DETAILS START -->
    <section class="experience-details-section">
        <div class="experience-shape shape-left"></div>
        <div class="experience-shape shape-right"></div>

        <div class="container">

            <div class="section-heading center">
                <span class="section-tag">Experience Details</span>
                <h2>Years of trusted dental care and clinical expertise.</h2>
                <p>
                    Our dentist brings practical experience in diagnosis, preventive care,
                    restorative treatment and smile-focused dental solutions.
                </p>
            </div>

            <div class="experience-details-grid">

                <!-- LEFT SUMMARY CARD -->
                <div class="experience-summary-card">
                    <div class="experience-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>

                    <span>Clinical Experience</span>
                    <h3>10+ Years</h3>

                    <p>
                        Experience in treating patients with gentle consultation, accurate
                        diagnosis and modern dental treatment planning.
                    </p>

                    <div class="experience-progress-list">
                        <div class="experience-progress">
                            <div class="progress-title">
                                <span>General Dentistry</span>
                                <strong>95%</strong>
                            </div>
                            <div class="progress-bar">
                                <span style="width: 95%;"></span>
                            </div>
                        </div>

                        <div class="experience-progress">
                            <div class="progress-title">
                                <span>Root Canal Treatment</span>
                                <strong>90%</strong>
                            </div>
                            <div class="progress-bar">
                                <span style="width: 90%;"></span>
                            </div>
                        </div>

                        <div class="experience-progress">
                            <div class="progress-title">
                                <span>Cosmetic Dentistry</span>
                                <strong>88%</strong>
                            </div>
                            <div class="progress-bar">
                                <span style="width: 88%;"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT EXPERIENCE LIST -->
                <div class="experience-timeline-card">

                    <div class="experience-timeline-item">
                        <div class="experience-number">01</div>
                        <div class="experience-content">
                            <h4>General Dental Practice</h4>
                            <p>
                                Experience in routine dental checkups, diagnosis, fillings,
                                scaling, extractions and preventive oral care.
                            </p>
                        </div>
                    </div>

                    <div class="experience-timeline-item">
                        <div class="experience-number">02</div>
                        <div class="experience-content">
                            <h4>Root Canal & Restorative Care</h4>
                            <p>
                                Skilled in managing tooth pain, infected teeth, restorations and
                                tooth-saving treatment procedures.
                            </p>
                        </div>
                    </div>

                    <div class="experience-timeline-item">
                        <div class="experience-number">03</div>
                        <div class="experience-content">
                            <h4>Cosmetic & Smile Dentistry</h4>
                            <p>
                                Experience in teeth whitening, smile designing, crowns, bridges
                                and natural-looking smile improvements.
                            </p>
                        </div>
                    </div>

                    <div class="experience-timeline-item">
                        <div class="experience-number">04</div>
                        <div class="experience-content">
                            <h4>Patient Care & Counselling</h4>
                            <p>
                                Focused on clear explanation, comfortable treatment planning,
                                follow-up guidance and long-term oral health.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- EXPERIENCE DETAILS END -->


    <!-- REGISTRATION NUMBER START -->
    <section class="registration-section">
        <div class="registration-shape shape-left"></div>
        <div class="registration-shape shape-right"></div>

        <div class="container registration-wrapper">

            <div class="registration-content">
                <span class="section-tag">Dental Council Registration</span>

                <h2>Verified professional dental practice.</h2>

                <p>
                    The dentist registration number helps patients verify the professional
                    credentials of the dentist and builds trust before consultation or
                    treatment.
                </p>

                <div class="registration-note">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>
                        Registration details can be updated as per the dentist’s official
                        Dental Council certificate.
                    </span>
                </div>
            </div>

            <div class="registration-card">
                <div class="registration-icon">
                    <i class="fa-solid fa-certificate"></i>
                </div>

                <span>Registration Number</span>
                <h3>DCI / STATE / 00000</h3>

                <div class="registration-meta">
                    <div>
                        <small>Registered With</small>
                        <strong>Dental Council of India / State Dental Council</strong>
                    </div>

                    <div>
                        <small>Status</small>
                        <strong>Active / Valid</strong>
                    </div>
                </div>

                <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
                    <i class="fa-solid fa-calendar-check"></i>
                    Book Appointment
                </a>
            </div>

        </div>
    </section>
    <!-- REGISTRATION NUMBER END -->

    <!-- AWARDS CERTIFICATIONS START -->
    <section class="awards-section">
        <div class="awards-shape shape-left"></div>
        <div class="awards-shape shape-right"></div>

        <div class="container">

            <div class="section-heading center">
                <span class="section-tag">Awards & Certifications</span>
                <h2>Recognized training, achievements and professional growth.</h2>
                <p>
                    Add dentist awards, certifications, workshops, advanced training and
                    professional achievements to build patient trust.
                </p>
            </div>

            <div class="awards-grid">

                <div class="award-card featured-award">
                    <div class="award-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>

                    <span>Featured Achievement</span>
                    <h3>Excellence in Dental Care</h3>

                    <p>
                        Recognition for patient-focused dental care, ethical treatment and
                        commitment to modern clinical practice.
                    </p>

                    <div class="award-meta">
                        <i class="fa-solid fa-calendar-check"></i>
                        <strong>Year:</strong>
                        <span>2026</span>
                    </div>
                </div>

                <div class="award-card">
                    <div class="award-icon">
                        <i class="fa-solid fa-certificate"></i>
                    </div>

                    <span>Certification</span>
                    <h3>Advanced Root Canal Training</h3>

                    <p>
                        Training focused on painless RCT techniques, diagnosis and tooth-saving
                        treatment planning.
                    </p>

                    <div class="award-meta">
                        <i class="fa-solid fa-building-columns"></i>
                        <strong>Issued By:</strong>
                        <span>Dental Institute</span>
                    </div>
                </div>

                <div class="award-card">
                    <div class="award-icon">
                        <i class="fa-solid fa-medal"></i>
                    </div>

                    <span>Workshop</span>
                    <h3>Cosmetic Dentistry Workshop</h3>

                    <p>
                        Practical learning for teeth whitening, smile designing and aesthetic
                        dental improvement.
                    </p>

                    <div class="award-meta">
                        <i class="fa-solid fa-calendar-days"></i>
                        <strong>Completed:</strong>
                        <span>2025</span>
                    </div>
                </div>

                <div class="award-card">
                    <div class="award-icon">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>

                    <span>Training</span>
                    <h3>Clinical Hygiene & Safety</h3>

                    <p>
                        Training in sterilization protocols, infection control and safe dental
                        treatment procedures.
                    </p>

                    <div class="award-meta">
                        <i class="fa-solid fa-circle-check"></i>
                        <strong>Status:</strong>
                        <span>Completed</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- AWARDS CERTIFICATIONS END -->


    <!-- SHORT BIOGRAPHY START -->
    <section class="short-bio-section">
        <div class="short-bio-shape shape-left"></div>
        <div class="short-bio-shape shape-right"></div>

        <div class="container short-bio-wrapper">

            <div class="short-bio-image">
                <img src="assets/img/dentist.png" alt="Dr. Your Dentist Name">

                <div class="short-bio-badge">
                    <i class="fa-solid fa-heart-pulse"></i>
                    <div>
                        <strong>Patient First</strong>
                        <span>Gentle dental care</span>
                    </div>
                </div>
            </div>

            <div class="short-bio-content">
                <span class="section-tag">Short Biography</span>

                <h2>A caring dentist focused on healthy and confident smiles.</h2>

                <p>
                    Dr. Your Dentist Name is dedicated to providing comfortable, safe and
                    result-oriented dental care. With a strong focus on accurate diagnosis,
                    clear communication and patient comfort, the doctor helps patients
                    understand their dental concerns and choose the right treatment.
                </p>

                <p>
                    The approach combines modern dental techniques, hygiene-focused treatment
                    and compassionate care for every age group.
                </p>

                <div class="short-bio-points">
                    <div>
                        <i class="fa-solid fa-check"></i>
                        <span>Gentle consultation and treatment approach</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-check"></i>
                        <span>Clear explanation before every procedure</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-check"></i>
                        <span>Focused on hygiene, comfort and long-term oral health</span>
                    </div>
                </div>

                <div class="short-bio-actions">
                    <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
                        <i class="fa-solid fa-calendar-check"></i>
                        Book Appointment
                    </a>

                    <a href="{{ $frontendCallLink }}" class="btn btn-outline">
                        <i class="fa-solid fa-phone-volume"></i>
                        Call Now
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- SHORT BIOGRAPHY END -->


    <!-- CONSULTATION TIMING START -->
    <section class="consultation-timing-section">
        <div class="consultation-shape shape-left"></div>
        <div class="consultation-shape shape-right"></div>

        <div class="container consultation-timing-wrapper">

            <div class="consultation-content">
                <span class="section-tag">Consultation Timing</span>

                <h2>Plan your visit as per clinic availability.</h2>

                <p>
                    Visit OM Dental Clinic during working hours for consultation, dental
                    checkup, treatment planning and follow-up care. Emergency support is
                    available on request.
                </p>

                <div class="consultation-actions">
                    <a href="{{ route('frontend.appointment') }}" class="btn btn-primary">
                        <i class="fa-solid fa-calendar-check"></i>
                        Book Appointment
                    </a>

                    <a href="{{ $frontendCallLink }}" class="btn btn-outline">
                        <i class="fa-solid fa-phone-volume"></i>
                        Call Clinic
                    </a>
                </div>
            </div>

           @if($dentist)
    <div class="consultation-card">
        <div class="consultation-card-head">
            <div class="consultation-icon">
                <i class="{{ $dentist->availability_icon ?: 'fa-solid fa-clock' }}"></i>
            </div>

            <div>
                @if($dentist->availability_tag)
                    <span>{{ $dentist->availability_tag }}</span>
                @endif

                @if($dentist->availability_title)
                    <h3>{{ $dentist->availability_title }}</h3>
                @endif
            </div>
        </div>

        <ul class="consultation-list">

            @if($dentist->schedule_1_label || $dentist->schedule_1_value)
                <li>
                    <span>{{ $dentist->schedule_1_label ?: 'Monday - Saturday' }}</span>
                    <strong>{{ $dentist->schedule_1_value ?: '10:00 AM - 7:00 PM' }}</strong>
                </li>
            @endif

            @if($dentist->schedule_2_label || $dentist->schedule_2_value)
                <li>
                    <span>{{ $dentist->schedule_2_label ?: 'Lunch Break' }}</span>
                    <strong>{{ $dentist->schedule_2_value ?: '2:00 PM - 3:00 PM' }}</strong>
                </li>
            @endif

            @if($dentist->schedule_3_label || $dentist->schedule_3_value)
                <li>
                    <span>{{ $dentist->schedule_3_label ?: 'Sunday' }}</span>
                    <strong>{{ $dentist->schedule_3_value ?: 'Emergency Only' }}</strong>
                </li>
            @endif

            @if($dentist->schedule_4_label || $dentist->schedule_4_value)
                <li>
                    <span>{{ $dentist->schedule_4_label ?: 'Emergency Call' }}</span>
                    <strong>{{ $dentist->schedule_4_value ?: '+91 99999 99999' }}</strong>
                </li>
            @endif

        </ul>

        @if($dentist->availability_note)
            <div class="consultation-note">
                <i class="fa-solid fa-circle-info"></i>
                <p>{{ $dentist->availability_note }}</p>
            </div>
        @endif
    </div>
@else
    <div class="consultation-card">
        <div class="consultation-card-head">
            <div class="consultation-icon">
                <i class="fa-solid fa-clock"></i>
            </div>

            <div>
                <span>Clinic Hours</span>
                <h3>Doctor Availability</h3>
            </div>
        </div>

        <ul class="consultation-list">
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

        <div class="consultation-note">
            <i class="fa-solid fa-circle-info"></i>
            <p>
                Appointment timing may vary depending on doctor availability and prior
                bookings. Please call before visiting for emergency cases.
            </p>
        </div>
    </div>
@endif

        </div>
    </section>
    <!-- CONSULTATION TIMING END -->


  @endsection 
