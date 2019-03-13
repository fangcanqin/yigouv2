<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class admin_usersStoreBlogPost extends FormRequest
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
            'name' => 'required|unique:admin_users|regex:/^[a-zA-Z]{1}[\w]{5,10}$/',
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
            'name.required' => '管理员名称不能为空',
            'name.unique' => '管理员名称已存在',
            'name.regex' => '管理员名称:以首字母开头(6-11)位',
            'password.required'  => '密码不能为空',
            'password.regex'  => '密码:遵循任意6-8位',
            'repassword.required'  => '确认密码不能为空',
            'repassword.same'  => '密码不一致',
        ];
    }
}
