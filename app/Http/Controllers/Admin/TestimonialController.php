<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTestimonialRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonials = Testimonial::orderBy('sort_order', 'asc')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        abort_if(Gate::denies('testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonials.create');
    }

    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->all();

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['status']      = $request->has('status') ? 1 : 0;

        if (empty($data['avatar_letter']) && !empty($data['customer_name'])) {
            $data['avatar_letter'] = strtoupper(substr($data['customer_name'], 0, 1));
        }

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('message', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->all();

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['status']      = $request->has('status') ? 1 : 0;

        if (empty($data['avatar_letter']) && !empty($data['customer_name'])) {
            $data['avatar_letter'] = strtoupper(substr($data['customer_name'], 0, 1));
        }

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('message', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonial->delete();

        return back()->with('message', 'Testimonial deleted successfully.');
    }

    public function massDestroy(MassDestroyTestimonialRequest $request)
    {
        Testimonial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}