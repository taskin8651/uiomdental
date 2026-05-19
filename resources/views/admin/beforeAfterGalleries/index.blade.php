@extends('layouts.admin')

@section('page-title', 'Before After Gallery')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Before After Gallery</h2>
        <p class="admin-page-subtitle">
            Manage dental treatment before and after result cards
        </p>
    </div>

    @can('before_after_gallery_create')
        <a href="{{ route('admin.before-after-galleries.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Result
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Results</p>
        <p class="stat-value">{{ $beforeAfterGalleries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $beforeAfterGalleries->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $beforeAfterGalleries->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Images</p>
        <p class="stat-value">
            {{ $beforeAfterGalleries->filter(fn($item) => $item->getFirstMediaUrl('before_image') && $item->getFirstMediaUrl('after_image'))->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Before After Results</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-BeforeAfterGallery">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Before</th>
                    <th>After</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($beforeAfterGalleries as $beforeAfterGallery)
                    <tr data-entry-id="{{ $beforeAfterGallery->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $beforeAfterGallery->id }}</span>
                        </td>

                        <td>
                            @if($beforeAfterGallery->getFirstMediaUrl('before_image'))
                                <img src="{{ $beforeAfterGallery->getFirstMediaUrl('before_image') }}"
                                     alt="{{ $beforeAfterGallery->before_alt }}"
                                     style="width:72px;height:54px;object-fit:cover;border-radius:14px;">
                            @else
                                <div style="width:72px;height:54px;border-radius:14px;background:#F1F5F9;display:flex;align-items:center;justify-content:center;color:#94A3B8;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($beforeAfterGallery->getFirstMediaUrl('after_image'))
                                <img src="{{ $beforeAfterGallery->getFirstMediaUrl('after_image') }}"
                                     alt="{{ $beforeAfterGallery->after_alt }}"
                                     style="width:72px;height:54px;object-fit:cover;border-radius:14px;">
                            @else
                                <div style="width:72px;height:54px;border-radius:14px;background:#F1F5F9;display:flex;align-items:center;justify-content:center;color:#94A3B8;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <p class="table-main-text">{{ $beforeAfterGallery->title }}</p>
                            <p class="table-sub-text">{{ Str::limit($beforeAfterGallery->description, 70) }}</p>
                        </td>

                        <td style="color:#475569;">
                            {{ $beforeAfterGallery->sort_order }}
                        </td>

                        <td>
                            @if($beforeAfterGallery->status)
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
                                @can('before_after_gallery_show')
                                    <a href="{{ route('admin.before-after-galleries.show', $beforeAfterGallery->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('before_after_gallery_edit')
                                    <a href="{{ route('admin.before-after-galleries.edit', $beforeAfterGallery->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('before_after_gallery_delete')
                                    <form action="{{ route('admin.before-after-galleries.destroy', $beforeAfterGallery->id) }}"
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
    initAdminDataTable('.datatable-BeforeAfterGallery', {
        canDelete: @can('before_after_gallery_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.before-after-galleries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search before after results...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ results'
    });
});
</script>
@endsection