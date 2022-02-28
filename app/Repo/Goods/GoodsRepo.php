<?php

namespace App\Repo\Goods;

use App\Entity\PaginatorQo;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use App\Model\Goods;

class GoodsRepo
{
    public function paginator(PaginatorQo $qo, $GoodsQo): LengthAwarePaginatorInterface
    {
        $query = Goods::query();
        //TODO::

        return $query->paginate($qo->pageSize, ['*'], 'page', $qo->currentPage);
    }

    public function findFromCache($id)
    {
        return Goods::findFromCache($id);
    }

    public function find($id)
    {
        return Goods::find($id);
    }

    public function add(EditStoreUserDto $dto): StoreUser
    {
        $model = new Goods();
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function edit(EditStoreUserDto $dto)
    {
        $model = Goods::findFromCache($dto->id);
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function destroy($id): ?bool
    {
        return Goods::findFromCache($id)->delete();
    }

}
