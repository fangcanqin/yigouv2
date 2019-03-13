<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_users_editStoreBlogPost extends FormRequest
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
            'password' => 'required|regex:/^[\w]{6,8}$/',
            'repassword' => 'required|same:password',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required'  => '密码不能为空',
            'password.regex'  => '密码:遵循任意6-8位',
            'repassword.required'  => '确认密码不能为空',
            'repassword.same'  => '密码不一致',
        ];
    }
}


