@extends('layouts.admin')

@section('page-title', 'Create Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Create Testimonial</h2>

        <p class="admin-page-subtitle">
            Add a patient review for frontend testimonial section
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.testimonials.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>

                <div>
                    <p class="form-card-title">Review Content</p>
                    <p class="form-card-subtitle">Patient name, treatment and review text</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="customer_name">Patient Name</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="customer_name"
                               id="customer_name"
                               value="{{ old('customer_name') }}"
                               placeholder="Rahul Kumar"
                               class="field-input {{ $errors->has('customer_name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('customer_name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('customer_name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="customer_type">Treatment / Patient Type</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tooth icon"></i>

                        <input type="text"
                               name="customer_type"
                               id="customer_type"
                               value="{{ old('customer_type') }}"
                               placeholder="Root Canal Patient"
                               class="field-input {{ $errors->has('customer_type') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="review_text">Review Text</label>

                    <textarea name="review_text"
                              id="review_text"
                              rows="6"
                              placeholder="Write patient review..."
                              class="field-textarea {{ $errors->has('review_text') ? 'error' : '' }}">{{ old('review_text') }}</textarea>

                    @if($errors->has('review_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('review_text') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Review Settings</p>
                    <p class="form-card-subtitle">Rating, avatar, order and visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="avatar_letter">Avatar Letter</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-font icon"></i>

                        <input type="text"
                               name="avatar_letter"
                               id="avatar_letter"
                               value="{{ old('avatar_letter') }}"
                               placeholder="R"
                               class="field-input {{ $errors->has('avatar_letter') ? 'error' : '' }}">
                    </div>

                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Leave empty to auto-generate from patient name.
                    </p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="rating">Rating</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <select name="rating"
                                id="rating"
                                class="field-input {{ $errors->has('rating') ? 'error' : '' }}">
                            <option value="5" {{ old('rating', 5) == 5 ? 'selected' : '' }}>5 Stars</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="switch-line big">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               {{ old('is_featured') ? 'checked' : '' }}>
                        <span>Featured Review</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="switch-line big">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', 1) ? 'checked' : '' }}>
                        <span>Active on frontend</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.testimonials.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection