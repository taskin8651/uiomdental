@extends('layouts.admin')

@section('page-title', 'Contact Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Enquiries</h2>
        <p class="admin-page-subtitle">
            Manage enquiries submitted from the contact form
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $contactEnquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $contactEnquiries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">This Week</p>
        <p class="stat-value">{{ $contactEnquiries->where('created_at', '>=', now()->subDays(7))->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Email</p>
        <p class="stat-value">{{ $contactEnquiries->whereNotNull('email')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Contact Enquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Message</th>
                    <th>Submitted</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($contactEnquiries as $contactEnquiry)
                    <tr data-entry-id="{{ $contactEnquiry->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $contactEnquiry->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$contactEnquiry->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($contactEnquiry->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $contactEnquiry->name }}</p>
                                    <p class="table-sub-text">Contact Enquiry</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">{{ $contactEnquiry->phone }}</td>
                        <td style="color:#475569;">{{ $contactEnquiry->email ?? 'N/A' }}</td>
                        <td style="color:#475569;">{{ $contactEnquiry->service ?? 'N/A' }}</td>
                        <td style="color:#475569;">{{ Str::limit($contactEnquiry->message, 70) }}</td>
                        <td style="color:#475569;">{{ optional($contactEnquiry->created_at)->format('d M Y, H:i') }}</td>

                        <td>
                            <div class="action-row">
                                @can('contact_enquiry_show')
                                    <a href="{{ route('admin.contact-enquiries.show', $contactEnquiry->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('contact_enquiry_delete')
                                    <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}"
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
    initAdminDataTable('.datatable-ContactEnquiry', {
        canDelete: @can('contact_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.contact-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search contact enquiries...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ contact enquiries'
    });
});
</script>
@endsection
