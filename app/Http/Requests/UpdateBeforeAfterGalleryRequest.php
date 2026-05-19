<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBeforeAfterGalleryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('before_after_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'before_label' => ['nullable', 'string', 'max:255'],
            'before_alt' => ['nullable', 'string', 'max:255'],
            'after_label' => ['nullable', 'string', 'max:255'],
            'after_alt' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],

            'before_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'after_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }
}