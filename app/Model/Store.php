<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 商城ID
 * @property string $storeName 商城名称
 * @property string $describe 商城简介
 * @property int $logoImageId 商城logo文件ID
 * @property int $sort 排序(数字越小越靠前)
 * @property int $isRecycle 是否回收
 * @property int $isDelete 是否删除
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Store extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store';
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
    protected $casts = ['id' => 'integer', 'logo_image_id' => 'integer', 'sort' => 'integer', 'is_recycle' => 'integer', 'is_delete' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}