<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 售后单ID
 * @property int $orderId 订单ID
 * @property int $orderGoodsId 订单商品ID
 * @property int $userId 用户ID
 * @property int $type 售后类型(10退货退款 20换货)
 * @property string $applyDesc 用户申请原因(说明)
 * @property int $auditStatus 商家审核状态(0待审核 10已同意 20已拒绝)
 * @property string $refuseDesc 商家拒绝原因(说明)
 * @property string $refundMoney 实际退款金额
 * @property int $isUserSend 用户是否发货(0未发货 1已发货)
 * @property int $sendTime 用户发货时间
 * @property string $expressId 用户发货物流公司ID
 * @property string $expressNo 用户发货物流单号
 * @property int $isReceipt 商家收货状态(0未收货 1已收货)
 * @property int $status 售后单状态(0进行中 10已拒绝 20已完成 30已取消)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class OrderRefund extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_refund';
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
    protected $casts = ['id' => 'integer', 'order_id' => 'integer', 'order_goods_id' => 'integer', 'user_id' => 'integer', 'type' => 'integer', 'audit_status' => 'integer', 'is_user_send' => 'integer', 'send_time' => 'integer', 'is_receipt' => 'integer', 'status' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}