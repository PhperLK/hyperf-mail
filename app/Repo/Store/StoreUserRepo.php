<?php


namespace App\Repo\Store;


use App\Entity\PaginatorQo;
use App\Entity\Store\EditStoreUserDto;
use App\Model\StoreUser;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use Hyperf\Database\Query\Builder;

class StoreUserRepo
{
    public function paginator(PaginatorQo $qo, $storeUserQo): LengthAwarePaginatorInterface
    {
        $query = StoreUser::query();
        $query->when($storeUserQo->keywords, function (Builder $q) use ($storeUserQo) {
            $q->when($storeUserQo->type == 'username', fn($q) => $q->where('username', 'like', '%'.$storeUserQo->username.'%'));
            $q->when($storeUserQo->type == 'name', fn($q) => $q->where('name', 'like', '%'.$storeUserQo->name.'%'));
        });
        return $query->orderBy('id')->paginate($qo->pageSize, ['*'], 'page', $qo->currentPage);
    }

    public function detail($id)
    {
        return StoreUser::findFromCache($id);
    }


    public function add(EditStoreUserDto $dto): StoreUser
    {
        $model = new StoreUser();
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function edit(EditStoreUserDto $dto)
    {
        $model = StoreUser::findFromCache($dto->id);
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function destroy($id): ?bool
    {
        return StoreUser::findFromCache($id)->delete();
    }
}