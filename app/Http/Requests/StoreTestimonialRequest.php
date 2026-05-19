<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTestimonialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'customer_name'  => ['nullable', 'string', 'max:255'],
            'customer_type'  => ['nullable', 'string', 'max:255'],
            'avatar_letter'  => ['nullable', 'string', 'max:5'],
            'rating'         => ['nullable', 'integer', 'min:1', 'max:5'],
            'review_text'    => ['nullable', 'string'],
            'is_featured'    => ['nullable', 'boolean'],
            'sort_order'     => ['nullable', 'integer'],
            'status'         => ['nullable', 'boolean'],
        ];
    }
}