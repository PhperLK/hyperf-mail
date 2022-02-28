<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 用户自增ID
 * @property int $inviterId 邀请人Id
 * @property string $mobile 用户手机号
 * @property string $nickName 用户昵称
 * @property int $avatarId 头像文件ID
 * @property int $gender 性别
 * @property string $country 国家
 * @property string $province 省份
 * @property string $city 城市
 * @property int $addressId 默认收货地址
 * @property string $balance 用户可用余额
 * @property int $points 用户可用积分
 * @property string $payMoney 用户总支付的金额
 * @property string $expendMoney 实际消费的金额(不含退款)
 * @property int $gradeId 会员等级ID
 * @property string $platform 注册来源的平台 (APP、H5、小程序等)
 * @property int $lastLoginTime 最后登录时间
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'inviter_id' => 'integer', 'avatar_id' => 'integer', 'gender' => 'integer', 'address_id' => 'integer', 'points' => 'integer', 'grade_id' => 'integer', 'last_login_time' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}