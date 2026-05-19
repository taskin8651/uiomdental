@extends('layouts.admin')

@section('page-title', 'Edit Service Section')

@section('content')

@php
    $items = old('items', $serviceSection->items->toArray());

    if (empty($items)) {
        $items = [
            [
                'icon' => 'fa-solid fa-magnifying-glass-chart',
                'title' => '',
                'description' => '',
                'sort_order' => 1,
                'status' => 1,
            ],
        ];
    }
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-sections.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Service Section</h2>

        <p class="admin-page-subtitle">
            Update dental service section details, media image and benefit cards
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.service-sections.update', $serviceSection->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- LEFT SIDE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tooth"></i>
                </div>

                <div>
                    <p class="form-card-title">Service Information</p>
                    <p class="form-card-subtitle">Main frontend section content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="tag">
                        Section Tag
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="tag"
                               id="tag"
                               value="{{ old('tag', $serviceSection->tag) }}"
                               placeholder="Dental Consultation"
                               class="field-input {{ $errors->has('tag') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('tag'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('tag') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $serviceSection->title) }}"
                               required
                               placeholder="Complete dental checkup with expert treatment guidance."
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
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Write service description..."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $serviceSection->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">
                        Service Image
                    </label>

                    @if($serviceSection->getFirstMediaUrl('service_section_image'))
                        <div class="edit-image-preview">
                            <img src="{{ $serviceSection->getFirstMediaUrl('service_section_image') }}"
                                 alt="{{ $serviceSection->image_alt ?? $serviceSection->title }}">
                        </div>
                    @endif

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Leave empty to keep current image. JPG, PNG, WEBP allowed.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">
                        Image Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt', $serviceSection->image_alt) }}"
                               placeholder="Dental Consultation at OM Dental Clinic"
                               class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image_alt'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image_alt') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Section Settings</p>
                    <p class="form-card-subtitle">Buttons, floating card and visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="layout_type">
                        Layout Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-columns icon"></i>

                        <select name="layout_type"
                                id="layout_type"
                                class="field-input {{ $errors->has('layout_type') ? 'error' : '' }}">
                            <option value="image_left"
                                {{ old('layout_type', $serviceSection->layout_type) == 'image_left' ? 'selected' : '' }}>
                                Image Left
                            </option>

                            <option value="image_right"
                                {{ old('layout_type', $serviceSection->layout_type) == 'image_right' ? 'selected' : '' }}>
                                Image Right
                            </option>
                        </select>
                    </div>

                    @if($errors->has('layout_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('layout_type') }}
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
                               value="{{ old('sort_order', $serviceSection->sort_order) }}"
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
                               {{ old('status', $serviceSection->status) ? 'checked' : '' }}>
                        <span>Active on frontend</span>
                    </label>
                </div>

                <hr>

                <div class="field-group">
                    <label class="field-label">
                        Button 1 Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-hand-pointer icon"></i>

                        <input type="text"
                               name="button_1_text"
                               value="{{ old('button_1_text', $serviceSection->button_1_text) }}"
                               placeholder="Book Consultation"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Button 1 URL
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_1_url"
                               value="{{ old('button_1_url', $serviceSection->button_1_url) }}"
                               placeholder="/appointment.html"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Button 1 Icon
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="button_1_icon"
                               value="{{ old('button_1_icon', $serviceSection->button_1_icon) }}"
                               placeholder="fa-solid fa-calendar-check"
                               class="field-input">
                    </div>
                </div>

                <hr>

                <div class="field-group">
                    <label class="field-label">
                        Button 2 Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>

                        <input type="text"
                               name="button_2_text"
                               value="{{ old('button_2_text', $serviceSection->button_2_text) }}"
                               placeholder="Call Now"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Button 2 URL
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_2_url"
                               value="{{ old('button_2_url', $serviceSection->button_2_url) }}"
                               placeholder="tel:+919999999999"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Button 2 Icon
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="button_2_icon"
                               value="{{ old('button_2_icon', $serviceSection->button_2_icon) }}"
                               placeholder="fa-solid fa-phone-volume"
                               class="field-input">
                    </div>
                </div>

                <hr>

                <div class="field-group">
                    <label class="field-label">
                        Float Icon
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-card icon"></i>

                        <input type="text"
                               name="float_icon"
                               value="{{ old('float_icon', $serviceSection->float_icon) }}"
                               placeholder="fa-solid fa-user-doctor"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Float Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="float_title"
                               value="{{ old('float_title', $serviceSection->float_title) }}"
                               placeholder="Expert Checkup"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Float Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="float_subtitle"
                               value="{{ old('float_subtitle', $serviceSection->float_subtitle) }}"
                               placeholder="Personal treatment plan"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- BENEFIT CARDS --}}
    <div class="form-card mt-4">
        <div class="form-card-header between">
            <div class="form-card-head-left">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Benefit Cards</p>
                    <p class="form-card-subtitle">Cards shown below the service content</p>
                </div>
            </div>

            <div class="form-mini-actions">
                <button type="button" class="btn-mini-primary" onclick="addBenefitRow()">
                    <i class="fas fa-plus"></i>
                    Add
                </button>
            </div>
        </div>

        <div class="form-card-body">
            <div id="benefitWrapper">
                @foreach($items as $index => $item)
                    <div class="benefit-admin-card role-checkbox-item checked" data-row>
                        <div class="form-card-header between benefit-inner-head">
                            <div class="form-card-head-left">
                                <div class="form-card-icon small">
                                    <i class="fas fa-grip-vertical"></i>
                                </div>

                                <div>
                                    <p class="form-card-title">Benefit #{{ $index + 1 }}</p>
                                    <p class="form-card-subtitle">Icon, title and description</p>
                                </div>
                            </div>

                            <button type="button" class="btn-mini-ghost danger" onclick="removeBenefitRow(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>

                        <div class="admin-form-grid mini-grid">
                            <div class="field-group">
                                <label class="field-label">Icon</label>

                                <div class="input-icon-wrap">
                                    <i class="fas fa-icons icon"></i>

                                    <input type="text"
                                           name="items[{{ $index }}][icon]"
                                           value="{{ $item['icon'] ?? '' }}"
                                           placeholder="fa-solid fa-tooth"
                                           class="field-input">
                                </div>
                            </div>

                            <div class="field-group">
                                <label class="field-label">Title</label>

                                <div class="input-icon-wrap">
                                    <i class="fas fa-heading icon"></i>

                                    <input type="text"
                                           name="items[{{ $index }}][title]"
                                           value="{{ $item['title'] ?? '' }}"
                                           placeholder="Detailed Oral Checkup"
                                           class="field-input">
                                </div>
                            </div>
                        </div>

                        <div class="admin-form-grid mini-grid">
                            <div class="field-group">
                                <label class="field-label">Order</label>

                                <div class="input-icon-wrap">
                                    <i class="fas fa-sort-numeric-up icon"></i>

                                    <input type="number"
                                           name="items[{{ $index }}][sort_order]"
                                           value="{{ $item['sort_order'] ?? $index + 1 }}"
                                           class="field-input">
                                </div>
                            </div>

                            <div class="field-group">
                                <label class="field-label">Status</label>

                                <label class="switch-line big">
                                    <input type="checkbox"
                                           name="items[{{ $index }}][status]"
                                           value="1"
                                           {{ !empty($item['status']) ? 'checked' : '' }}>
                                    <span>Active</span>
                                </label>
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Description</label>

                            <textarea name="items[{{ $index }}][description]"
                                      rows="2"
                                      placeholder="Short benefit description..."
                                      class="field-textarea">{{ $item['description'] ?? '' }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.service-sections.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection

@section('scripts')
@parent
<script>
    let benefitIndex = {{ count($items) }};

    function addBenefitRow() {
        const wrapper = document.getElementById('benefitWrapper');

        const html = `
            <div class="benefit-admin-card role-checkbox-item checked" data-row>
                <div class="form-card-header between benefit-inner-head">
                    <div class="form-card-head-left">
                        <div class="form-card-icon small">
                            <i class="fas fa-grip-vertical"></i>
                        </div>

                        <div>
                            <p class="form-card-title">Benefit #${benefitIndex + 1}</p>
                            <p class="form-card-subtitle">Icon, title and description</p>
                        </div>
                    </div>

                    <button type="button" class="btn-mini-ghost danger" onclick="removeBenefitRow(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label">Icon</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-icons icon"></i>
                            <input type="text" name="items[${benefitIndex}][icon]" placeholder="fa-solid fa-tooth" class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Title</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="items[${benefitIndex}][title]" placeholder="Benefit title" class="field-input">
                        </div>
                    </div>
                </div>

                <div class="admin-form-grid mini-grid">
                    <div class="field-group">
                        <label class="field-label">Order</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-sort-numeric-up icon"></i>
                            <input type="number" name="items[${benefitIndex}][sort_order]" value="${benefitIndex + 1}" class="field-input">
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Status</label>
                        <label class="switch-line big">
                            <input type="checkbox" name="items[${benefitIndex}][status]" value="1" checked>
                            <span>Active</span>
                        </label>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="items[${benefitIndex}][description]" rows="2" placeholder="Short benefit description..." class="field-textarea"></textarea>
                </div>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
        benefitIndex++;
    }

    function removeBenefitRow(button) {
        const rows = document.querySelectorAll('[data-row]');

        if (rows.length <= 1) {
            alert('At least one benefit card is required.');
            return;
        }

        button.closest('[data-row]').remove();
    }
</script>
@endsection