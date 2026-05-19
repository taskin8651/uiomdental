<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeforeAfterGalleryRequest;
use App\Http\Requests\StoreBeforeAfterGalleryRequest;
use App\Http\Requests\UpdateBeforeAfterGalleryRequest;
use App\Models\BeforeAfterGallery;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BeforeAfterGalleryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('before_after_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beforeAfterGalleries = BeforeAfterGallery::with('media')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.beforeAfterGalleries.index', compact('beforeAfterGalleries'));
    }

    public function create()
    {
        abort_if(Gate::denies('before_after_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beforeAfterGalleries.create');
    }

    public function store(StoreBeforeAfterGalleryRequest $request)
    {
        $data = $request->except(['before_image', 'after_image']);
        $data['status'] = $request->has('status') ? 1 : 0;

        $beforeAfterGallery = BeforeAfterGallery::create($data);

        if ($request->hasFile('before_image')) {
            $beforeAfterGallery
                ->addMediaFromRequest('before_image')
                ->toMediaCollection('before_image');
        }

        if ($request->hasFile('after_image')) {
            $beforeAfterGallery
                ->addMediaFromRequest('after_image')
                ->toMediaCollection('after_image');
        }

        return redirect()
            ->route('admin.before-after-galleries.index')
            ->with('message', 'Before after gallery created successfully.');
    }

    public function show(BeforeAfterGallery $beforeAfterGallery)
    {
        abort_if(Gate::denies('before_after_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beforeAfterGallery->load('media');

        return view('admin.beforeAfterGalleries.show', compact('beforeAfterGallery'));
    }

    public function edit(BeforeAfterGallery $beforeAfterGallery)
    {
        abort_if(Gate::denies('before_after_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beforeAfterGallery->load('media');

        return view('admin.beforeAfterGalleries.edit', compact('beforeAfterGallery'));
    }

    public function update(UpdateBeforeAfterGalleryRequest $request, BeforeAfterGallery $beforeAfterGallery)
    {
        $data = $request->except(['before_image', 'after_image']);
        $data['status'] = $request->has('status') ? 1 : 0;

        $beforeAfterGallery->update($data);

        if ($request->hasFile('before_image')) {
            $beforeAfterGallery
                ->addMediaFromRequest('before_image')
                ->toMediaCollection('before_image');
        }

        if ($request->hasFile('after_image')) {
            $beforeAfterGallery
                ->addMediaFromRequest('after_image')
                ->toMediaCollection('after_image');
        }

        return redirect()
            ->route('admin.before-after-galleries.index')
            ->with('message', 'Before after gallery updated successfully.');
    }

    public function destroy(BeforeAfterGallery $beforeAfterGallery)
    {
        abort_if(Gate::denies('before_after_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beforeAfterGallery->delete();

        return back()->with('message', 'Before after gallery deleted successfully.');
    }

    public function massDestroy(MassDestroyBeforeAfterGalleryRequest $request)
    {
        BeforeAfterGallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}