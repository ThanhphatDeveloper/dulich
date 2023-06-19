<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNhaCungCapRequest extends FormRequest
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
            'nhacungcap'=>['required', 'unique:nha_cung_caps'],
        ];
    }

    public function messages()
    {
        return [
            'nhacungcap.required' => 'Nhà cung cấp không được bỏ trống',
            'nhacungcap.unique' => 'Nhà cung cấp đã tồn tại',
        ];
    }
}
