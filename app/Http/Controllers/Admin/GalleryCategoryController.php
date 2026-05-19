<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGalleryCategoryRequest;
use App\Http\Requests\StoreGalleryCategoryRequest;
use App\Http\Requests\UpdateGalleryCategoryRequest;
use App\Models\GalleryCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gallery_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCategories = GalleryCategory::withCount('items')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.galleryCategories.index', compact('galleryCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCategories.create');
    }

    public function store(StoreGalleryCategoryRequest $request)
    {
        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        GalleryCategory::create($data);

        return redirect()
            ->route('admin.gallery-categories.index')
            ->with('message', 'Gallery category created successfully.');
    }

    public function show(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCategory->load('items');

        return view('admin.galleryCategories.show', compact('galleryCategory'));
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCategories.edit', compact('galleryCategory'));
    }

    public function update(UpdateGalleryCategoryRequest $request, GalleryCategory $galleryCategory)
    {
        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        $galleryCategory->update($data);

        return redirect()
            ->route('admin.gallery-categories.index')
            ->with('message', 'Gallery category updated successfully.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCategory->delete();

        return back()->with('message', 'Gallery category deleted successfully.');
    }

    public function massDestroy(MassDestroyGalleryCategoryRequest $request)
    {
        GalleryCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}