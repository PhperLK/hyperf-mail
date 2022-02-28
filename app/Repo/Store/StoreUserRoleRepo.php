<?php


namespace App\Repo\Store;


use App\Model\StoreUserRole;

class StoreUserRoleRepo
{
    public function add($userId, $roleIds): bool
    {
        foreach ($roleIds as $roleId) {
            $model = new StoreUserRole();
            $model->storeUserId = $userId;
            $model->roleId = $roleId;
            $model->save();
        }

        return true;
    }

    public function destroy($userId): int
    {
        return StoreUserRole::where('store_user_id', $userId)->forceDelete();
    }
}