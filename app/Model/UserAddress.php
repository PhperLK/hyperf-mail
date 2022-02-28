<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property string $name 收货人姓名
 * @property string $phone 联系电话
 * @property int $provinceId 省份ID
 * @property int $cityId 城市ID
 * @property int $regionId 区/县ID
 * @property string $detail 详细地址
 * @property int $userId 用户ID
 * @property int $isDelete 是否删除
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class UserAddress extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_address';
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
    protected $casts = ['id' => 'integer', 'province_id' => 'integer', 'city_id' => 'integer', 'region_id' => 'integer', 'user_id' => 'integer', 'is_delete' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}