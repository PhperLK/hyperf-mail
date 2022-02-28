<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 记录ID
 * @property string $goodsSkuId 商品sku唯一标识 (由规格id组成)
 * @property int $goodsId 商品ID
 * @property int $imageId 规格图片ID
 * @property string $goodsSkuNo 商品sku编码
 * @property string $goodsPrice 商品价格
 * @property string $linePrice 商品划线价
 * @property int $stockNum 当前库存数量
 * @property string $goodsWeight 商品重量(Kg)
 * @property string $goodsProps SKU的规格属性(json格式)
 * @property string $specValueIds 规格值ID集(json格式)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class GoodsSku extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods_sku';
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
    protected $casts = ['id' => 'integer', 'goods_id' => 'integer', 'image_id' => 'integer', 'stock_num' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}