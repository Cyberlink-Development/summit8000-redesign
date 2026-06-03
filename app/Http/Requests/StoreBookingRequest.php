<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'trip_slug'         => ['required', 'string'],

            'full_name'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
            'phone'             => ['required', 'string', 'max:50'],

            'travelers'         => ['required', 'integer', 'min:1'],

            'extra_requirements'=> ['nullable', 'string'],
            'payment_option'    => ['nullable', 'string'],

            'trip_date'         => ['nullable', 'date'],

            'terms'             => ['required', 'accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'terms.accepted'    => 'You must agree to the terms and conditions.',
            'travelers.min'     => 'At least one traveller is required.',
        ];
    }
}