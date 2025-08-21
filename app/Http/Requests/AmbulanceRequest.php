<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmbulanceRequest extends FormRequest
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
            'car_number' => 'required',
            'car_model' => 'required',
            'car_year_manufactured' => 'required|numeric',
            'ambulance_type' => "required|in:owned,rinted",
            'driver_name' => 'required|string',
            'driver_license_number' => 'required|string',
            'driver_phone' => 'required|numeric',
            'description' => 'nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'car_number.required' => trans('validation.required'),
            'car_model.required' => trans('validation.required'),
            'car_year_manufactured.required' => trans('validation.required'),
            'car_year_manufactured.numeric' => trans('validation.numeric'),
            'car_type.required' => trans('validation.required'),
            'driver_name.required' => trans('validation.required'),
            'driver_name.unique' => trans('validation.unique'),
            'driver_license_number.required' => trans('validation.required'),
            'driver_license_number.numeric' => trans('validation.numeric'),
            'driver_phone.required' => trans('validation.required'),
            'driver_phone.numeric' => trans('validation.numeric'),
            
        ];
    }

}
