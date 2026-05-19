@extends('layouts.admin')

@section('page-title', 'Show Before After Result')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$beforeAfterGallery->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.before-after-galleries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Before After Result Details</h2>

        <p class="admin-page-subtitle">
            Full details for this dental treatment result
        </p>
    </div>

    <div class="show-actions">
        @can('before_after_gallery_edit')
            <a href="{{ route('admin.before-after-galleries.edit', $beforeAfterGallery->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Result
            </a>
        @endcan

        @can('before_after_gallery_delete')
            <form action="{{ route('admin.before-after-galleries.destroy', $beforeAfterGallery->id) }}"
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
                    <i class="fas fa-images"></i>
                </div>

                <p class="profile-title">{{ $beforeAfterGallery->title }}</p>
                <p class="profile-subtitle">{{ $beforeAfterGallery->description }}</p>

                @if($beforeAfterGallery->status)
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
                        <p class="stat-mini-label">Result ID</p>
                        <p class="stat-mini-value">#{{ $beforeAfterGallery->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $beforeAfterGallery->sort_order }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('before_after_gallery_edit')
                    <a href="{{ route('admin.before-after-galleries.edit', $beforeAfterGallery->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Result
                    </a>
                @endcan

                <a href="{{ route('admin.before-after-galleries.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Results
                </a>

                @can('before_after_gallery_create')
                    <a href="{{ route('admin.before-after-galleries.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Result
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-images"></i>
                </div>

                <p class="detail-section-title">Before After Images</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="admin-form-grid mini-grid">
                    <div>
                        <p class="quick-title">{{ $beforeAfterGallery->before_label ?: 'Before' }}</p>

                        @if($beforeAfterGallery->getFirstMediaUrl('before_image'))
                            <div class="show-image-box">
                                <img src="{{ $beforeAfterGallery->getFirstMediaUrl('before_image') }}"
                                     alt="{{ $beforeAfterGallery->before_alt }}">
                            </div>
                        @else
                            <div class="assign-empty">
                                <p class="assign-empty-title">No before image</p>
                            </div>
                        @endif
                    </div>

                    <div>
                        <p class="quick-title">{{ $beforeAfterGallery->after_label ?: 'After' }}</p>

                        @if($beforeAfterGallery->getFirstMediaUrl('after_image'))
                            <div class="show-image-box">
                                <img src="{{ $beforeAfterGallery->getFirstMediaUrl('after_image') }}"
                                     alt="{{ $beforeAfterGallery->after_alt }}">
                            </div>
                        @else
                            <div class="assign-empty">
                                <p class="assign-empty-title">No after image</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Result Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $beforeAfterGallery->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $beforeAfterGallery->title ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $beforeAfterGallery->description ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Before Label</span>
                    <span class="detail-value">{{ $beforeAfterGallery->before_label ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">After Label</span>
                    <span class="detail-value">{{ $beforeAfterGallery->after_label ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $beforeAfterGallery->sort_order }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection