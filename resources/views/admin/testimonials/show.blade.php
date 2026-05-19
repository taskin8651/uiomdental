@extends('layouts.admin')

@section('page-title', 'Show Testimonial')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$testimonial->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Testimonial Details</h2>

        <p class="admin-page-subtitle">
            Full details for this patient review
        </p>
    </div>

    <div class="show-actions">
        @can('testimonial_edit')
            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Review
            </a>
        @endcan

        @can('testimonial_delete')
            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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
                    {{ $testimonial->avatar_letter ?: strtoupper(substr($testimonial->customer_name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $testimonial->customer_name }}</p>
                <p class="profile-subtitle">{{ $testimonial->customer_type }}</p>

                <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                    @if($testimonial->status)
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

                    @if($testimonial->is_featured)
                        <span class="role-tag">
                            <i class="fas fa-star" style="font-size:10px; margin-right:5px;"></i>
                            Featured
                        </span>
                    @endif
                </div>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Review ID</p>
                        <p class="stat-mini-value">#{{ $testimonial->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Rating</p>
                        <p class="stat-mini-value">{{ $testimonial->rating }}/5</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $testimonial->sort_order }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Featured</p>
                        <p class="stat-mini-value-sm">
                            {{ $testimonial->is_featured ? 'Yes' : 'No' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('testimonial_edit')
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Review
                    </a>
                @endcan

                <a href="{{ route('admin.testimonials.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Testimonials
                </a>

                @can('testimonial_create')
                    <a href="{{ route('admin.testimonials.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Review
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-star"></i>
                </div>

                <p class="detail-section-title">Review Preview</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="permission-summary">
                    <p style="color:#F59E0B;margin-bottom:14px;">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="{{ $i <= $testimonial->rating ? 'fas' : 'far' }} fa-star"></i>
                        @endfor
                    </p>

                    <p style="font-size:15px;color:#475569;line-height:1.8;margin:0;">
                        “{{ $testimonial->review_text }}”
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Review Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $testimonial->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Patient Name</span>
                    <span class="detail-value">{{ $testimonial->customer_name ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Patient Type</span>
                    <span class="detail-value">{{ $testimonial->customer_type ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Avatar Letter</span>
                    <span class="detail-value">{{ $testimonial->avatar_letter ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Rating</span>
                    <span class="detail-value">{{ $testimonial->rating }}/5</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Review</span>
                    <span class="detail-value">{{ $testimonial->review_text ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $testimonial->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($testimonial->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($testimonial->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection