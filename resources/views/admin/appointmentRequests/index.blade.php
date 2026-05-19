@extends('layouts.admin')

@section('page-title', 'Appointment Requests')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Appointment Requests</h2>
        <p class="admin-page-subtitle">
            Manage appointment requests submitted from the website
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Requests</p>
        <p class="stat-value">{{ $appointmentRequests->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $appointmentRequests->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Upcoming</p>
        <p class="stat-value">{{ $appointmentRequests->where('date', '>=', now()->toDateString())->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Emergency</p>
        <p class="stat-value">{{ $appointmentRequests->where('visit_type', 'Emergency Visit')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Appointment Requests</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AppointmentRequest">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Visit Type</th>
                    <th>Submitted</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($appointmentRequests as $appointmentRequest)
                    <tr data-entry-id="{{ $appointmentRequest->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $appointmentRequest->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$appointmentRequest->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($appointmentRequest->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $appointmentRequest->name }}</p>
                                    <p class="table-sub-text">{{ $appointmentRequest->email ?? 'No email' }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">{{ $appointmentRequest->phone }}</td>
                        <td style="color:#475569;">{{ $appointmentRequest->service }}</td>
                        <td style="color:#475569;">{{ optional($appointmentRequest->date)->format('d M Y') }}</td>
                        <td style="color:#475569;">{{ $appointmentRequest->time }}</td>
                        <td>
                            @if($appointmentRequest->visit_type)
                                <span class="role-tag">{{ $appointmentRequest->visit_type }}</span>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">N/A</span>
                            @endif
                        </td>
                        <td style="color:#475569;">{{ optional($appointmentRequest->created_at)->format('d M Y, H:i') }}</td>

                        <td>
                            <div class="action-row">
                                @can('appointment_request_show')
                                    <a href="{{ route('admin.appointment-requests.show', $appointmentRequest->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('appointment_request_delete')
                                    <form action="{{ route('admin.appointment-requests.destroy', $appointmentRequest->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-AppointmentRequest', {
        canDelete: @can('appointment_request_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.appointment-requests.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search appointment requests...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ appointment requests'
    });
});
</script>
@endsection
