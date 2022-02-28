<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 地址ID
 * @property string $name 收货人姓名
 * @property string $phone 联系电话
 * @property int $provinceId 省份ID
 * @property int $cityId 城市ID
 * @property int $regionId 区/县ID
 * @property string $detail 详细地址
 * @property int $orderId 订单ID
 * @property int $userId 用户ID
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class OrderAddress extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_address';
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
    protected $casts = ['id' => 'integer', 'province_id' => 'integer', 'city_id' => 'integer', 'region_id' => 'integer', 'order_id' => 'integer', 'user_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}