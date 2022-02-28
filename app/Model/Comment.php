<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 评价ID
 * @property int $score 评分 (10好评 20中评 30差评)
 * @property string $content 评价内容
 * @property int $isPicture 是否为图片评价
 * @property int $status 状态(0隐藏 1显示)
 * @property int $sort 评价排序
 * @property int $userId 用户ID
 * @property int $orderId 订单ID
 * @property int $goodsId 商品ID
 * @property int $orderGoodsId 订单商品ID
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment';
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
    protected $casts = ['id' => 'integer', 'score' => 'integer', 'is_picture' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'user_id' => 'integer', 'order_id' => 'integer', 'goods_id' => 'integer', 'order_goods_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}