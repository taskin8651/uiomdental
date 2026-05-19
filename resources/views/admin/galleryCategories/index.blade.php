@extends('layouts.admin')

@section('page-title', 'Gallery Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Gallery Categories</h2>
        <p class="admin-page-subtitle">
            Manage gallery tabs/categories for frontend gallery section
        </p>
    </div>

    @can('gallery_category_create')
        <a href="{{ route('admin.gallery-categories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Gallery Category
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Categories</p>
        <p class="stat-value">{{ $galleryCategories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $galleryCategories->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $galleryCategories->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Gallery Items</p>
        <p class="stat-value">{{ $galleryCategories->sum('items_count') }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Gallery Categories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-GalleryCategory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Items</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($galleryCategories as $galleryCategory)
                    <tr data-entry-id="{{ $galleryCategory->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $galleryCategory->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$galleryCategory->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    <i class="fas fa-layer-group"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $galleryCategory->name }}</p>
                                    <p class="table-sub-text">Gallery Tab</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $galleryCategory->slug }}
                        </td>

                        <td style="color:#475569;">
                            {{ $galleryCategory->items_count ?? 0 }}
                        </td>

                        <td style="color:#475569;">
                            {{ $galleryCategory->sort_order }}
                        </td>

                        <td>
                            @if($galleryCategory->status)
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
                                @can('gallery_category_show')
                                    <a href="{{ route('admin.gallery-categories.show', $galleryCategory->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('gallery_category_edit')
                                    <a href="{{ route('admin.gallery-categories.edit', $galleryCategory->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('gallery_category_delete')
                                    <form action="{{ route('admin.gallery-categories.destroy', $galleryCategory->id) }}"
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
    initAdminDataTable('.datatable-GalleryCategory', {
        canDelete: @can('gallery_category_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.gallery-categories.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search gallery categories...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ gallery categories'
    });
});
</script>
@endsection