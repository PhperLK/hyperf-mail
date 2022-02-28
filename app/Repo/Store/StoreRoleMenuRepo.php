<?php

namespace App\Repo\Store;

use App\Entity\PaginatorQo;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use App\Model\StoreRoleMenu;
use Hyperf\Database\Model\Model;

class StoreRoleMenuRepo
{
    public function paginator(PaginatorQo $qo, $StoreRoleMenuQo): LengthAwarePaginatorInterface
    {
        $query = StoreRoleMenu::query();
        //TODO::

        return $query->paginate($qo->pageSize, ['*'], 'page', $qo->currentPage);
    }

    public function findFromCache($id)
    {
        return StoreRoleMenu::findFromCache($id);
    }

    public function find($id)
    {
        return StoreRoleMenu::find($id);
    }

    public function add($roleId, $menuIds): bool
    {
        foreach ($menuIds as $menuId) {
            $model = new StoreRoleMenu();
            $model->roleId = $roleId;
            $model->menuId = $menuId;
            $model->save();
        }

        return true;
    }


    public function destroy($roleId): ?bool
    {
        $model = StoreRoleMenu::where('role_id', $roleId);
        $model->forceDelete();

        return true;
    }

}
