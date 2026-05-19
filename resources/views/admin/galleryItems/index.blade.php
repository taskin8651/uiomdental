@extends('layouts.admin')

@section('page-title', 'Gallery Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Gallery Items</h2>
        <p class="admin-page-subtitle">
            Manage frontend gallery images, overlay titles and category filters
        </p>
    </div>

    @can('gallery_item_create')
        <a href="{{ route('admin.gallery-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Gallery Item
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Items</p>
        <p class="stat-value">{{ $galleryItems->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $galleryItems->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $galleryItems->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Image</p>
        <p class="stat-value">
            {{ $galleryItems->filter(fn($item) => $item->getFirstMediaUrl('gallery_image'))->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Gallery Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-GalleryItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Gallery Item</th>
                    <th>Category</th>
                    <th>Card Size</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($galleryItems as $galleryItem)
                    <tr data-entry-id="{{ $galleryItem->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $galleryItem->id }}</span>
                        </td>

                        <td>
                            @if($galleryItem->getFirstMediaUrl('gallery_image'))
                                <img src="{{ $galleryItem->getFirstMediaUrl('gallery_image') }}"
                                     alt="{{ $galleryItem->alt_text }}"
                                     style="width:72px;height:54px;object-fit:cover;border-radius:14px;">
                            @else
                                <div style="width:72px;height:54px;border-radius:14px;background:#F1F5F9;display:flex;align-items:center;justify-content:center;color:#94A3B8;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div>
                                <p class="table-main-text">{{ $galleryItem->title }}</p>
                                <p class="table-sub-text">{{ $galleryItem->label ?: 'Gallery Image' }}</p>
                            </div>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                <span class="role-tag">
                                    {{ optional($galleryItem->category)->name ?? 'Uncategorized' }}
                                </span>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ ucfirst($galleryItem->card_size) }}
                        </td>

                        <td style="color:#475569;">
                            {{ $galleryItem->sort_order }}
                        </td>

                        <td>
                            @if($galleryItem->status)
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
                                @can('gallery_item_show')
                                    <a href="{{ route('admin.gallery-items.show', $galleryItem->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('gallery_item_edit')
                                    <a href="{{ route('admin.gallery-items.edit', $galleryItem->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('gallery_item_delete')
                                    <form action="{{ route('admin.gallery-items.destroy', $galleryItem->id) }}"
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
    initAdminDataTable('.datatable-GalleryItem', {
        canDelete: @can('gallery_item_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.gallery-items.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search gallery items...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ gallery items'
    });
});
</script>
@endsection