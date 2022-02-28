<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $startTime 下单时间(开始)
 * @property int $endTime 下单时间(结束)
 * @property string $filePath excel文件路径
 * @property int $status 导出状态(10进行中 20已完成 30失败)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class OrderExport extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_export';
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
    protected $casts = ['id' => 'integer', 'start_time' => 'integer', 'end_time' => 'integer', 'status' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}