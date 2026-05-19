@extends('layouts.admin')

@section('page-title', 'Show Gallery Category')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$galleryCategory->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Gallery Category Details</h2>

        <p class="admin-page-subtitle">
            Full details for this gallery category
        </p>
    </div>

    <div class="show-actions">
        @can('gallery_category_edit')
            <a href="{{ route('admin.gallery-categories.edit', $galleryCategory->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Category
            </a>
        @endcan

        @can('gallery_category_delete')
            <form action="{{ route('admin.gallery-categories.destroy', $galleryCategory->id) }}"
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
                    <i class="fas fa-layer-group"></i>
                </div>

                <p class="profile-title">{{ $galleryCategory->name }}</p>
                <p class="profile-subtitle">{{ $galleryCategory->slug }}</p>

                @if($galleryCategory->status)
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
                        <p class="stat-mini-label">Category ID</p>
                        <p class="stat-mini-value">#{{ $galleryCategory->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Items</p>
                        <p class="stat-mini-value">{{ $galleryCategory->items->count() }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $galleryCategory->sort_order }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Status</p>
                        <p class="stat-mini-value-sm">
                            {{ $galleryCategory->status ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('gallery_category_edit')
                    <a href="{{ route('admin.gallery-categories.edit', $galleryCategory->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Category
                    </a>
                @endcan

                <a href="{{ route('admin.gallery-categories.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Categories
                </a>

                @can('gallery_category_create')
                    <a href="{{ route('admin.gallery-categories.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Category
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Category Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $galleryCategory->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $galleryCategory->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $galleryCategory->slug ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $galleryCategory->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($galleryCategory->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($galleryCategory->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-images"></i>
                    </div>

                    <p class="detail-section-title">Gallery Items</p>
                </div>

                <span class="status-pill success">
                    {{ $galleryCategory->items->count() }} items
                </span>
            </div>

            <div class="detail-section-pad-sm">
                @if($galleryCategory->items->count())
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($galleryCategory->items as $item)
                            <span class="role-tag">
                                <i class="fas fa-image" style="font-size:10px; margin-right:5px;"></i>
                                {{ $item->title }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-images"></i>
                        </div>

                        <p class="assign-empty-title">No items found</p>
                        <p class="assign-empty-text">This category has no gallery items yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection