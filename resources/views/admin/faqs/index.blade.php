@extends('layouts.admin')

@section('page-title', 'FAQs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">FAQs</h2>
        <p class="admin-page-subtitle">
            Manage frequently asked questions for frontend FAQ section
        </p>
    </div>

    @can('faq_create')
        <a href="{{ route('admin.faqs.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add FAQ
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total FAQs</p>
        <p class="stat-value">{{ $faqs->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $faqs->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $faqs->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Open Default</p>
        <p class="stat-value">{{ $faqs->where('is_open', 1)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All FAQs</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Faq">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Open</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($faqs as $faq)
                    <tr data-entry-id="{{ $faq->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $faq->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$faq->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    <i class="fas fa-question"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $faq->question }}</p>
                                    <p class="table-sub-text">FAQ Item</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ Str::limit($faq->answer, 80) }}
                        </td>

                        <td>
                            @if($faq->is_open)
                                <span class="role-tag">
                                    <i class="fas fa-eye" style="font-size:10px;margin-right:5px;"></i>
                                    Open
                                </span>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">Closed</span>
                            @endif
                        </td>

                        <td style="color:#475569;">
                            {{ $faq->sort_order }}
                        </td>

                        <td>
                            @if($faq->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('faq_show')
                                    <a href="{{ route('admin.faqs.show', $faq->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('faq_edit')
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('faq_delete')
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}"
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
    initAdminDataTable('.datatable-Faq', {
        canDelete: @can('faq_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.faqs.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search FAQs...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ FAQs'
    });
});
</script>
@endsection