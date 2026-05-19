<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGalleryItemRequest;
use App\Http\Requests\StoreGalleryItemRequest;
use App\Http\Requests\UpdateGalleryItemRequest;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gallery_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryItems = GalleryItem::with(['category', 'media'])
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.galleryItems.index', compact('galleryItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = GalleryCategory::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.galleryItems.create', compact('categories'));
    }

    public function store(StoreGalleryItemRequest $request)
    {
        $data = $request->except('gallery_image');
        $data['status'] = $request->has('status') ? 1 : 0;

        $galleryItem = GalleryItem::create($data);

        if ($request->hasFile('gallery_image')) {
            $galleryItem
                ->addMediaFromRequest('gallery_image')
                ->toMediaCollection('gallery_image');
        }

        return redirect()
            ->route('admin.gallery-items.index')
            ->with('message', 'Gallery item created successfully.');
    }

    public function show(GalleryItem $galleryItem)
    {
        abort_if(Gate::denies('gallery_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryItem->load(['category', 'media']);

        return view('admin.galleryItems.show', compact('galleryItem'));
    }

    public function edit(GalleryItem $galleryItem)
    {
        abort_if(Gate::denies('gallery_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryItem->load(['category', 'media']);

        $categories = GalleryCategory::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.galleryItems.edit', compact('galleryItem', 'categories'));
    }

    public function update(UpdateGalleryItemRequest $request, GalleryItem $galleryItem)
    {
        $data = $request->except('gallery_image');
        $data['status'] = $request->has('status') ? 1 : 0;

        $galleryItem->update($data);

        if ($request->hasFile('gallery_image')) {
            $galleryItem
                ->addMediaFromRequest('gallery_image')
                ->toMediaCollection('gallery_image');
        }

        return redirect()
            ->route('admin.gallery-items.index')
            ->with('message', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        abort_if(Gate::denies('gallery_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryItem->delete();

        return back()->with('message', 'Gallery item deleted successfully.');
    }

    public function massDestroy(MassDestroyGalleryItemRequest $request)
    {
        GalleryItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}