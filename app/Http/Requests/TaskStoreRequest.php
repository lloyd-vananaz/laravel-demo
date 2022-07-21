<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:256',
            'description' => 'nullable|string|max:256',
            'is_completed' => 'nullable|boolean',
        ];
    }

    /**
     * Custom message for validation
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'title' => 'Title is required!'
        ];
    }
}
