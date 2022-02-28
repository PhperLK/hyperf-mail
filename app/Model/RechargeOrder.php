<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 订单ID
 * @property string $orderNo 订单号
 * @property int $userId 用户ID
 * @property int $rechargeType 充值方式(10自定义金额 20套餐充值)
 * @property int $planId 充值套餐ID
 * @property string $payPrice 用户支付金额
 * @property string $giftMoney 赠送金额
 * @property string $actualMoney 实际到账金额
 * @property int $payStatus 支付状态(10待支付 20已支付)
 * @property int $payTime 付款时间
 * @property string $transactionId 微信支付交易号
 * @property int $storeId 小程序商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class RechargeOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recharge_order';
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
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'recharge_type' => 'integer', 'plan_id' => 'integer', 'pay_status' => 'integer', 'pay_time' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}