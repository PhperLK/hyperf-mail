<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键ID
 * @property int $commentId 评价ID
 * @property int $imageId 图片id(关联文件记录表)
 * @property int $storeId 商城ID
 * @property \Carbon\Carbon $createdAt 创建时间
 * @property \Carbon\Carbon $updatedAt 
 * @property string $deletedAt 
 */
class CommentImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment_image';
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
    protected $casts = ['id' => 'integer', 'comment_id' => 'integer', 'image_id' => 'integer', 'store_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}