<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 规格组ID
 * @property string $specName 规格组名称
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Spec extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'spec';
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
    protected $casts = ['id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}