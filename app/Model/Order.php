<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 订单ID
 * @property string $orderNo 订单号
 * @property string $totalPrice 商品总金额(不含优惠折扣)
 * @property string $orderPrice 订单金额(含优惠折扣)
 * @property int $couponId 优惠券ID
 * @property string $couponMoney 优惠券抵扣金额
 * @property string $pointsMoney 积分抵扣金额
 * @property int $pointsNum 积分抵扣数量
 * @property string $payPrice 实际付款金额(包含运费)
 * @property string $updatePrice 后台修改的订单金额（差价）
 * @property string $buyerRemark 买家留言
 * @property int $payType 支付方式(10余额支付 20微信支付)
 * @property int $payStatus 付款状态(10未付款 20已付款)
 * @property int $payTime 付款时间
 * @property int $deliveryType 配送方式(10快递配送)
 * @property string $expressPrice 运费金额
 * @property int $expressId 物流公司ID
 * @property string $expressCompany 物流公司
 * @property string $expressNo 物流单号
 * @property int $deliveryStatus 发货状态(10未发货 20已发货)
 * @property int $deliveryTime 发货时间
 * @property int $receiptStatus 收货状态(10未收货 20已收货)
 * @property int $receiptTime 收货时间
 * @property int $orderStatus 订单状态(10进行中 20取消 21待取消 30已完成)
 * @property int $pointsBonus 赠送的积分数量
 * @property int $isSettled 订单是否已结算(0未结算 1已结算)
 * @property string $transactionId 微信支付交易号
 * @property int $isComment 是否已评价(0否 1是)
 * @property int $orderSource 订单来源(10普通订单)
 * @property int $orderSourceId 来源记录ID
 * @property string $platform 来源客户端 (APP、H5、小程序等)
 * @property int $userId 用户ID
 * @property int $inviterId 邀请人Id
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';
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
    protected $casts = ['id' => 'integer', 'coupon_id' => 'integer', 'points_num' => 'integer', 'pay_type' => 'integer', 'pay_status' => 'integer', 'pay_time' => 'integer', 'delivery_type' => 'integer', 'express_id' => 'integer', 'delivery_status' => 'integer', 'delivery_time' => 'integer', 'receipt_status' => 'integer', 'receipt_time' => 'integer', 'order_status' => 'integer', 'points_bonus' => 'integer', 'is_settled' => 'integer', 'is_comment' => 'integer', 'order_source' => 'integer', 'order_source_id' => 'integer', 'user_id' => 'integer', 'inviter_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}