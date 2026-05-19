<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFaqRequest;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('faq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faqs = Faq::orderBy('sort_order', 'asc')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        abort_if(Gate::denies('faq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.faqs.create');
    }

    public function store(StoreFaqRequest $request)
    {
        $data = $request->all();

        $data['is_open'] = $request->has('is_open') ? 1 : 0;
        $data['status']  = $request->has('status') ? 1 : 0;

        Faq::create($data);

        return redirect()
            ->route('admin.faqs.index')
            ->with('message', 'FAQ created successfully.');
    }

    public function show(Faq $faq)
    {
        abort_if(Gate::denies('faq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        abort_if(Gate::denies('faq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $data = $request->all();

        $data['is_open'] = $request->has('is_open') ? 1 : 0;
        $data['status']  = $request->has('status') ? 1 : 0;

        $faq->update($data);

        return redirect()
            ->route('admin.faqs.index')
            ->with('message', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        abort_if(Gate::denies('faq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faq->delete();

        return back()->with('message', 'FAQ deleted successfully.');
    }

    public function massDestroy(MassDestroyFaqRequest $request)
    {
        Faq::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}