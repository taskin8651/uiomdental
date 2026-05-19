@extends('layouts.admin')

@section('page-title', 'Show Contact Enquiry')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$contactEnquiry->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Contact Enquiry Details</h2>

        <p class="admin-page-subtitle">
            Full details for this submitted contact enquiry
        </p>
    </div>

    <div class="show-actions">
        @can('contact_enquiry_delete')
            <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}"
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
                    {{ strtoupper(substr($contactEnquiry->name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $contactEnquiry->name }}</p>
                <p class="profile-subtitle">{{ $contactEnquiry->service ?? 'Contact Enquiry' }}</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Enquiry ID</p>
                        <p class="stat-mini-value">#{{ $contactEnquiry->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Submitted</p>
                        <p class="stat-mini-value-sm">{{ optional($contactEnquiry->created_at)->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="tel:{{ $contactEnquiry->phone }}" class="quick-link primary">
                    <i class="fas fa-phone"></i>
                    Call Patient
                </a>

                @if($contactEnquiry->email)
                    <a href="mailto:{{ $contactEnquiry->email }}" class="quick-link">
                        <i class="fas fa-envelope"></i>
                        Send Email
                    </a>
                @endif

                <a href="{{ route('admin.contact-enquiries.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Contact Enquiries
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-message"></i>
                </div>

                <p class="detail-section-title">Patient Message</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="permission-summary">
                    <p style="font-size:15px;color:#475569;line-height:1.8;margin:0;">
                        {{ $contactEnquiry->message ?? 'No message provided.' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Enquiry Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $contactEnquiry->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $contactEnquiry->phone }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $contactEnquiry->email ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Service</span>
                    <span class="detail-value">{{ $contactEnquiry->service ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($contactEnquiry->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
