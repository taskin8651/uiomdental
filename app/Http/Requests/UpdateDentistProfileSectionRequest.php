<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDentistProfileSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dentist_profile_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'profile_tag' => ['nullable', 'string', 'max:255'],
            'doctor_name' => ['nullable', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'experience_number' => ['nullable', 'string', 'max:255'],
            'experience_text' => ['nullable', 'string', 'max:255'],

            'qualification_icon' => ['nullable', 'string', 'max:255'],
            'qualification_label' => ['nullable', 'string', 'max:255'],
            'qualification_value' => ['nullable', 'string', 'max:255'],

            'specialization_icon' => ['nullable', 'string', 'max:255'],
            'specialization_label' => ['nullable', 'string', 'max:255'],
            'specialization_value' => ['nullable', 'string', 'max:255'],

            'button_1_text' => ['nullable', 'string', 'max:255'],
            'button_1_url' => ['nullable', 'string', 'max:255'],
            'button_1_icon' => ['nullable', 'string', 'max:255'],

            'button_2_text' => ['nullable', 'string', 'max:255'],
            'button_2_url' => ['nullable', 'string', 'max:255'],
            'button_2_icon' => ['nullable', 'string', 'max:255'],

            'availability_tag' => ['nullable', 'string', 'max:255'],
            'availability_title' => ['nullable', 'string', 'max:255'],
            'availability_icon' => ['nullable', 'string', 'max:255'],

            'schedule_1_label' => ['nullable', 'string', 'max:255'],
            'schedule_1_value' => ['nullable', 'string', 'max:255'],
            'schedule_2_label' => ['nullable', 'string', 'max:255'],
            'schedule_2_value' => ['nullable', 'string', 'max:255'],
            'schedule_3_label' => ['nullable', 'string', 'max:255'],
            'schedule_3_value' => ['nullable', 'string', 'max:255'],
            'schedule_4_label' => ['nullable', 'string', 'max:255'],
            'schedule_4_value' => ['nullable', 'string', 'max:255'],

            'availability_note' => ['nullable', 'string'],

            'dentist_profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }
}