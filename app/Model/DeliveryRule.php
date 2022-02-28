<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 规则ID
 * @property int $deliveryId 配送模板ID
 * @property string $region 可配送区域(城市id集)
 * @property string $regionText 可配送区域(文字展示)
 * @property string $first 首件(个)/首重(Kg)
 * @property string $firstFee 运费(元)
 * @property string $additional 续件/续重
 * @property string $additionalFee 续费(元)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class DeliveryRule extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery_rule';
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
    protected $casts = ['id' => 'integer', 'delivery_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}