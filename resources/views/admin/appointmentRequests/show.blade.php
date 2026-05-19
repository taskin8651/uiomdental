@extends('layouts.admin')

@section('page-title', 'Show Appointment Request')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$appointmentRequest->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.appointment-requests.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Appointment Request Details</h2>

        <p class="admin-page-subtitle">
            Full details for this appointment request
        </p>
    </div>

    <div class="show-actions">
        @can('appointment_request_delete')
            <form action="{{ route('admin.appointment-requests.destroy', $appointmentRequest->id) }}"
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
                    {{ strtoupper(substr($appointmentRequest->name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $appointmentRequest->name }}</p>
                <p class="profile-subtitle">{{ $appointmentRequest->service }}</p>

                <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                    <span class="status-pill success">
                        <i class="fas fa-calendar-check"></i>
                        {{ optional($appointmentRequest->date)->format('d M Y') }}
                    </span>

                    <span class="role-tag">
                        {{ $appointmentRequest->time }}
                    </span>
                </div>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Request ID</p>
                        <p class="stat-mini-value">#{{ $appointmentRequest->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Patient Age</p>
                        <p class="stat-mini-value-sm">{{ $appointmentRequest->age ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="tel:{{ $appointmentRequest->phone }}" class="quick-link primary">
                    <i class="fas fa-phone"></i>
                    Call Patient
                </a>

                @if($appointmentRequest->email)
                    <a href="mailto:{{ $appointmentRequest->email }}" class="quick-link">
                        <i class="fas fa-envelope"></i>
                        Send Email
                    </a>
                @endif

                <a href="{{ route('admin.appointment-requests.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Appointment Requests
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-notes-medical"></i>
                </div>

                <p class="detail-section-title">Dental Problem</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="permission-summary">
                    <p style="font-size:15px;color:#475569;line-height:1.8;margin:0;">
                        {{ $appointmentRequest->message ?? 'No problem details provided.' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Appointment Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $appointmentRequest->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $appointmentRequest->phone }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $appointmentRequest->email ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Age</span>
                    <span class="detail-value">{{ $appointmentRequest->age ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Service</span>
                    <span class="detail-value">{{ $appointmentRequest->service }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Preferred Date</span>
                    <span class="detail-value">{{ optional($appointmentRequest->date)->format('d M Y') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Preferred Time</span>
                    <span class="detail-value">{{ $appointmentRequest->time }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Visit Type</span>
                    <span class="detail-value">{{ $appointmentRequest->visit_type ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($appointmentRequest->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
