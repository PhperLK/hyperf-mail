<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $couponId 优惠券ID
 * @property string $name 优惠券名称
 * @property int $couponType 优惠券类型(10满减券 20折扣券)
 * @property string $reducePrice 满减券-减免金额
 * @property int $discount 折扣券-折扣率(0-100)
 * @property string $minPrice 最低消费金额
 * @property int $expireType 到期类型(10领取后生效 20固定时间)
 * @property int $expireDay 领取后生效-有效天数
 * @property int $startTime 有效期开始时间
 * @property int $endTime 有效期结束时间
 * @property int $applyRange 适用范围(10全部商品 20指定商品)
 * @property string $applyRangeConfig 适用范围配置(json格式)
 * @property int $isExpire 是否过期(0未过期 1已过期)
 * @property int $isUse 是否已使用(0未使用 1已使用)
 * @property int $userId 用户ID
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class UserCoupon extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_coupon';
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
    protected $casts = ['id' => 'integer', 'coupon_id' => 'integer', 'coupon_type' => 'integer', 'discount' => 'integer', 'expire_type' => 'integer', 'expire_day' => 'integer', 'start_time' => 'integer', 'end_time' => 'integer', 'apply_range' => 'integer', 'is_expire' => 'integer', 'is_use' => 'integer', 'user_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}