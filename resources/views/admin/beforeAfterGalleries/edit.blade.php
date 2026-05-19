@extends('layouts.admin')

@section('page-title', 'Edit Before After Result')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.before-after-galleries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Before After Result</h2>

        <p class="admin-page-subtitle">
            Update before/after result card content and images
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.before-after-galleries.update', $beforeAfterGallery->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Before After Content</p>
                    <p class="form-card-subtitle">Title, description and labels</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $beforeAfterGallery->title) }}"
                               placeholder="Teeth Cleaning Result"
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
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description"
                              id="description"
                              rows="4"
                              placeholder="Cleaner, brighter and healthier-looking teeth after professional scaling."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $beforeAfterGallery->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label" for="before_label">Before Label</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-tag icon"></i>
                            <input type="text"
                                   name="before_label"
                                   id="before_label"
                                   value="{{ old('before_label', $beforeAfterGallery->before_label) }}"
                                   placeholder="Before"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="after_label">After Label</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-tag icon"></i>
                            <input type="text"
                                   name="after_label"
                                   id="after_label"
                                   value="{{ old('after_label', $beforeAfterGallery->after_label) }}"
                                   placeholder="After"
                                   class="field-input">
                        </div>
                    </div>
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label" for="before_alt">Before Alt</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-closed-captioning icon"></i>
                            <input type="text"
                                   name="before_alt"
                                   id="before_alt"
                                   value="{{ old('before_alt', $beforeAfterGallery->before_alt) }}"
                                   placeholder="Before Teeth Cleaning"
                                   class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="after_alt">After Alt</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-closed-captioning icon"></i>
                            <input type="text"
                                   name="after_alt"
                                   id="after_alt"
                                   value="{{ old('after_alt', $beforeAfterGallery->after_alt) }}"
                                   placeholder="After Teeth Cleaning"
                                   class="field-input">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Images & Settings</p>
                    <p class="form-card-subtitle">Change before/after images</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="admin-form-grid mini-grid">
                    <div>
                        @if($beforeAfterGallery->getFirstMediaUrl('before_image'))
                            <div class="edit-image-preview">
                                <img src="{{ $beforeAfterGallery->getFirstMediaUrl('before_image') }}"
                                     alt="{{ $beforeAfterGallery->before_alt }}">
                            </div>
                        @endif

                        <div class="field-group">
                            <label class="field-label" for="before_image">Before Image</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-image icon"></i>
                                <input type="file"
                                       name="before_image"
                                       id="before_image"
                                       accept="image/*"
                                       class="field-input {{ $errors->has('before_image') ? 'error' : '' }}">
                            </div>
                        </div>
                    </div>

                    <div>
                        @if($beforeAfterGallery->getFirstMediaUrl('after_image'))
                            <div class="edit-image-preview">
                                <img src="{{ $beforeAfterGallery->getFirstMediaUrl('after_image') }}"
                                     alt="{{ $beforeAfterGallery->after_alt }}">
                            </div>
                        @endif

                        <div class="field-group">
                            <label class="field-label" for="after_image">After Image</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-image icon"></i>
                                <input type="file"
                                       name="after_image"
                                       id="after_image"
                                       accept="image/*"
                                       class="field-input {{ $errors->has('after_image') ? 'error' : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <p class="field-hint">
                    <i class="fas fa-info-circle"></i>
                    Leave image empty to keep current image.
                </p>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>
                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $beforeAfterGallery->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="switch-line big">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', $beforeAfterGallery->status) ? 'checked' : '' }}>
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

        <a href="{{ route('admin.before-after-galleries.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection