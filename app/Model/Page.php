<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 页面ID
 * @property int $pageType 页面类型(10首页 20自定义页)
 * @property string $pageName 页面名称
 * @property string $pageData 页面数据
 * @property int $storeId 商城ID
 * @property int $isDelete 软删除
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page';
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
    protected $casts = ['id' => 'integer', 'page_type' => 'integer', 'store_id' => 'integer', 'is_delete' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}