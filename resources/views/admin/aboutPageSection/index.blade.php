@extends('layouts.admin')

@section('page-title', 'About Page Section')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Page Section</h2>

        <p class="admin-page-subtitle">
            Update Who We Are, features, mission, vision and care approach content
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.about-page-section.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- LEFT SIDE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Who We Are Content</p>
                    <p class="form-card-subtitle">Main about intro section content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="intro_tag">
                        Section Tag
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="intro_tag"
                               id="intro_tag"
                               value="{{ old('intro_tag', $aboutPageSection->intro_tag) }}"
                               placeholder="Who We Are"
                               class="field-input {{ $errors->has('intro_tag') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('intro_tag'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_tag') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_title">
                        Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="intro_title"
                               id="intro_title"
                               value="{{ old('intro_title', $aboutPageSection->intro_title) }}"
                               placeholder="Dedicated to creating healthy and confident smiles."
                               class="field-input {{ $errors->has('intro_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('intro_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_description_1">
                        Description One
                    </label>

                    <textarea name="intro_description_1"
                              id="intro_description_1"
                              rows="4"
                              placeholder="Write first paragraph..."
                              class="field-textarea {{ $errors->has('intro_description_1') ? 'error' : '' }}">{{ old('intro_description_1', $aboutPageSection->intro_description_1) }}</textarea>

                    @if($errors->has('intro_description_1'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_description_1') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_description_2">
                        Description Two
                    </label>

                    <textarea name="intro_description_2"
                              id="intro_description_2"
                              rows="4"
                              placeholder="Write second paragraph..."
                              class="field-textarea {{ $errors->has('intro_description_2') ? 'error' : '' }}">{{ old('intro_description_2', $aboutPageSection->intro_description_2) }}</textarea>

                    @if($errors->has('intro_description_2'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_description_2') }}
                        </p>
                    @endif
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label" for="intro_button_text">
                            Button Text
                        </label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-hand-pointer icon"></i>

                            <input type="text"
                                   name="intro_button_text"
                                   id="intro_button_text"
                                   value="{{ old('intro_button_text', $aboutPageSection->intro_button_text) }}"
                                   placeholder="Book Appointment"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="intro_button_url">
                            Button URL
                        </label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-link icon"></i>

                            <input type="text"
                                   name="intro_button_url"
                                   id="intro_button_url"
                                   value="{{ old('intro_button_url', $aboutPageSection->intro_button_url) }}"
                                   placeholder="/appointment.html"
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
                    <p class="form-card-title">Intro Image & Experience</p>
                    <p class="form-card-subtitle">Image using Spatie Media Library</p>
                </div>
            </div>

            <div class="form-card-body">

                @if($aboutPageSection->getFirstMediaUrl('about_intro_image'))
                    <div class="edit-image-preview">
                        <img src="{{ $aboutPageSection->getFirstMediaUrl('about_intro_image') }}"
                             alt="{{ $aboutPageSection->intro_title }}">
                    </div>
                @endif

                <div class="field-group">
                    <label class="field-label" for="about_intro_image">
                        Upload Intro Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="about_intro_image"
                               id="about_intro_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('about_intro_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('about_intro_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_intro_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Leave empty to keep current image. JPG, PNG, WEBP allowed.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="experience_number">
                        Experience Number
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>

                        <input type="text"
                               name="experience_number"
                               id="experience_number"
                               value="{{ old('experience_number', $aboutPageSection->experience_number) }}"
                               placeholder="10+"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="experience_text">
                        Experience Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="experience_text"
                               id="experience_text"
                               value="{{ old('experience_text', $aboutPageSection->experience_text) }}"
                               placeholder="Years of Smile Care"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- FEATURES --}}
    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-list-check"></i>
            </div>

            <div>
                <p class="form-card-title">Feature List</p>
                <p class="form-card-subtitle">Four small features shown in Who We Are section</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Feature 1 Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="feature_1_icon"
                               value="{{ old('feature_1_icon', $aboutPageSection->feature_1_icon) }}"
                               placeholder="fa-solid fa-user-doctor"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature 1 Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="feature_1_title"
                               value="{{ old('feature_1_title', $aboutPageSection->feature_1_title) }}"
                               placeholder="Experienced Dentist"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Feature 2 Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="feature_2_icon"
                               value="{{ old('feature_2_icon', $aboutPageSection->feature_2_icon) }}"
                               placeholder="fa-solid fa-shield-heart"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature 2 Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="feature_2_title"
                               value="{{ old('feature_2_title', $aboutPageSection->feature_2_title) }}"
                               placeholder="Hygienic Setup"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Feature 3 Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="feature_3_icon"
                               value="{{ old('feature_3_icon', $aboutPageSection->feature_3_icon) }}"
                               placeholder="fa-solid fa-microscope"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature 3 Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="feature_3_title"
                               value="{{ old('feature_3_title', $aboutPageSection->feature_3_title) }}"
                               placeholder="Modern Equipment"
                               class="field-input">
                    </div>
                </div>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label">Feature 4 Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="feature_4_icon"
                               value="{{ old('feature_4_icon', $aboutPageSection->feature_4_icon) }}"
                               placeholder="fa-solid fa-heart-pulse"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature 4 Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="feature_4_title"
                               value="{{ old('feature_4_title', $aboutPageSection->feature_4_title) }}"
                               placeholder="Patient Friendly Care"
                               class="field-input">
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- MISSION VISION APPROACH --}}
    <div class="admin-form-grid mt-4">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission Card</p>
                    <p class="form-card-subtitle">Mission section content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Mission Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="mission_icon"
                               value="{{ old('mission_icon', $aboutPageSection->mission_icon) }}"
                               placeholder="fa-solid fa-bullseye"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="mission_title"
                               value="{{ old('mission_title', $aboutPageSection->mission_title) }}"
                               placeholder="Our Mission"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Description</label>
                    <textarea name="mission_description"
                              rows="4"
                              class="field-textarea"
                              placeholder="Write mission description...">{{ old('mission_description', $aboutPageSection->mission_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision Card</p>
                    <p class="form-card-subtitle">Vision section content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Vision Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="vision_icon"
                               value="{{ old('vision_icon', $aboutPageSection->vision_icon) }}"
                               placeholder="fa-solid fa-eye"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="vision_title"
                               value="{{ old('vision_title', $aboutPageSection->vision_title) }}"
                               placeholder="Our Vision"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Description</label>
                    <textarea name="vision_description"
                              rows="4"
                              class="field-textarea"
                              placeholder="Write vision description...">{{ old('vision_description', $aboutPageSection->vision_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>

                <div>
                    <p class="form-card-title">Care Approach Card</p>
                    <p class="form-card-subtitle">Care approach content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Approach Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="approach_icon"
                               value="{{ old('approach_icon', $aboutPageSection->approach_icon) }}"
                               placeholder="fa-solid fa-hand-holding-heart"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Approach Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="approach_title"
                               value="{{ old('approach_title', $aboutPageSection->approach_title) }}"
                               placeholder="Care Approach"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Approach Description</label>
                    <textarea name="approach_description"
                              rows="4"
                              class="field-textarea"
                              placeholder="Write approach description...">{{ old('approach_description', $aboutPageSection->approach_description) }}</textarea>
                </div>
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