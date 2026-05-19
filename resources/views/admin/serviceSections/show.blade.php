@extends('layouts.admin')

@section('page-title', 'Show Service Section')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$serviceSection->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-sections.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Service Section Details</h2>

        <p class="admin-page-subtitle">
            Full details for this dynamic dental service section
        </p>
    </div>

    <div class="show-actions">
        @can('service_section_edit')
            <a href="{{ route('admin.service-sections.edit', $serviceSection->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Section
            </a>
        @endcan

        @can('service_section_delete')
            <form action="{{ route('admin.service-sections.destroy', $serviceSection->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    {{-- LEFT SIDE --}}
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    <i class="fas fa-tooth"></i>
                </div>

                <p class="profile-title">{{ $serviceSection->title }}</p>
                <p class="profile-subtitle">
                    {{ $serviceSection->tag ?: 'Dental Service Section' }}
                </p>

                <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                    @if($serviceSection->status)
                        <span class="status-pill success">
                            <i class="fas fa-check-circle"></i>
                            Active
                        </span>
                    @else
                        <span class="status-pill warning">
                            <i class="fas fa-clock"></i>
                            Inactive
                        </span>
                    @endif

                    @if($serviceSection->layout_type == 'image_left')
                        <span class="role-tag">
                            <i class="fas fa-image" style="font-size:10px; margin-right:5px;"></i>
                            Image Left
                        </span>
                    @else
                        <span class="role-tag">
                            <i class="fas fa-image" style="font-size:10px; margin-right:5px;"></i>
                            Image Right
                        </span>
                    @endif
                </div>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Section ID</p>
                        <p class="stat-mini-value">#{{ $serviceSection->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Benefit Cards</p>
                        <p class="stat-mini-value">{{ $serviceSection->items->count() }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $serviceSection->sort_order }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Status</p>
                        <p class="stat-mini-value-sm">
                            {{ $serviceSection->status ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('service_section_edit')
                    <a href="{{ route('admin.service-sections.edit', $serviceSection->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Section
                    </a>
                @endcan

                <a href="{{ route('admin.service-sections.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Service Sections
                </a>

                @can('service_section_create')
                    <a href="{{ route('admin.service-sections.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Section
                    </a>
                @endcan
            </div>
        </div>

        <div class="detail-card mt-3">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-list-check"></i>
                    </div>

                    <p class="detail-section-title">Benefit Cards</p>
                </div>

                <span class="status-pill success">
                    {{ $serviceSection->items->count() }} cards
                </span>
            </div>

            <div class="detail-section-pad-sm">
                @if($serviceSection->items->count())
                    <div class="service-benefit-show-grid">
                        @foreach($serviceSection->items as $item)
                            <div class="permission-summary mb-2">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div>
                                        <p class="permission-summary-title">
                                            @if($item->icon)
                                                <i class="{{ $item->icon }}"></i>
                                            @else
                                                <i class="fas fa-circle"></i>
                                            @endif

                                            {{ $item->title ?: 'Untitled Benefit' }}
                                        </p>

                                        <p style="font-size:13px;color:#64748B;line-height:1.6;margin:6px 0 0;">
                                            {{ $item->description ?: 'No description added.' }}
                                        </p>
                                    </div>

                                    @if($item->status)
                                        <span class="status-pill success">
                                            Active
                                        </span>
                                    @else
                                        <span class="status-pill warning">
                                            Inactive
                                        </span>
                                    @endif
                                </div>

                                <div class="d-flex flex-wrap gap-1 mt-2">
                                    <span class="mini-permission">
                                        Order: {{ $item->sort_order }}
                                    </span>

                                    @if($item->icon)
                                        <span class="mini-permission">
                                            {{ $item->icon }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-list-check"></i>
                        </div>

                        <p class="assign-empty-title">No benefit cards found</p>
                        <p class="assign-empty-text">This service section has no benefit cards yet.</p>

                        @can('service_section_edit')
                            <a href="{{ route('admin.service-sections.edit', $serviceSection->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Add Benefit Cards
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Section Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $serviceSection->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Section Tag</span>
                    <span class="detail-value">{{ $serviceSection->tag ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $serviceSection->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">
                        {{ $serviceSection->description ?? 'N/A' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Image Alt</span>
                    <span class="detail-value">{{ $serviceSection->image_alt ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Layout</span>
                    <span class="detail-value">
                        {{ $serviceSection->layout_type == 'image_left' ? 'Image Left' : 'Image Right' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $serviceSection->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($serviceSection->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($serviceSection->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Service Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($serviceSection->getFirstMediaUrl('service_section_image'))
                    <div class="show-image-box">
                        <img src="{{ $serviceSection->getFirstMediaUrl('service_section_image') }}"
                             alt="{{ $serviceSection->image_alt ?? $serviceSection->title }}">
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-image"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">Upload a service image from edit page.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-badge"></i>
                </div>

                <p class="detail-section-title">Floating Card</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Float Icon</span>

                    <span class="detail-value">
                        @if($serviceSection->float_icon)
                            <i class="{{ $serviceSection->float_icon }}"></i>
                            {{ $serviceSection->float_icon }}
                        @else
                            N/A
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Float Title</span>
                    <span class="detail-value">{{ $serviceSection->float_title ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Float Subtitle</span>
                    <span class="detail-value">{{ $serviceSection->float_subtitle ?? 'N/A' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-hand-pointer"></i>
                </div>

                <p class="detail-section-title">Action Buttons</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Button 1 Text</span>
                    <span class="detail-value">{{ $serviceSection->button_1_text ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 1 URL</span>
                    <span class="detail-value">{{ $serviceSection->button_1_url ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 1 Icon</span>

                    <span class="detail-value">
                        @if($serviceSection->button_1_icon)
                            <i class="{{ $serviceSection->button_1_icon }}"></i>
                            {{ $serviceSection->button_1_icon }}
                        @else
                            N/A
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 2 Text</span>
                    <span class="detail-value">{{ $serviceSection->button_2_text ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 2 URL</span>
                    <span class="detail-value">{{ $serviceSection->button_2_url ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button 2 Icon</span>

                    <span class="detail-value">
                        @if($serviceSection->button_2_icon)
                            <i class="{{ $serviceSection->button_2_icon }}"></i>
                            {{ $serviceSection->button_2_icon }}
                        @else
                            N/A
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection