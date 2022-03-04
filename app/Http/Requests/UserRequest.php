<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|unique:users|max:255|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:16',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Tên đã được sử dụng. Vui lòng chọn tên khác.',
            'name.min' => 'Tên có độ dài từ 6 tới 255 ký tự',
            'name.max' => 'Tên có độ dài từ 6 tới 255 ký tự',
            'email.required' => 'Vui lòng nhập email.',
            'email.unique' => 'Email đã được sử dụng. Vui lòng chọn tên khác.',
            'email.email' => 'Email sai định dạng. Vui lòng nhập lại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Tên có độ dài từ 6 tới 16 ký tự',
            'password.max' => 'Tên có độ dài từ 6 tới 16 ký tự',
        ];
    }
}
