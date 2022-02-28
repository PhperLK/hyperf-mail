<?php


namespace App\Entity\Store;


use App\Entity\BaseEntity;
use App\Utils\SessionUtil;

/**
 * Class EditStoreRoleDto
 * @package App\Entity\Store
 * @property int $id
 * @property string $roleName
 * @property int $parentId
 * @property int $sort
 * @property int $storeId
 */
class EditStoreRoleDto extends BaseEntity
{
    public function __construct($data = [])
    {
        $data['storeId'] = SessionUtil::getStoreId();
        parent::__construct($data);
    }
}