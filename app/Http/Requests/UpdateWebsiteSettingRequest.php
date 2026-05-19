<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateWebsiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('website_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'site_name'        => ['nullable', 'string', 'max:255'],
            'site_tagline'     => ['nullable', 'string', 'max:255'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords'    => ['nullable', 'string'],
            'og_title'         => ['nullable', 'string', 'max:255'],
            'og_description'   => ['nullable', 'string'],
            'contact_email'    => ['nullable', 'email', 'max:255'],
            'contact_number'   => ['nullable', 'string', 'max:30'],
            'whatsapp_number'  => ['nullable', 'string', 'max:30'],
            'clinic_address'   => ['nullable', 'string'],
            'map_embed_url'    => ['nullable', 'string'],
            'map_direction_url' => ['nullable', 'string', 'max:2000'],
            'site_logo'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'site_favicon'     => ['nullable', 'image', 'mimes:ico,png,jpg,jpeg,webp', 'max:1024'],
            'og_image'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
