<?php


namespace App\Entity\Store;


use App\Entity\BaseEntity;

/**
 * Class LoginDto
 * @package App\Entity\Login
 * @property string $userName
 * @property string $password
 */
class LoginDto extends BaseEntity
{
    public function rules(): array
    {
        return [
            'userName' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'userName.required' => '请输入账号',
            'password.required' => '请输入密码',
        ];
    }
}
