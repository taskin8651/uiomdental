@extends('layouts.admin')

@section('page-title', 'Show Gallery Item')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$galleryItem->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Gallery Item Details</h2>

        <p class="admin-page-subtitle">
            Full details for this gallery image card
        </p>
    </div>

    <div class="show-actions">
        @can('gallery_item_edit')
            <a href="{{ route('admin.gallery-items.edit', $galleryItem->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Item
            </a>
        @endcan

        @can('gallery_item_delete')
            <form action="{{ route('admin.gallery-items.destroy', $galleryItem->id) }}"
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

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    <i class="fas fa-image"></i>
                </div>

                <p class="profile-title">{{ $galleryItem->title }}</p>
                <p class="profile-subtitle">{{ $galleryItem->label }}</p>

                @if($galleryItem->status)
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
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Item ID</p>
                        <p class="stat-mini-value">#{{ $galleryItem->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Card Size</p>
                        <p class="stat-mini-value-sm">{{ ucfirst($galleryItem->card_size) }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $galleryItem->sort_order }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Category</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($galleryItem->category)->name ?? 'Uncategorized' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('gallery_item_edit')
                    <a href="{{ route('admin.gallery-items.edit', $galleryItem->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Item
                    </a>
                @endcan

                <a href="{{ route('admin.gallery-items.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Gallery Items
                </a>

                @can('gallery_item_create')
                    <a href="{{ route('admin.gallery-items.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Item
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Gallery Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($galleryItem->getFirstMediaUrl('gallery_image'))
                    <div class="show-image-box">
                        <img src="{{ $galleryItem->getFirstMediaUrl('gallery_image') }}"
                             alt="{{ $galleryItem->alt_text ?? $galleryItem->title }}">
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-image"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">Upload gallery image from edit page.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Item Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $galleryItem->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value">
                        {{ optional($galleryItem->category)->name ?? 'Uncategorized' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Label</span>
                    <span class="detail-value">{{ $galleryItem->label ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $galleryItem->title ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Alt Text</span>
                    <span class="detail-value">{{ $galleryItem->alt_text ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Card Size</span>
                    <span class="detail-value">{{ ucfirst($galleryItem->card_size) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $galleryItem->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($galleryItem->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($galleryItem->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection