<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 地址ID
 * @property int $type 地址类型(10发货地址 20退货地址)
 * @property string $name 联系人姓名
 * @property string $phone 联系电话
 * @property int $provinceId 省份ID
 * @property int $cityId 城市ID
 * @property int $regionId 区/县ID
 * @property string $detail 详细地址
 * @property int $sort 排序(数字越小越靠前)
 * @property int $isDelete 是否删除
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class StoreAddress extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_address';
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
    protected $casts = ['id' => 'integer', 'type' => 'integer', 'province_id' => 'integer', 'city_id' => 'integer', 'region_id' => 'integer', 'sort' => 'integer', 'is_delete' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}