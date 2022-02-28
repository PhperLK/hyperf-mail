<?php

declare (strict_types=1);
namespace App\Model;

use Carbon\Carbon;

/**
 * @property int $id 菜单ID
 * @property int $module 模块类型(10菜单 20操作)
 * @property string $name 菜单名称
 * @property string $path 菜单路径(唯一)
 * @property string $actionMark 操作标识
 * @property int $parentId 上级菜单ID
 * @property int $sort 排序(数字越小越靠前)
 * @property Carbon $createdAt 创建时间
 * @property Carbon $updatedAt
 */
class StoreMenu extends Model
{
    protected bool $searchStore = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_menu';
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
    protected $casts = ['id' => 'integer', 'module' => 'integer', 'parent_id' => 'integer', 'sort' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}