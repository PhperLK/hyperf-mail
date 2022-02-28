<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 等级ID
 * @property string $name 等级名称
 * @property int $weight 等级权重(1-9999)
 * @property string $upgrade 升级条件
 * @property string $equity 等级权益(折扣率0-100)
 * @property int $status 状态(1启用 0禁用)
 * @property int $isDelete 是否删除
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class UserGrade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_grade';
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
    protected $casts = ['id' => 'integer', 'weight' => 'integer', 'status' => 'integer', 'is_delete' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}