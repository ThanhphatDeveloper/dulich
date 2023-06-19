<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoaiTourRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'loaitour'=>['required', 'unique:loai_tours'],
        ];
    }

    public function messages()
    {
        return [
            'loaitour.required' => 'Lọa tour không được bỏ trống',
            'loaitour.unique' => 'Loại tour đã tồn tại',
        ];
    }
}
