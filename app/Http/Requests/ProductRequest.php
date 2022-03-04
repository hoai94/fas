<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|unique:product|min:6|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
            'description' => 'required|min:255',
            'content' => 'required|min:255',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Tên đã được sử dụng. Vui lòng chọn tên khác.',
            'name.min' => 'Tên có độ dài từ 6 tới 255 ký tự',
            'name.max' => 'Tên có độ dài từ 6 tới 255 ký tự',
            'image.required' => 'Vui lòng chọn một hình ảnh.',
            'image.mimes' => 'Định dạng hình ảnh không đúng',
            'image.max' => 'Hình ảnh có dung lượng lớn hơn 2Mb. Vui lòng chọn hình ảnh khác.',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm.',
            'description.min' => 'Mô tả có độ dài từ 255 ký tự',
            'content.required' => 'Vui lòng thêm chi tiết sản phẩm.',
            'content.min' => 'Chi tiết sản phẩm có quá ngắn.',
            'status.required' => 'Vui lòng nhập trạng thái sản phẩm',
        ];
    }
}
