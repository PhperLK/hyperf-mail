<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 分组ID
 * @property string $name 分组名称
 * @property int $parentId 上级分组ID
 * @property int $sort 排序(数字越小越靠前)
 * @property int $isDelete 是否删除
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class UploadGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'upload_group';
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
    protected $casts = ['id' => 'integer', 'parent_id' => 'integer', 'sort' => 'integer', 'is_delete' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}