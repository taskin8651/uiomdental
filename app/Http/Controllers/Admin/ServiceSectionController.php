<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceSectionRequest;
use App\Http\Requests\StoreServiceSectionRequest;
use App\Http\Requests\UpdateServiceSectionRequest;
use App\Models\ServiceSection;
use App\Models\ServiceSectionItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSections = ServiceSection::with('media', 'items')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.serviceSections.index', compact('serviceSections'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceSections.create');
    }

    public function store(StoreServiceSectionRequest $request)
    {
        $data = $request->except(['image', 'items']);
        $data['status'] = $request->has('status') ? 1 : 0;

        $serviceSection = ServiceSection::create($data);

        if ($request->hasFile('image')) {
            $serviceSection
                ->addMediaFromRequest('image')
                ->toMediaCollection('service_section_image');
        }

        $this->syncItems($serviceSection, $request->items ?? []);

        return redirect()
            ->route('admin.service-sections.index')
            ->with('message', 'Service section created successfully.');
    }

    public function show(ServiceSection $serviceSection)
    {
        abort_if(Gate::denies('service_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSection->load('items', 'media');

        return view('admin.serviceSections.show', compact('serviceSection'));
    }

    public function edit(ServiceSection $serviceSection)
    {
        abort_if(Gate::denies('service_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSection->load('items', 'media');

        return view('admin.serviceSections.edit', compact('serviceSection'));
    }

    public function update(UpdateServiceSectionRequest $request, ServiceSection $serviceSection)
    {
        $data = $request->except(['image', 'items']);
        $data['status'] = $request->has('status') ? 1 : 0;

        $serviceSection->update($data);

        if ($request->hasFile('image')) {
            $serviceSection
                ->addMediaFromRequest('image')
                ->toMediaCollection('service_section_image');
        }

        $serviceSection->items()->delete();
        $this->syncItems($serviceSection, $request->items ?? []);

        return redirect()
            ->route('admin.service-sections.index')
            ->with('message', 'Service section updated successfully.');
    }

    public function destroy(ServiceSection $serviceSection)
    {
        abort_if(Gate::denies('service_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSection->delete();

        return back()->with('message', 'Service section deleted successfully.');
    }

    public function massDestroy(MassDestroyServiceSectionRequest $request)
    {
        ServiceSection::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function syncItems(ServiceSection $serviceSection, array $items)
    {
        foreach ($items as $item) {
            if (empty($item['title']) && empty($item['description'])) {
                continue;
            }

            ServiceSectionItem::create([
                'service_section_id' => $serviceSection->id,
                'icon' => $item['icon'] ?? null,
                'title' => $item['title'] ?? null,
                'description' => $item['description'] ?? null,
                'sort_order' => $item['sort_order'] ?? 0,
                'status' => isset($item['status']) ? 1 : 0,
            ]);
        }
    }
}