<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:50',
            'last_name' => 'required|min:5|max:100',
            'email' => 'required|min:5|max:150',
            'description' => 'nullable|min:5|max:500',
            'selfie' => 'nullable',
        ];
    }
}
