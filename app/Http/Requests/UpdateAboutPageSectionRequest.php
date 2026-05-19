<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAboutPageSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('about_page_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'intro_tag' => ['nullable', 'string', 'max:255'],
            'intro_title' => ['nullable', 'string', 'max:255'],
            'intro_description_1' => ['nullable', 'string'],
            'intro_description_2' => ['nullable', 'string'],

            'intro_button_text' => ['nullable', 'string', 'max:255'],
            'intro_button_url' => ['nullable', 'string', 'max:255'],

            'experience_number' => ['nullable', 'string', 'max:255'],
            'experience_text' => ['nullable', 'string', 'max:255'],

            'feature_1_icon' => ['nullable', 'string', 'max:255'],
            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_2_icon' => ['nullable', 'string', 'max:255'],
            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_3_icon' => ['nullable', 'string', 'max:255'],
            'feature_3_title' => ['nullable', 'string', 'max:255'],
            'feature_4_icon' => ['nullable', 'string', 'max:255'],
            'feature_4_title' => ['nullable', 'string', 'max:255'],

            'mission_icon' => ['nullable', 'string', 'max:255'],
            'mission_title' => ['nullable', 'string', 'max:255'],
            'mission_description' => ['nullable', 'string'],

            'vision_icon' => ['nullable', 'string', 'max:255'],
            'vision_title' => ['nullable', 'string', 'max:255'],
            'vision_description' => ['nullable', 'string'],

            'approach_icon' => ['nullable', 'string', 'max:255'],
            'approach_title' => ['nullable', 'string', 'max:255'],
            'approach_description' => ['nullable', 'string'],

            'about_intro_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }
}