<?php

namespace App\Repo\Store;

use App\Entity\PaginatorQo;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use App\Model\StoreAddress;

class StoreAddressRepo
{
    public function paginator(PaginatorQo $qo, $storeAddressQo): LengthAwarePaginatorInterface
    {
        $query = StoreAddress::query();
        //TODO::

        return $query->paginate($qo->pageSize, ['*'], 'page', $qo->currentPage);
    }

    public function findFromCache($id)
    {
        return StoreAddress::findFromCache($id);
    }

    public function find($id)
    {
        return StoreAddress::find($id);
    }

    public function add(EditStoreUserDto $dto)
    {
        $model = new StoreAddress();
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function edit(EditStoreUserDto $dto)
    {
        $model = StoreAddress::findFromCache($dto->id);
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function destroy($id): ?bool
    {
        return StoreAddress::findFromCache($id)->delete();
    }

}
