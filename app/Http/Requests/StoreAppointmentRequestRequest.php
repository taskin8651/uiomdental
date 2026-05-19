<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string', 'max:30'],
            'email'      => ['nullable', 'email', 'max:255'],
            'age'        => ['nullable', 'integer', 'min:1', 'max:120'],
            'service'    => ['required', 'string', 'max:255'],
            'date'       => ['required', 'date'],
            'time'       => ['required', 'string', 'max:255'],
            'visit_type' => ['nullable', 'string', 'max:255'],
            'message'    => ['nullable', 'string'],
        ];
    }
}
