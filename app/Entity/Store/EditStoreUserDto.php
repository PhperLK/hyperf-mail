<?php


namespace App\Entity\Store;


use App\Entity\BaseEntity;
use App\Utils\SessionUtil;

/**
 * Class EditStoreUserDto
 * @package App\Entity\Store
 * @property int $id
 * @property string $userName 用户名
 * @property string $password 登录密码
 * @property string $passwordSalt
 * @property string $realName 姓名
 * @property int $isSuper 是否为超级管理员
 * @property int $sort 排序(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property int $changeAuthAt 过期时间
 */
class EditStoreUserDto extends BaseEntity
{
    public function __construct($data = [])
    {
        $data['storeId'] = SessionUtil::getStoreId();

        parent::__construct($data);
    }
}