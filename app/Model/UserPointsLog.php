<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $userId 用户ID
 * @property int $value 变动数量
 * @property string $describe 描述/说明
 * @property string $remark 管理员备注
 * @property int $storeId 小程序商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class UserPointsLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_points_log';
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
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'value' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}