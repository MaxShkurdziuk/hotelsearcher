<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:255'],
            'stars' => ['required', 'min:1', 'max:1'],
            'country' => ['required', 'min:1', 'max:255'],
            'city' => ['required', 'min:1', 'max:255'],
            'open_year' => ['required', 'min:4', 'max:4'],
            'description' => ['required', 'min:100'],
            'services' => ['required', 'array', 'min:1'],
            'services.*' => ['required', 'exists:services,id'],
        ];
    }
}
