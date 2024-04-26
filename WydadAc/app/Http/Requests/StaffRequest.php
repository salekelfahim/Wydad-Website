<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'birthday' => 'required|date',
            'nationality' => 'required|string',
            'mission' => 'required|string',
            'picture' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please provide the first name.',
            'firstname.string' => 'First name must be a string.',
            'lastname.required' => 'Please provide the last name.',
            'lastname.string' => 'Last name must be a string.',
            'birthday.required' => 'Please provide the birthday.',
            'birthday.date' => 'Birthday must be a valid date.',
            'nationality.required' => 'Please provide the nationality.',
            'nationality.string' => 'Nationality must be a string.',
            'mission.required' => 'Please provide the staff mission.',
            'mission.string' => 'Mission must be a string.',
            'picture.image' => 'Uploaded file must be an image.',
            'picture.required' => 'You need to Upload an image.',
        ];
    }
}
