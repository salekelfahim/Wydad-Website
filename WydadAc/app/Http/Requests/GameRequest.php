<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'opponent' => 'required|string|max:255',
            'compitition' => 'required',
            'date' => 'required|date|after:now',
            'status' => 'required',
            'stadium' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'opponent.required' => 'The opponent field is required.',
            'opponent.string' => 'The opponent must be a string.',
            'opponent.max' => 'The opponent may not be greater than :max characters.',
            'compitition.required' => 'The compitition field is required.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'status.required' => 'The status field is required.',
            'stadium.required' => 'The stadium field is required.',
            'stadium.string' => 'The stadium must be a string.',
            'stadium.max' => 'The stadium may not be greater than :max characters.',
            'date.after' => 'The date must be in the future.',
        ];
    }
}
