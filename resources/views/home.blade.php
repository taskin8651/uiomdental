@extends('layouts.admin')

@section('styles')
<style>
    .dash-head {
        display: flex;
        justify-content: space-between;
        gap: 16px;
        align-items: flex-start;
        margin-bottom: 22px;
    }
    .dash-title {
        margin: 0;
        color: #111827;
        font-size: 24px;
        font-weight: 800;
    }
    .dash-subtitle {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 13px;
    }
    .dash-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 12px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        background: #fff;
        color: #374151;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }
    .priority-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 18px;
    }
    .priority-card,
    .dash-card,
    .module-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 10px 28px rgba(15, 23, 42, .04);
    }
    .priority-card {
        padding: 18px;
        position: relative;
        overflow: hidden;
    }
    .priority-card::after {
        content: "";
        position: absolute;
        right: -24px;
        top: -24px;
        width: 92px;
        height: 92px;
        border-radius: 50%;
        background: rgba(79, 70, 229, .08);
    }
    .priority-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef2ff;
        color: #4f46e5;
        margin-bottom: 12px;
        font-size: 17px;
    }
    .priority-label {
        margin: 0 0 7px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: .05em;
        font-size: 11px;
        font-weight: 800;
    }
    .priority-value {
        margin: 0;
        color: #111827;
        font-size: 30px;
        line-height: 1;
        font-weight: 800;
    }
    .priority-note {
        margin: 9px 0 0;
        color: #64748b;
        font-size: 12px;
    }
    .dash-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 18px;
    }
    .dash-card {
        overflow: hidden;
    }
    .dash-card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 16px 18px;
        border-bottom: 1px solid #f1f5f9;
    }
    .dash-card-title {
        margin: 0;
        color: #111827;
        font-size: 15px;
        font-weight: 800;
    }
    .dash-card-link {
        color: #4f46e5;
        text-decoration: none;
        font-size: 12px;
        font-weight: 800;
    }
    .dash-list {
        display: flex;
        flex-direction: column;
    }
    .dash-row {
        display: grid;
        grid-template-columns: minmax(0, 1.1fr) minmax(0, .9fr) auto;
        gap: 12px;
        align-items: center;
        padding: 13px 18px;
        border-bottom: 1px solid #f8fafc;
    }
    .dash-row:last-child {
        border-bottom: 0;
    }
    .row-title {
        margin: 0 0 3px;
        color: #111827;
        font-size: 13px;
        font-weight: 800;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .row-sub {
        margin: 0;
        color: #94a3b8;
        font-size: 12px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .row-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 999px;
        background: #f8fafc;
        color: #475569;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }
    .empty-row {
        padding: 24px 18px;
        color: #94a3b8;
        font-size: 13px;
        text-align: center;
    }
    .modules-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
    }
    .module-card {
        padding: 16px;
        display: flex;
        gap: 13px;
        align-items: flex-start;
        text-decoration: none;
        transition: transform .18s, box-shadow .18s;
    }
    .module-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 34px rgba(15, 23, 42, .08);
    }
    .module-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #f0f9ff;
        color: #0284c7;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
    }
    .module-title {
        margin: 0 0 5px;
        color: #111827;
        font-size: 14px;
        font-weight: 800;
    }
    .module-meta {
        margin: 0;
        color: #64748b;
        font-size: 12px;
        line-height: 1.4;
    }
    .module-count {
        margin-left: auto;
        color: #4f46e5;
        font-weight: 900;
        font-size: 20px;
        line-height: 1;
    }
    @media (max-width: 1024px) {
        .priority-grid,
        .modules-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .dash-layout {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 640px) {
        .dash-head {
            flex-direction: column;
        }
        .priority-grid,
        .modules-grid {
            grid-template-columns: 1fr;
        }
        .dash-row {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="dash-head">
    <div>
        <h2 class="dash-title">Clinic Dashboard</h2>
        <p class="dash-subtitle">
            Appointment requests and contact enquiries are kept front and center for quick follow-up.
        </p>
    </div>
    <span class="dash-pill">
        <i class="fas fa-clock"></i>
        {{ now()->format('D, d M Y') }}
    </span>
</div>

<div class="priority-grid">
    <a href="{{ route('admin.appointment-requests.index') }}" class="priority-card" style="text-decoration:none;">
        <div class="priority-icon"><i class="fas fa-calendar-check"></i></div>
        <p class="priority-label">Total Appointments</p>
        <p class="priority-value">{{ $stats['appointments_total'] }}</p>
        <p class="priority-note">{{ $stats['appointments_today'] }} new request(s) today</p>
    </a>

    <a href="{{ route('admin.appointment-requests.index') }}" class="priority-card" style="text-decoration:none;">
        <div class="priority-icon" style="background:#ecfdf5;color:#059669;"><i class="fas fa-calendar-day"></i></div>
        <p class="priority-label">Scheduled Today</p>
        <p class="priority-value">{{ $stats['scheduled_today'] }}</p>
        <p class="priority-note">Based on preferred appointment date</p>
    </a>

    <a href="{{ route('admin.contact-enquiries.index') }}" class="priority-card" style="text-decoration:none;">
        <div class="priority-icon" style="background:#fff7ed;color:#ea580c;"><i class="fas fa-envelope-open-text"></i></div>
        <p class="priority-label">Total Enquiries</p>
        <p class="priority-value">{{ $stats['enquiries_total'] }}</p>
        <p class="priority-note">{{ $stats['enquiries_today'] }} new enquiry(s) today</p>
    </a>

    <a href="{{ route('admin.service-sections.index') }}" class="priority-card" style="text-decoration:none;">
        <div class="priority-icon" style="background:#fdf2f8;color:#db2777;"><i class="fas fa-tooth"></i></div>
        <p class="priority-label">Active Content</p>
        <p class="priority-value">{{ $stats['services'] + $stats['gallery_items'] + $stats['testimonials'] }}</p>
        <p class="priority-note">Services, gallery items and reviews</p>
    </a>
</div>

<div class="dash-layout">
    <div class="dash-card">
        <div class="dash-card-head">
            <p class="dash-card-title">Recent Appointment Requests</p>
            <a href="{{ route('admin.appointment-requests.index') }}" class="dash-card-link">View All</a>
        </div>

        <div class="dash-list">
            @forelse($recentAppointments as $appointment)
                <div class="dash-row">
                    <div>
                        <p class="row-title">{{ $appointment->name }}</p>
                        <p class="row-sub">{{ $appointment->phone }}{{ $appointment->email ? ' · ' . $appointment->email : '' }}</p>
                    </div>
                    <div>
                        <p class="row-title">{{ $appointment->service }}</p>
                        <p class="row-sub">
                            {{ $appointment->date ? $appointment->date->format('d M Y') : 'No date' }}
                            {{ $appointment->time ? ' · ' . $appointment->time : '' }}
                        </p>
                    </div>
                    <a href="{{ route('admin.appointment-requests.show', $appointment) }}" class="row-badge">Open</a>
                </div>
            @empty
                <div class="empty-row">No appointment requests yet.</div>
            @endforelse
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <p class="dash-card-title">Recent Contact Enquiries</p>
            <a href="{{ route('admin.contact-enquiries.index') }}" class="dash-card-link">View All</a>
        </div>

        <div class="dash-list">
            @forelse($recentEnquiries as $enquiry)
                <div class="dash-row">
                    <div>
                        <p class="row-title">{{ $enquiry->name }}</p>
                        <p class="row-sub">{{ $enquiry->phone }}{{ $enquiry->email ? ' · ' . $enquiry->email : '' }}</p>
                    </div>
                    <div>
                        <p class="row-title">{{ $enquiry->service }}</p>
                        <p class="row-sub">{{ \Illuminate\Support\Str::limit($enquiry->message ?: 'No message', 42) }}</p>
                    </div>
                    <a href="{{ route('admin.contact-enquiries.show', $enquiry) }}" class="row-badge">Open</a>
                </div>
            @empty
                <div class="empty-row">No contact enquiries yet.</div>
            @endforelse
        </div>
    </div>
</div>

<div class="dash-card" style="padding:18px;">
    <div class="dash-card-head" style="padding:0 0 14px;margin-bottom:14px;">
        <div>
            <p class="dash-card-title">Website Modules</p>
            <p class="dash-subtitle" style="margin-top:4px;">Quick access to each content module shown across the website.</p>
        </div>
    </div>

    <div class="modules-grid">
        @foreach($modules as $module)
            <a href="{{ $module['route'] }}" class="module-card">
                <div class="module-icon">
                    <i class="fas {{ $module['icon'] }}"></i>
                </div>
                <div style="min-width:0;">
                    <p class="module-title">{{ $module['title'] }}</p>
                    <p class="module-meta">{{ \Illuminate\Support\Str::limit($module['meta'], 54) }}</p>
                </div>
                <span class="module-count">{{ $module['count'] }}</span>
            </a>
        @endforeach
    </div>
</div>
@endsection
