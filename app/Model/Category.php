<?php

declare (strict_types=1);
namespace App\Model;

use Carbon\Carbon;
use Hyperf\Database\Model\Relations\BelongsToMany;

/**
 * @property int $id 商品分类ID
 * @property string $name 分类名称
 * @property int $parentId 上级分类ID
 * @property int $imageId 分类图片ID
 * @property int $status 状态(1显示 0隐藏)
 * @property int $sort 排序方式(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property Carbon $createdAt 创建时间
 * @property Carbon $updatedAt
 * @property string $deletedAt 
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';
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
    protected $casts = ['id' => 'integer', 'parent_id' => 'integer', 'image_id' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function goods(): BelongsToMany
    {
        return $this->belongsToMany(Goods::class, 'goods_category_rel', 'category_id', 'goods_id');
    }
}