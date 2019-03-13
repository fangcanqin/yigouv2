<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreBlogPost extends FormRequest
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
     * 
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{5,15}$/',
            'password' => 'required|regex:/^[\w]{6,10}$/',
            'repassword' => 'required|same:password',
            'token' => 'required',
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
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'username.regex' => '用户名:以首字母开头(6-16)位',
            'password.required' => '密码不能为空',
            'password.regex' => '密码:遵循任意6-10位',
            'repassword.required' => '确认密码不能为空',
            'repassword.same' => '密码不一致',
            'token.required' => '密令不能为空'
        ];
    }
}
