<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property int $storeId 
 * @property int $inviterId 邀请人Id
 * @property int $userId 下单人Id
 * @property int $orderId 订单Id
 * @property string $orderNo 订单sn
 * @property string $price 分润金额
 * @property int $status 0未提现 1提现中 2已提现
 * @property string $percentage 分润比例
 * @property \Carbon\Carbon $createdAt 
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class InviterIncome extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inviter_income';
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
    protected $casts = ['id' => 'integer', 'store_id' => 'integer', 'inviter_id' => 'integer', 'user_id' => 'integer', 'order_id' => 'integer', 'status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}