<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'tieude'=>['required', 'unique:blogs'],
            'noidung'=>['required'],
            'image' => ['required', 'mimes:jpg,png,bmp,gif'],
        ];
    }

    public function messages()
    {
        return [
            'tieude.required' => 'Tiêu đề không được bỏ trống',
            'tieude.unique' => 'Tiêu đề đã tồn tại',
            'noidung.required' => 'Nội dung không được bỏ trống',
            'image.required' => 'Ảnh đại diện chưa được chọn',
            'image.mimes' => 'Định dạng ảnh không hợp lệ (định dạng hợp lệ: jpg, png, bmp, gif)',
        ];
    }
}
