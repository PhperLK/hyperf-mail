<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 模板ID
 * @property string $name 模板名称
 * @property int $method 计费方式(10按件数 20按重量)
 * @property int $sort 排序方式(数字越小越靠前)
 * @property int $storeId 小程序d
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Delivery extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery';
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
    protected $casts = ['id' => 'integer', 'method' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}