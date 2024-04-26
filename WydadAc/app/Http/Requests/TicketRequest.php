<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'nTickets' => 'required|integer|min:10',
            'price' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nTickets.required' => 'You need to add a Tickets Number.',
            'nTickets.integer' => 'Tickets Number must be an integer.',
            'nTickets.min' => 'Tickets Number must be at least 10.',
            'price.required' => 'You need to add a Price.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be at least 1.',
        ];
    }   
}
