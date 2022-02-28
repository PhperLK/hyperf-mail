<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $orderRefundId 售后单ID
 * @property string $name 收货人姓名
 * @property string $phone 联系电话
 * @property int $provinceId 所在省份ID
 * @property int $cityId 所在城市ID
 * @property int $regionId 所在区/县ID
 * @property string $detail 详细地址
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class OrderRefundAddress extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_refund_address';
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
    protected $casts = ['id' => 'integer', 'order_refund_id' => 'integer', 'province_id' => 'integer', 'city_id' => 'integer', 'region_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}