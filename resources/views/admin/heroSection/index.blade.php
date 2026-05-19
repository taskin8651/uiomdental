@extends('layouts.admin')

@section('page-title', 'Hero Section')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Hero Section</h2>
        <p class="admin-page-subtitle">
            Update homepage hero content, stats, floating cards and image
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.hero-section.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-house-medical"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Content</p>
                    <p class="form-card-subtitle">Badge, title and description</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label" for="badge_icon">Badge Icon</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-icons icon"></i>
                            <input type="text" name="badge_icon" id="badge_icon"
                                   value="{{ old('badge_icon', $heroSection->badge_icon) }}"
                                   placeholder="fa-solid fa-shield-heart"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="badge_text">Badge Text</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-tag icon"></i>
                            <input type="text" name="badge_text" id="badge_text"
                                   value="{{ old('badge_text', $heroSection->badge_text) }}"
                                   placeholder="Trusted Dental Care For Your Family"
                                   class="field-input">
                        </div>
                    </div>
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label" for="title">Title</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="title" id="title"
                                   value="{{ old('title', $heroSection->title) }}"
                                   placeholder="Healthy Smile,"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="highlight_title">Highlight Title</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-highlighter icon"></i>
                            <input type="text" name="highlight_title" id="highlight_title"
                                   value="{{ old('highlight_title', $heroSection->highlight_title) }}"
                                   placeholder="Confident Life"
                                   class="field-input">
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="5"
                              placeholder="Write hero description..."
                              class="field-textarea">{{ old('description', $heroSection->description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Image</p>
                    <p class="form-card-subtitle">Main image using media library</p>
                </div>
            </div>

            <div class="form-card-body">
                @if($heroSection->getFirstMediaUrl('hero_image'))
                    <div class="edit-image-preview">
                        <img src="{{ $heroSection->getFirstMediaUrl('hero_image') }}" alt="{{ $heroSection->title }}">
                    </div>
                @endif

                <div class="field-group">
                    <label class="field-label" for="hero_image">Upload Hero Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="file" name="hero_image" id="hero_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('hero_image') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_image'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_image') }}</p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Leave empty to keep current image. JPG, PNG, WEBP allowed.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-card mt-4">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-chart-simple"></i>
            </div>

            <div>
                <p class="form-card-title">Hero Stats</p>
                <p class="form-card-subtitle">Three stat counters below hero buttons</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid mini-grid">
                @foreach([1, 2, 3] as $index)
                    <div class="field-group">
                        <label class="field-label">Stat {{ $index }} Number</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-hashtag icon"></i>
                            <input type="text" name="stat_{{ $index }}_number"
                                   value="{{ old('stat_' . $index . '_number', $heroSection->{'stat_' . $index . '_number'}) }}"
                                   placeholder="{{ $index === 1 ? '10+' : ($index === 2 ? '5k+' : '15+') }}"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Stat {{ $index }} Text</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-align-left icon"></i>
                            <input type="text" name="stat_{{ $index }}_text"
                                   value="{{ old('stat_' . $index . '_text', $heroSection->{'stat_' . $index . '_text'}) }}"
                                   placeholder="Stat text"
                                   class="field-input">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="admin-form-grid mt-4">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-arrow-up"></i>
                </div>

                <div>
                    <p class="form-card-title">Top Floating Card</p>
                    <p class="form-card-subtitle">Small card above hero image</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach(['icon' => 'Icon', 'title' => 'Title', 'text' => 'Text'] as $field => $label)
                    <div class="field-group">
                        <label class="field-label">Top Card {{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas {{ $field === 'icon' ? 'fa-icons' : 'fa-heading' }} icon"></i>
                            <input type="text" name="top_card_{{ $field }}"
                                   value="{{ old('top_card_' . $field, $heroSection->{'top_card_' . $field}) }}"
                                   placeholder="{{ $field === 'icon' ? 'fa-solid fa-tooth' : '' }}"
                                   class="field-input">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-arrow-down"></i>
                </div>

                <div>
                    <p class="form-card-title">Bottom Floating Card</p>
                    <p class="form-card-subtitle">Small card below hero image</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach(['icon' => 'Icon', 'title' => 'Title', 'text' => 'Text'] as $field => $label)
                    <div class="field-group">
                        <label class="field-label">Bottom Card {{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas {{ $field === 'icon' ? 'fa-icons' : 'fa-heading' }} icon"></i>
                            <input type="text" name="bottom_card_{{ $field }}"
                                   value="{{ old('bottom_card_' . $field, $heroSection->{'bottom_card_' . $field}) }}"
                                   placeholder="{{ $field === 'icon' ? 'fa-solid fa-clock' : '' }}"
                                   class="field-input">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-actions">
        @can('hero_section_edit')
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
