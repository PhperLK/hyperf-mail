<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 文章ID
 * @property string $title 文章标题
 * @property int $showType 列表显示方式(10小图展示 20大图展示)
 * @property int $categoryId 文章分类ID
 * @property int $imageId 封面图ID
 * @property string $content 文章内容
 * @property int $sort 文章排序(数字越小越靠前)
 * @property int $status 文章状态(0隐藏 1显示)
 * @property int $virtualViews 虚拟阅读量(仅用作展示)
 * @property int $actualViews 实际阅读量
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Article extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article';
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
    protected $casts = ['id' => 'integer', 'show_type' => 'integer', 'category_id' => 'integer', 'image_id' => 'integer', 'sort' => 'integer', 'status' => 'integer', 'virtual_views' => 'integer', 'actual_views' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}