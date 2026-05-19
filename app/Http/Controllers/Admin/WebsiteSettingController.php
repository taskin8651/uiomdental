<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateWebsiteSettingRequest;
use App\Models\WebsiteSetting;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = WebsiteSetting::with('media')->first();

        if (! $websiteSetting) {
            $websiteSetting = WebsiteSetting::create($this->defaultData());
        }

        return view('admin.websiteSettings.index', compact('websiteSetting'));
    }

    public function update(UpdateWebsiteSettingRequest $request)
    {
        $websiteSetting = WebsiteSetting::first();

        if (! $websiteSetting) {
            $websiteSetting = WebsiteSetting::create($this->defaultData());
        }

        $websiteSetting->update($request->except('site_logo', 'site_favicon', 'og_image'));

        foreach (['site_logo', 'site_favicon', 'og_image'] as $collection) {
            if ($request->hasFile($collection)) {
                $websiteSetting
                    ->addMediaFromRequest($collection)
                    ->toMediaCollection($collection);
            }
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('message', 'Website settings updated successfully.');
    }

    private function defaultData()
    {
        return [
            'site_name'        => 'OM Dental Clinic',
            'site_tagline'     => 'Best Dental Care & Appointment Booking',
            'meta_title'       => 'OM Dental Clinic | Best Dental Care & Appointment Booking',
            'meta_description' => 'OM Dental Clinic provides professional dental care, root canal, teeth cleaning, implants, braces, smile designing and emergency dental services.',
            'meta_keywords'    => 'dental clinic, dentist, root canal, teeth cleaning, dental implants, braces',
            'og_title'         => 'OM Dental Clinic',
            'og_description'   => 'Professional dental care and online appointment booking.',
            'contact_email'    => 'info@omdentalclinic.com',
            'contact_number'   => '+91 99999 99999',
            'whatsapp_number'  => '919999999999',
        ];
    }
}
