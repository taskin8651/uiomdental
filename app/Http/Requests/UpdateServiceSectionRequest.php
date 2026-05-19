<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateServiceSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('service_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tag' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'button_1_text' => ['nullable', 'string', 'max:255'],
            'button_1_url' => ['nullable', 'string', 'max:255'],
            'button_1_icon' => ['nullable', 'string', 'max:255'],

            'button_2_text' => ['nullable', 'string', 'max:255'],
            'button_2_url' => ['nullable', 'string', 'max:255'],
            'button_2_icon' => ['nullable', 'string', 'max:255'],

            'float_icon' => ['nullable', 'string', 'max:255'],
            'float_title' => ['nullable', 'string', 'max:255'],
            'float_subtitle' => ['nullable', 'string', 'max:255'],

            'image_alt' => ['nullable', 'string', 'max:255'],
            'layout_type' => ['required', 'in:image_left,image_right'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],

            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'items' => ['nullable', 'array'],
            'items.*.icon' => ['nullable', 'string', 'max:255'],
            'items.*.title' => ['nullable', 'string', 'max:255'],
            'items.*.description' => ['nullable', 'string'],
            'items.*.sort_order' => ['nullable', 'integer'],
            'items.*.status' => ['nullable', 'boolean'],
        ];
    }
}