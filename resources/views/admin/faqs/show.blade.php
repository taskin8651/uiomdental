@extends('layouts.admin')

@section('page-title', 'Show FAQ')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$faq->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">FAQ Details</h2>

        <p class="admin-page-subtitle">
            Full details for this frequently asked question
        </p>
    </div>

    <div class="show-actions">
        @can('faq_edit')
            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit FAQ
            </a>
        @endcan

        @can('faq_delete')
            <form action="{{ route('admin.faqs.destroy', $faq->id) }}"
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
                    <i class="fas fa-question"></i>
                </div>

                <p class="profile-title">{{ $faq->question }}</p>
                <p class="profile-subtitle">FAQ Item</p>

                <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                    @if($faq->status)
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

                    @if($faq->is_open)
                        <span class="role-tag">
                            <i class="fas fa-eye" style="font-size:10px; margin-right:5px;"></i>
                            Open Default
                        </span>
                    @endif
                </div>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">FAQ ID</p>
                        <p class="stat-mini-value">#{{ $faq->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $faq->sort_order }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Open Default</p>
                        <p class="stat-mini-value-sm">{{ $faq->is_open ? 'Yes' : 'No' }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Status</p>
                        <p class="stat-mini-value-sm">{{ $faq->status ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('faq_edit')
                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit FAQ
                    </a>
                @endcan

                <a href="{{ route('admin.faqs.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All FAQs
                </a>

                @can('faq_create')
                    <a href="{{ route('admin.faqs.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New FAQ
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-circle-question"></i>
                </div>

                <p class="detail-section-title">FAQ Preview</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="permission-summary">
                    <p class="permission-summary-title">
                        {{ $faq->question }}
                    </p>

                    <p style="font-size:15px;color:#475569;line-height:1.8;margin:0;">
                        {{ $faq->answer }}
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">FAQ Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $faq->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Question</span>
                    <span class="detail-value">{{ $faq->question ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Answer</span>
                    <span class="detail-value">{{ $faq->answer ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $faq->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Open Default</span>
                    <span class="detail-value">{{ $faq->is_open ? 'Yes' : 'No' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($faq->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($faq->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection