@extends('layouts.admin')

@section('page-title', 'Testimonials')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Testimonials</h2>
        <p class="admin-page-subtitle">
            Manage patient reviews, ratings and featured testimonials
        </p>
    </div>

    @can('testimonial_create')
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Testimonial
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Reviews</p>
        <p class="stat-value">{{ $testimonials->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $testimonials->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $testimonials->where('is_featured', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">5 Star</p>
        <p class="stat-value">{{ $testimonials->where('rating', 5)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Testimonials</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Testimonial">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Featured</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr data-entry-id="{{ $testimonial->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $testimonial->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$testimonial->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ $testimonial->avatar_letter ?: strtoupper(substr($testimonial->customer_name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $testimonial->customer_name }}</p>
                                    <p class="table-sub-text">{{ $testimonial->customer_type }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span style="color:#F59E0B;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $testimonial->rating ? 'fas' : 'far' }} fa-star"></i>
                                @endfor
                            </span>
                        </td>

                        <td style="color:#475569;">
                            {{ Str::limit($testimonial->review_text, 70) }}
                        </td>

                        <td>
                            @if($testimonial->is_featured)
                                <span class="role-tag">
                                    <i class="fas fa-star" style="font-size:10px;margin-right:5px;"></i>
                                    Featured
                                </span>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td style="color:#475569;">
                            {{ $testimonial->sort_order }}
                        </td>

                        <td>
                            @if($testimonial->status)
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
                                @can('testimonial_show')
                                    <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('testimonial_edit')
                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('testimonial_delete')
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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
    initAdminDataTable('.datatable-Testimonial', {
        canDelete: @can('testimonial_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.testimonials.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search testimonials...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ testimonials'
    });
});
</script>
@endsection