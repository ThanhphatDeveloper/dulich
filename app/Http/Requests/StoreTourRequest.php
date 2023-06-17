<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
            'tentour'=>['required', 'unique:tours'],

            'ngay'=>['required'],
            'dem'=>['required'],
            // 'dem'=>['required', 'before:ngay', 'min:0'],

            'gia'=>['required'],
            'mota'=>['required'],
            'nkh'=>['required', 'after:tomorrow'],
            'image'=>['required', 'mimes:jpg,png,bmp,gif'],
        ];
    }

    //Sửa câu thông báo
    public function messages()
    {
        return [
            'tentour.required' => 'Tên tour không được bỏ trống',
            'tentour.unique' => 'Tên tour đã tồn tại',
            'ngay.required' => 'Số ngày không được bỏ trống',
            'ngay.min' => 'Số ngày không hợp lệ',
            'dem.required' => 'Số đêm không được bỏ trống',
            'dem.min' => 'Số đêm không hợp lệ',

            // 'dem.before' => 'Số đêm phải bé hơn số ngày',

            'gia.required' => 'Giá tour không được bỏ trống',
            'mota.required' => 'Mô tả tour không được bỏ trống',
            'nkh.required' => 'Ngày khởi hành tour không được bỏ trống',
            'nkh.after' => 'Ngày khởi hành không hợp lệ',
            'image.required' => 'Ảnh tour không được bỏ trống',
            'image.mimes' => 'Định dạng ảnh không hợp lệ (định dạng hợp lệ: jpg, png, bmp, gif)'
        ];
    }
}
