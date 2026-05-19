@extends('layouts.admin')

@section('page-title', 'Service Sections')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Service Sections</h2>
        <p class="admin-page-subtitle">
            Manage dynamic dental service sections, images and benefit cards
        </p>
    </div>

    @can('service_section_create')
        <a href="{{ route('admin.service-sections.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Service Section
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Sections</p>
        <p class="stat-value">{{ $serviceSections->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $serviceSections->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $serviceSections->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Benefit Cards</p>
        <p class="stat-value">
            {{ $serviceSections->sum(function($section) { return $section->items->count(); }) }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Service Sections</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ServiceSection">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Image</th>
                    <th>Layout</th>
                    <th>Cards</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($serviceSections as $serviceSection)
                    <tr data-entry-id="{{ $serviceSection->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $serviceSection->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$serviceSection->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    <i class="fas fa-tooth"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $serviceSection->title }}</p>
                                    <p class="table-sub-text">
                                        {{ $serviceSection->tag ?: 'Dental Service' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($serviceSection->getFirstMediaUrl('service_section_image'))
                                <img src="{{ $serviceSection->getFirstMediaUrl('service_section_image') }}"
                                     alt="{{ $serviceSection->image_alt }}"
                                     style="width:70px;height:52px;object-fit:cover;border-radius:14px;">
                            @else
                                <div style="width:70px;height:52px;border-radius:14px;background:#F1F5F9;display:flex;align-items:center;justify-content:center;color:#94A3B8;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @if($serviceSection->layout_type == 'image_left')
                                    <span class="role-tag">Image Left</span>
                                @else
                                    <span class="role-tag">Image Right</span>
                                @endif
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $serviceSection->items->count() }}
                        </td>

                        <td style="color:#475569;">
                            {{ $serviceSection->sort_order }}
                        </td>

                        <td>
                            @if($serviceSection->status)
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
                                @can('service_section_show')
                                    <a href="{{ route('admin.service-sections.show', $serviceSection->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('service_section_edit')
                                    <a href="{{ route('admin.service-sections.edit', $serviceSection->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('service_section_delete')
                                    <form action="{{ route('admin.service-sections.destroy', $serviceSection->id) }}"
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
    initAdminDataTable('.datatable-ServiceSection', {
        canDelete: @can('service_section_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.service-sections.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search service sections...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ service sections'
    });
});
</script>
@endsection