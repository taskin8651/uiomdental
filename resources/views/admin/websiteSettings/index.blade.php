@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">
            Update basic website details, SEO content and contact information
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.website-settings.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-globe"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Website</p>
                    <p class="form-card-subtitle">Website name, tagline, logo and favicon</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="site_name">Site Name</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="site_name"
                               id="site_name"
                               value="{{ old('site_name', $websiteSetting->site_name) }}"
                               placeholder="OM Dental Clinic"
                               class="field-input {{ $errors->has('site_name') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('site_name'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('site_name') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="site_tagline">Site Tagline</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-left icon"></i>
                        <input type="text"
                               name="site_tagline"
                               id="site_tagline"
                               value="{{ old('site_tagline', $websiteSetting->site_tagline) }}"
                               placeholder="Best Dental Care & Appointment Booking"
                               class="field-input {{ $errors->has('site_tagline') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('site_tagline'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('site_tagline') }}</p>
                    @endif
                </div>

                @if($websiteSetting->getFirstMediaUrl('site_logo'))
                    <div class="edit-image-preview">
                        <img src="{{ $websiteSetting->getFirstMediaUrl('site_logo') }}" alt="Site Logo">
                    </div>
                @endif

                <div class="field-group">
                    <label class="field-label" for="site_logo">Logo</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="file"
                               name="site_logo"
                               id="site_logo"
                               accept="image/*"
                               class="field-input {{ $errors->has('site_logo') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('site_logo'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('site_logo') }}</p>
                    @endif
                </div>

                @if($websiteSetting->getFirstMediaUrl('site_favicon'))
                    <div class="edit-image-preview">
                        <img src="{{ $websiteSetting->getFirstMediaUrl('site_favicon') }}" alt="Site Favicon">
                    </div>
                @endif

                <div class="field-group">
                    <label class="field-label" for="site_favicon">Favicon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>
                        <input type="file"
                               name="site_favicon"
                               id="site_favicon"
                               accept="image/*,.ico"
                               class="field-input {{ $errors->has('site_favicon') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('site_favicon'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('site_favicon') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-address-book"></i>
                </div>

                <div>
                    <p class="form-card-title">Contact Detail</p>
                    <p class="form-card-subtitle">Email, phone number and WhatsApp number</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="contact_email">Email</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email"
                               name="contact_email"
                               id="contact_email"
                               value="{{ old('contact_email', $websiteSetting->contact_email) }}"
                               placeholder="info@omdentalclinic.com"
                               class="field-input {{ $errors->has('contact_email') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('contact_email'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('contact_email') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="contact_number">Number</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>
                        <input type="text"
                               name="contact_number"
                               id="contact_number"
                               value="{{ old('contact_number', $websiteSetting->contact_number) }}"
                               placeholder="+91 99999 99999"
                               class="field-input {{ $errors->has('contact_number') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('contact_number'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('contact_number') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="whatsapp_number">WhatsApp Number</label>
                    <div class="input-icon-wrap">
                        <i class="fab fa-whatsapp icon"></i>
                        <input type="text"
                               name="whatsapp_number"
                               id="whatsapp_number"
                               value="{{ old('whatsapp_number', $websiteSetting->whatsapp_number) }}"
                               placeholder="919999999999"
                               class="field-input {{ $errors->has('whatsapp_number') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('whatsapp_number'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('whatsapp_number') }}</p>
                    @endif
                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Use country code without plus sign for WhatsApp links.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-magnifying-glass-chart"></i>
            </div>

            <div>
                <p class="form-card-title">SEO Settings</p>
                <p class="form-card-subtitle">Search engine and social sharing meta content</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label" for="meta_title">Meta Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="meta_title"
                               id="meta_title"
                               value="{{ old('meta_title', $websiteSetting->meta_title) }}"
                               placeholder="OM Dental Clinic | Best Dental Care"
                               class="field-input {{ $errors->has('meta_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_keywords">Meta Keywords</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tags icon"></i>
                        <input type="text"
                               name="meta_keywords"
                               id="meta_keywords"
                               value="{{ old('meta_keywords', $websiteSetting->meta_keywords) }}"
                               placeholder="dental clinic, dentist, root canal"
                               class="field-input {{ $errors->has('meta_keywords') ? 'error' : '' }}">
                    </div>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="meta_description">Meta Description</label>
                <textarea name="meta_description"
                          id="meta_description"
                          rows="4"
                          placeholder="Write meta description..."
                          class="field-textarea {{ $errors->has('meta_description') ? 'error' : '' }}">{{ old('meta_description', $websiteSetting->meta_description) }}</textarea>
            </div>

            <div class="admin-form-grid mini-grid">
                <div class="field-group">
                    <label class="field-label" for="og_title">OG Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-share-nodes icon"></i>
                        <input type="text"
                               name="og_title"
                               id="og_title"
                               value="{{ old('og_title', $websiteSetting->og_title) }}"
                               placeholder="OM Dental Clinic"
                               class="field-input {{ $errors->has('og_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="og_image">OG Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="file"
                               name="og_image"
                               id="og_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('og_image') ? 'error' : '' }}">
                    </div>
                </div>
            </div>

            @if($websiteSetting->getFirstMediaUrl('og_image'))
                <div class="edit-image-preview">
                    <img src="{{ $websiteSetting->getFirstMediaUrl('og_image') }}" alt="OG Image">
                </div>
            @endif

            <div class="field-group">
                <label class="field-label" for="og_description">OG Description</label>
                <textarea name="og_description"
                          id="og_description"
                          rows="4"
                          placeholder="Write social sharing description..."
                          class="field-textarea {{ $errors->has('og_description') ? 'error' : '' }}">{{ old('og_description', $websiteSetting->og_description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-actions">
        @can('website_setting_edit')
            <button type="submit" class="btn-primary">
                <i class="fas fa-check"></i>
                {{ trans('global.save') }}
            </button>
        @endcan

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
