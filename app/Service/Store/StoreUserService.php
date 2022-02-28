<?php


namespace App\Service\Store;


use App\Entity\PaginatorQo;
use App\Entity\Store\EditStoreUserDto;
use App\Entity\Store\LoginDto;
use App\Repo\Store\StoreUserRepo;
use App\Repo\Store\StoreUserRoleRepo;
use Hyperf\Database\Model\Collection;
use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Paginator\LengthAwarePaginator;

class StoreUserService
{
    /**
     * @var StoreUserRepo
     * @Inject
     */
    protected StoreUserRepo $repo;

    /**
     * @var StoreUserRoleRepo
     * @Inject
     */
    protected StoreUserRoleRepo $userRoleRepo;

    public function paginator(PaginatorQo $qo, $storeUserQo): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $paginator */
        $paginator = $this->repo->paginator($qo, $storeUserQo);
        /** @var Collection $collection */
        $collection = $paginator->getCollection();
        $collection->load(['role']);

        return $paginator;
    }

    public function detail($id)
    {
        $model = $this->repo->detail($id);
        $model->load(['role']);

        return $model;
    }

    public function edit(EditStoreUserDto $dto, array $roleIds): bool
    {
        Db::transaction(function () use ($dto, $roleIds) {
            if ($dto->id) {
                $this->repo->edit($dto);
                $this->userRoleRepo->destroy($dto->id);
            } else {
                $dto = $this->repo->add($dto);
            }
            $this->userRoleRepo->add($dto->id, $roleIds);
        });

        return true;
    }

    public function destroy($id): ?bool
    {
        return $this->repo->destroy($id);
    }
}