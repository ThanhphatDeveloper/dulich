<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'tieude'=>['required'],
            'noidung'=>['required'],
            'image' => ['mimes:jpg,png,bmp,gif'],
        ];
    }

    public function messages()
    {
        return [
            'tieude.required' => 'Tiêu đề không được bỏ trống',
            'noidung.required' => 'Nội dung không được bỏ trống',
            'image.mimes' => 'Định dạng ảnh không hợp lệ (định dạng hợp lệ: jpg, png, bmp, gif)',
        ];
    }
}
