<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 商品服务ID
 * @property string $name 服务名称
 * @property string $summary 概述
 * @property int $isDefault 是否默认(新增商品时)
 * @property int $status 状态(1显示 0隐藏)
 * @property int $sort 排序方式(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class GoodsService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods_service';
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
    protected $casts = ['id' => 'integer', 'is_default' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}