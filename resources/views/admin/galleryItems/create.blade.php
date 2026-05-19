@extends('layouts.admin')

@section('page-title', 'Create Gallery Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Create Gallery Item</h2>

        <p class="admin-page-subtitle">
            Add a new image card for frontend premium gallery
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.gallery-items.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Item Information</p>
                    <p class="form-card-subtitle">Image overlay title and category</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="gallery_category_id">
                        Category
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="gallery_category_id"
                                id="gallery_category_id"
                                class="field-input {{ $errors->has('gallery_category_id') ? 'error' : '' }}">
                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}" {{ old('gallery_category_id') == $id ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('gallery_category_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('gallery_category_id') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="label">
                        Overlay Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="label"
                               id="label"
                               value="{{ old('label') }}"
                               placeholder="Clinic Interior"
                               class="field-input {{ $errors->has('label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('label') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               placeholder="Modern Clinic Setup"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="alt_text">
                        Image Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="alt_text"
                               id="alt_text"
                               value="{{ old('alt_text') }}"
                               placeholder="OM Dental Clinic Interior"
                               class="field-input {{ $errors->has('alt_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('alt_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('alt_text') }}
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
                    <p class="form-card-title">Image & Settings</p>
                    <p class="form-card-subtitle">Media image, card size and visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="gallery_image">
                        Gallery Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="gallery_image"
                               id="gallery_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('gallery_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('gallery_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('gallery_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Recommended JPG, PNG, WEBP. Max 4MB.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="card_size">
                        Card Size
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-expand-arrows-alt icon"></i>

                        <select name="card_size"
                                id="card_size"
                                class="field-input {{ $errors->has('card_size') ? 'error' : '' }}">
                            <option value="normal" {{ old('card_size', 'normal') == 'normal' ? 'selected' : '' }}>Normal</option>
                            <option value="large" {{ old('card_size') == 'large' ? 'selected' : '' }}>Large</option>
                            <option value="tall" {{ old('card_size') == 'tall' ? 'selected' : '' }}>Tall</option>
                            <option value="wide" {{ old('card_size') == 'wide' ? 'selected' : '' }}>Wide</option>
                        </select>
                    </div>

                    @if($errors->has('card_size'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('card_size') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
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

        <a href="{{ route('admin.gallery-items.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection