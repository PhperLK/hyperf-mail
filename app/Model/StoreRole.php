<?php

declare (strict_types=1);
namespace App\Model;

use Carbon\Carbon;
use Hyperf\Database\Model\Relations\BelongsToMany;

/**
 * @property int $id 角色ID
 * @property string $roleName 角色名称
 * @property int $parentId 父级角色ID
 * @property int $sort 排序(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property Carbon $createdAt 创建时间
 * @property Carbon $updatedAt
 * @property string $deletedAt 
 */
class StoreRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_role';
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
    protected $casts = ['id' => 'integer', 'parent_id' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function storeUser(): BelongsToMany
    {
        return $this->belongsToMany(StoreUser::class, 'store_user_role', 'role_id', 'store_user_id');
    }

    public function storeMenu(): BelongsToMany
    {
        return $this->belongsToMany(StoreMenu::class, 'store_role_menu', 'role_id', 'menu_id');
    }
}