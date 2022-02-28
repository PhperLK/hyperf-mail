<?php

declare (strict_types=1);
namespace App\Model;

use Carbon\Carbon;

/**
 * @property int $id 主键ID
 * @property string $userName 用户名
 * @property string $password 登录密码
 * @property Carbon $createdAt 创建时间
 * @property Carbon $updatedAt
 * @property string $deletedAt 
 */
class AdminUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_user';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}