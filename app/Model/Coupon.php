<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 优惠券ID
 * @property string $name 优惠券名称
 * @property int $couponType 优惠券类型(10满减券 20折扣券)
 * @property string $reducePrice 满减券-减免金额
 * @property int $discount 折扣券-折扣率(0-100)
 * @property string $minPrice 最低消费金额
 * @property int $expireType 到期类型(10领取后生效 20固定时间)
 * @property int $expireDay 领取后生效-有效天数
 * @property int $startTime 固定时间-开始时间
 * @property int $endTime 固定时间-结束时间
 * @property int $applyRange 适用范围(10全部商品 20指定商品 30排除商品)
 * @property string $applyRangeConfig 适用范围配置(json格式)
 * @property int $totalNum 发放总数量(-1为不限制)
 * @property int $receiveNum 已领取数量
 * @property string $describe 优惠券描述
 * @property int $status 状态(1显示 0隐藏)
 * @property int $sort 排序方式(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Coupon extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupon';
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
    protected $casts = ['id' => 'integer', 'coupon_type' => 'integer', 'discount' => 'integer', 'expire_type' => 'integer', 'expire_day' => 'integer', 'start_time' => 'integer', 'end_time' => 'integer', 'apply_range' => 'integer', 'total_num' => 'integer', 'receive_num' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}