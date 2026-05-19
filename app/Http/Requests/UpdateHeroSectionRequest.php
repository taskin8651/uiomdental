<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHeroSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hero_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'badge_icon' => ['nullable', 'string', 'max:255'],
            'badge_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'highlight_title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'stat_1_number' => ['nullable', 'string', 'max:255'],
            'stat_1_text' => ['nullable', 'string', 'max:255'],
            'stat_2_number' => ['nullable', 'string', 'max:255'],
            'stat_2_text' => ['nullable', 'string', 'max:255'],
            'stat_3_number' => ['nullable', 'string', 'max:255'],
            'stat_3_text' => ['nullable', 'string', 'max:255'],
            'top_card_icon' => ['nullable', 'string', 'max:255'],
            'top_card_title' => ['nullable', 'string', 'max:255'],
            'top_card_text' => ['nullable', 'string', 'max:255'],
            'bottom_card_icon' => ['nullable', 'string', 'max:255'],
            'bottom_card_title' => ['nullable', 'string', 'max:255'],
            'bottom_card_text' => ['nullable', 'string', 'max:255'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }
}
