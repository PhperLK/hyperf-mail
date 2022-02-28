<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 微信小程序ID
 * @property string $appId 小程序AppID
 * @property string $appSecret 小程序AppSecret
 * @property string $mchid 微信商户号ID
 * @property string $apikey 微信支付密钥
 * @property string $certPem 证书文件cert
 * @property string $keyPem 证书文件key
 * @property int $storeId 商城ID
 * @property int $isDelete 是否删除
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 */
class Wxapp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wxapp';
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
    protected $casts = ['id' => 'integer', 'store_id' => 'integer', 'is_delete' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}