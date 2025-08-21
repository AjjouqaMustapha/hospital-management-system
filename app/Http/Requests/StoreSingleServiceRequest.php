<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSingleServiceRequest extends FormRequest
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
            'name' => ['required','unique:service_translations,name,'.$this->id.',service_id'],
            'price' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('dashboard/validation.required'),
            'name.unique' => trans('dashboard/validation.unique'),
            'price.required' => trans('dashboard/validation.required'),
            'price.numeric' => trans('dashboard/validation.numeric'),
        ];
    }
}
