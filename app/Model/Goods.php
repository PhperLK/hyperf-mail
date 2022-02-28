<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 商品ID
 * @property string $goodsName 商品名称
 * @property string $goodsNo 商品编码
 * @property string $sellingPoint 商品卖点
 * @property int $specType 商品规格(10单规格 20多规格)
 * @property string $goodsPriceMin 商品价格(最低)
 * @property string $goodsPriceMax 商品价格(最高)
 * @property string $linePriceMin 划线价格(最低)
 * @property string $linePriceMax 划线价格(最高)
 * @property int $stockTotal 库存总量(包含所有sku)
 * @property int $deductStockType 库存计算方式(10下单减库存 20付款减库存)
 * @property string $content 商品详情
 * @property int $salesInitial 初始销量
 * @property int $salesActual 实际销量
 * @property int $deliveryId 配送模板ID
 * @property int $isPointsGift 是否开启积分赠送(1开启 0关闭)
 * @property int $isPointsDiscount 是否允许使用积分抵扣(1允许 0不允许)
 * @property int $isAlonePointsDiscount 积分抵扣设置(0默认抵扣 1单独设置抵扣)
 * @property string $pointsDiscountConfig 单独设置积分抵扣的配置
 * @property int $isEnableGrade 是否开启会员折扣(1开启 0关闭)
 * @property int $isAloneGrade 会员折扣设置(0默认等级折扣 1单独设置折扣)
 * @property string $aloneGradeEquity 单独设置折扣的配置
 * @property int $status 商品状态(10上架 20下架)
 * @property int $sort 排序(数字越小越靠前)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Goods extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods';
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
    protected $casts = ['id' => 'integer', 'spec_type' => 'integer', 'stock_total' => 'integer', 'deduct_stock_type' => 'integer', 'sales_initial' => 'integer', 'sales_actual' => 'integer', 'delivery_id' => 'integer', 'is_points_gift' => 'integer', 'is_points_discount' => 'integer', 'is_alone_points_discount' => 'integer', 'is_enable_grade' => 'integer', 'is_alone_grade' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}