<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $menuId 菜单ID
 * @property int $apiId 用户角色ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class StoreMenuApi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_menu_api';
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
    protected $casts = ['id' => 'integer', 'menu_id' => 'integer', 'api_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}