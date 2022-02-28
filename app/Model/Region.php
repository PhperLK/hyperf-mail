<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 区划信息ID
 * @property string $name 区划名称
 * @property int $pid 父级ID
 * @property string $code 区划编码
 * @property int $level 层级(1省级 2市级 3区/县级)
 */
class Region extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'region';
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
    protected $casts = ['id' => 'integer', 'pid' => 'integer', 'level' => 'integer'];
}