<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'=> ['required', 'string'],
            'number' => ['required', 'string'],
            'departure' => ['required', 'string'],
            'arrival' => ['required', 'string'],
            'seat' => ['nullable', 'string'],
            'gate' => ['nullable', 'string'],
            'baggage_drop' => ['nullable', 'string'],
            'trips_id' => ['required', 'integer','exists:trips,id']
        ];
    }
}
