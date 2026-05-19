@extends('layouts.admin')

@section('page-title', 'Dentist Profile Section')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Dentist Profile Section</h2>

        <p class="admin-page-subtitle">
            Update dentist profile, doctor information, buttons and clinic availability
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.dentist-profile-section.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- LEFT SIDE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-doctor"></i>
                </div>

                <div>
                    <p class="form-card-title">Dentist Profile Content</p>
                    <p class="form-card-subtitle">Main dentist profile intro section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="profile_tag">Section Tag</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="profile_tag"
                               id="profile_tag"
                               value="{{ old('profile_tag', $dentistProfileSection->profile_tag) }}"
                               placeholder="Dentist Profile"
                               class="field-input {{ $errors->has('profile_tag') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('profile_tag'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('profile_tag') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="doctor_name">Doctor Name</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user-doctor icon"></i>

                        <input type="text"
                               name="doctor_name"
                               id="doctor_name"
                               value="{{ old('doctor_name', $dentistProfileSection->doctor_name) }}"
                               placeholder="Dr. Your Dentist Name"
                               class="field-input {{ $errors->has('doctor_name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('doctor_name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('doctor_name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation">Designation</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-card icon"></i>

                        <input type="text"
                               name="designation"
                               id="designation"
                               value="{{ old('designation', $dentistProfileSection->designation) }}"
                               placeholder="BDS / MDS, Dental Surgeon"
                               class="field-input {{ $errors->has('designation') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('designation'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('designation') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Write dentist profile description..."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $dentistProfileSection->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label" for="experience_number">Experience Number</label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-award icon"></i>

                            <input type="text"
                                   name="experience_number"
                                   id="experience_number"
                                   value="{{ old('experience_number', $dentistProfileSection->experience_number) }}"
                                   placeholder="10+"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="experience_text">Experience Text</label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-align-left icon"></i>

                            <input type="text"
                                   name="experience_text"
                                   id="experience_text"
                                   value="{{ old('experience_text', $dentistProfileSection->experience_text) }}"
                                   placeholder="Years Experience"
                                   class="field-input">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Dentist Image & Buttons</p>
                    <p class="form-card-subtitle">Image using Spatie Media Library</p>
                </div>
            </div>

            <div class="form-card-body">

                @if($dentistProfileSection->getFirstMediaUrl('dentist_profile_image'))
                    <div class="edit-image-preview">
                        <img src="{{ $dentistProfileSection->getFirstMediaUrl('dentist_profile_image') }}"
                             alt="{{ $dentistProfileSection->doctor_name }}">
                    </div>
                @endif

                <div class="field-group">
                    <label class="field-label" for="dentist_profile_image">Upload Dentist Image</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="dentist_profile_image"
                               id="dentist_profile_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('dentist_profile_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('dentist_profile_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('dentist_profile_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Leave empty to keep current image. JPG, PNG, WEBP allowed.
                        </p>
                    @endif
                </div>

                <hr>

                <div class="field-group">
                    <label class="field-label">Button 1 Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-hand-pointer icon"></i>

                        <input type="text"
                               name="button_1_text"
                               value="{{ old('button_1_text', $dentistProfileSection->button_1_text) }}"
                               placeholder="Book Appointment"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_1_url"
                               value="{{ old('button_1_url', $dentistProfileSection->button_1_url) }}"
                               placeholder="/appointment.html"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="button_1_icon"
                               value="{{ old('button_1_icon', $dentistProfileSection->button_1_icon) }}"
                               placeholder="fa-solid fa-calendar-check"
                               class="field-input">
                    </div>
                </div>

                <hr>

                <div class="field-group">
                    <label class="field-label">Button 2 Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>

                        <input type="text"
                               name="button_2_text"
                               value="{{ old('button_2_text', $dentistProfileSection->button_2_text) }}"
                               placeholder="Call Now"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_2_url"
                               value="{{ old('button_2_url', $dentistProfileSection->button_2_url) }}"
                               placeholder="tel:+919999999999"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="button_2_icon"
                               value="{{ old('button_2_icon', $dentistProfileSection->button_2_icon) }}"
                               placeholder="fa-solid fa-phone-volume"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- PROFILE INFO BOXES --}}
    <div class="admin-form-grid mt-4">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>

                <div>
                    <p class="form-card-title">Qualification Box</p>
                    <p class="form-card-subtitle">Qualification info card</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Qualification Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="qualification_icon"
                               value="{{ old('qualification_icon', $dentistProfileSection->qualification_icon) }}"
                               placeholder="fa-solid fa-graduation-cap"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Qualification Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="qualification_label"
                               value="{{ old('qualification_label', $dentistProfileSection->qualification_label) }}"
                               placeholder="Qualification"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Qualification Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="qualification_value"
                               value="{{ old('qualification_value', $dentistProfileSection->qualification_value) }}"
                               placeholder="BDS / MDS"
                               class="field-input">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-stethoscope"></i>
                </div>

                <div>
                    <p class="form-card-title">Specialization Box</p>
                    <p class="form-card-subtitle">Specialization info card</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Specialization Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="specialization_icon"
                               value="{{ old('specialization_icon', $dentistProfileSection->specialization_icon) }}"
                               placeholder="fa-solid fa-stethoscope"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Specialization Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="specialization_label"
                               value="{{ old('specialization_label', $dentistProfileSection->specialization_label) }}"
                               placeholder="Specialization"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Specialization Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="specialization_value"
                               value="{{ old('specialization_value', $dentistProfileSection->specialization_value) }}"
                               placeholder="Root Canal, Cosmetic Dentistry"
                               class="field-input">
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- AVAILABILITY --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-clock"></i>
            </div>

            <div>
                <p class="form-card-title">Doctor Availability</p>
                <p class="form-card-subtitle">Clinic hours and emergency information</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Availability Tag</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="availability_tag"
                               value="{{ old('availability_tag', $dentistProfileSection->availability_tag) }}"
                               placeholder="Clinic Hours"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Availability Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="availability_title"
                               value="{{ old('availability_title', $dentistProfileSection->availability_title) }}"
                               placeholder="Doctor Availability"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Availability Icon</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>
                    <input type="text"
                           name="availability_icon"
                           value="{{ old('availability_icon', $dentistProfileSection->availability_icon) }}"
                           placeholder="fa-solid fa-clock"
                           class="field-input">
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Schedule 1 Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar icon"></i>
                        <input type="text"
                               name="schedule_1_label"
                               value="{{ old('schedule_1_label', $dentistProfileSection->schedule_1_label) }}"
                               placeholder="Monday - Saturday"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Schedule 1 Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>
                        <input type="text"
                               name="schedule_1_value"
                               value="{{ old('schedule_1_value', $dentistProfileSection->schedule_1_value) }}"
                               placeholder="10:00 AM - 7:00 PM"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Schedule 2 Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar icon"></i>
                        <input type="text"
                               name="schedule_2_label"
                               value="{{ old('schedule_2_label', $dentistProfileSection->schedule_2_label) }}"
                               placeholder="Lunch Break"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Schedule 2 Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>
                        <input type="text"
                               name="schedule_2_value"
                               value="{{ old('schedule_2_value', $dentistProfileSection->schedule_2_value) }}"
                               placeholder="2:00 PM - 3:00 PM"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Schedule 3 Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar icon"></i>
                        <input type="text"
                               name="schedule_3_label"
                               value="{{ old('schedule_3_label', $dentistProfileSection->schedule_3_label) }}"
                               placeholder="Sunday"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Schedule 3 Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>
                        <input type="text"
                               name="schedule_3_value"
                               value="{{ old('schedule_3_value', $dentistProfileSection->schedule_3_value) }}"
                               placeholder="Emergency Only"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Schedule 4 Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>
                        <input type="text"
                               name="schedule_4_label"
                               value="{{ old('schedule_4_label', $dentistProfileSection->schedule_4_label) }}"
                               placeholder="Emergency Call"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Schedule 4 Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone-volume icon"></i>
                        <input type="text"
                               name="schedule_4_value"
                               value="{{ old('schedule_4_value', $dentistProfileSection->schedule_4_value) }}"
                               placeholder="+91 99999 99999"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Availability Note</label>

                <textarea name="availability_note"
                          rows="4"
                          class="field-textarea"
                          placeholder="Write availability note...">{{ old('availability_note', $dentistProfileSection->availability_note) }}</textarea>
            </div>

        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection