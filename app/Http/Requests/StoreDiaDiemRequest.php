<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiaDiemRequest extends FormRequest
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
            'diadiem'=>['required', 'unique:dia_diems'],
        ];
    }

    public function messages()
    {
        return [
            'diadiem.required' => 'Địa điểm không được bỏ trống',
            'diadiem.unique' => 'Địa điểm đã tồn tại',
        ];
    }
}
