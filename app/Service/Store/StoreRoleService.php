<?php

namespace App\Service\Store;

use App\Entity\PaginatorQo;
use App\Entity\Store\EditStoreRoleDto;
use App\Repo\Store\StoreMenuRepo;
use App\Repo\Store\StoreRoleMenuRepo;
use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use App\Repo\Store\StoreRoleRepo;
use Hyperf\Paginator\LengthAwarePaginator;

class StoreRoleService
{
    /**
     * @var StoreRoleRepo
     * @Inject
     */
    protected StoreRoleRepo $repo;

    /**
     * @var StoreMenuRepo
     * @Inject
     */
    protected StoreMenuRepo $menuRepo;

    /**
     * @var StoreRoleMenuRepo
     * @Inject
     */
    protected StoreRoleMenuRepo $roleMenuRepo;

    public function paginator(PaginatorQo $qo): LengthAwarePaginator
    {
        return $this->repo->paginator($qo);
    }

    public function detail($id)
    {
        $model = $this->repo->findFromCache($id);
        $model->load(['storeMenu']);

        return $model;
    }

    public function edit(EditStoreRoleDto $dto, array $menuIds): bool
    {
        Db::transaction(function () use ($dto, $menuIds){
            if ($dto->id) {
                $this->repo->edit($dto);
                $this->roleMenuRepo->destroy($dto->id);
                $this->roleMenuRepo->add($dto->id, $menuIds);
            } else {
                $model = $this->repo->add($dto);
                $this->roleMenuRepo->add($model->id, $menuIds);
            }
        });

        return true;
    }

    public function destroy($id): ?bool
    {
        return $this->repo->destroy($id);
    }

    public function getMenuTree(): array
    {
        $list = $this->menuRepo->list();
        return $this->getTreeData($list);
    }

    /**
     * 获取树状列表
     * @param $list
     * @param int $parentId
     * @return array
     */
    private function getTreeData($list, int $parentId = 0): array
    {
        $data = [];
        foreach ($list as $key => $item) {
            if ($item['parent_id'] == $parentId) {
                $children = $this->getTreeData($list, $item['id']);
                !empty($children) && $item['children'] = $children;
                $data[] = $item;
                unset($list[$key]);
            }
        }
        return $data;
    }

}
