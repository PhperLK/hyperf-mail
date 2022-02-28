<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $goodsId 商品ID
 * @property string $goodsName 商品名称
 * @property int $imageId 商品封面图ID
 * @property int $deductStockType 库存计算方式(10下单减库存 20付款减库存)
 * @property int $specType 规格类型(10单规格 20多规格)
 * @property string $goodsSkuId 商品sku唯一标识
 * @property string $goodsProps SKU的规格属性(json格式)
 * @property string $content 商品详情
 * @property string $goodsNo 商品编码
 * @property string $goodsPrice 商品价格(单价)
 * @property string $linePrice 商品划线价
 * @property string $goodsWeight 商品重量(Kg)
 * @property int $isUserGrade 是否存在会员等级折扣
 * @property int $gradeRatio 会员折扣比例(0-10)
 * @property string $gradeGoodsPrice 会员折扣的商品单价
 * @property string $gradeTotalMoney 会员折扣的总额差
 * @property string $couponMoney 优惠券折扣金额
 * @property string $pointsMoney 积分金额
 * @property int $pointsNum 积分抵扣数量
 * @property int $pointsBonus 赠送的积分数量
 * @property int $totalNum 购买数量
 * @property string $totalPrice 商品总价(数量×单价)
 * @property string $totalPayPrice 实际付款价(折扣和优惠后)
 * @property int $isComment 是否已评价(0否 1是)
 * @property int $orderId 订单ID
 * @property int $userId 用户ID
 * @property int $goodsSourceId 来源记录ID
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class OrderGood extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_goods';
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
    protected $casts = ['id' => 'integer', 'goods_id' => 'integer', 'image_id' => 'integer', 'deduct_stock_type' => 'integer', 'spec_type' => 'integer', 'is_user_grade' => 'integer', 'grade_ratio' => 'integer', 'points_num' => 'integer', 'points_bonus' => 'integer', 'total_num' => 'integer', 'is_comment' => 'integer', 'order_id' => 'integer', 'user_id' => 'integer', 'goods_source_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}