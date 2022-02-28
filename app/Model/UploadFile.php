<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 文件ID
 * @property int $groupId 文件分组ID
 * @property int $channel 上传来源(10商户后台 20用户端)
 * @property string $storage 存储方式
 * @property string $domain 存储域名
 * @property int $fileType 文件类型(10图片 20附件 30视频)
 * @property string $fileName 文件名称(仅显示)
 * @property string $filePath 文件路径
 * @property int $fileSize 文件大小(字节)
 * @property string $fileExt 文件扩展名
 * @property string $cover 文件封面
 * @property int $uploaderId 上传者用户ID
 * @property int $isRecycle 是否在回收站
 * @property int $isDelete 是否删除
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class UploadFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'upload_file';
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
    protected $casts = ['id' => 'integer', 'group_id' => 'integer', 'channel' => 'integer', 'file_type' => 'integer', 'file_size' => 'integer', 'uploader_id' => 'integer', 'is_recycle' => 'integer', 'is_delete' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}