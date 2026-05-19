<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFaqRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('faq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'question'   => ['nullable', 'string', 'max:255'],
            'answer'     => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_open'    => ['nullable', 'boolean'],
            'status'     => ['nullable', 'boolean'],
        ];
    }
}