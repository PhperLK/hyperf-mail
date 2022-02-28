<?php

namespace App\Repo\Store;

use App\Entity\PaginatorQo;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use App\Model\Store;

class StoreRepo
{
    public function paginator(PaginatorQo $qo, $StoreQo): LengthAwarePaginatorInterface
    {
        $query = Store::query();
        //TODO::

        return $query->paginate($qo->pageSize, ['*'], 'page', $qo->currentPage);
    }

    public function findFromCache($id)
    {
        return Store::findFromCache($id);
    }

    public function find($id)
    {
        return Store::find($id);
    }

    public function add(EditStoreUserDto $dto)
    {
        $model = new Store();
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function edit(EditStoreUserDto $dto)
    {
        $model = Store::findFromCache($dto->id);
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function destroy($id): ?bool
    {
        return Store::findFromCache($id)->delete();
    }

}
