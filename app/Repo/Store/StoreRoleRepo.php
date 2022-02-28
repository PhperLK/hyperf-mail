<?php

namespace App\Repo\Store;

use App\Constants\ErrorCode;
use App\Entity\PaginatorQo;
use App\Entity\Store\EditStoreRoleDto;
use App\Exception\BusinessException;
use App\Model\StoreRoleMenu;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use App\Model\StoreRole;

class StoreRoleRepo
{
    public function paginator(PaginatorQo $qo): LengthAwarePaginatorInterface
    {
        $query = StoreRole::query();
        //TODO::

        return $query->paginate($qo->pageSize, ['*'], 'page', $qo->currentPage);
    }

    public function findFromCache($id)
    {
        return StoreRole::findFromCache($id);
    }

    public function find($id)
    {
        return StoreRole::find($id);
    }

    public function add(EditStoreRoleDto $dto): StoreRole
    {
        $model = new StoreRole();
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function edit(EditStoreRoleDto $dto)
    {
        $model = StoreRole::findFromCache($dto->id);
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function destroy($id): bool
    {
        $store = StoreRole::findFromCache($id);
        if ($store->storeUser()->exists()) {
            throw new BusinessException(ErrorCode::BAD_REQUEST, '已关联员工，无法删除');
        }
        $store->delete();

        StoreRoleMenu::where('role_id', $id)->delete();
        return true;
    }

}
