<?php

declare (strict_types=1);
namespace App\Model;

use Carbon\Carbon;
use Hyperf\Database\Model\Relations\BelongsToMany;

/**
 * @property int $id 主键ID
 * @property string $userName 用户名
 * @property string $password 登录密码
 * @property string $passwordSalt 
 * @property string $realName 姓名
 * @property int $isSuper 是否为超级管理员
 * @property int $sort 排序(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property int $changeAuthAt 过期时间
 * @property Carbon $createdAt 创建时间
 * @property Carbon $updatedAt
 * @property string $deletedAt 
 */
class StoreUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $hidden = ['password', 'password_salt', 'store_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'is_super' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function role(): BelongsToMany
    {
        return $this->belongsToMany(StoreRole::class, 'store_user_role', 'store_user_id', 'role_id');
    }
}