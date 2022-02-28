<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property string $title 帮助标题
 * @property string $content 帮助内容
 * @property int $sort 排序(数字越小越靠前)
 * @property int $isDelete 是否删除(1已删除)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Help extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'help';
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
    protected $casts = ['id' => 'integer', 'sort' => 'integer', 'is_delete' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}