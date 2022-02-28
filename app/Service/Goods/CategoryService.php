<?php

namespace App\Service\Goods;

use App\Entity\PaginatorQo;
use Hyperf\Di\Annotation\Inject;
use App\Repo\Goods\CategoryRepo;
use Hyperf\Paginator\LengthAwarePaginator;

class CategoryService
{
    /**
     * @var CategoryRepo
     * @Inject
     */
    protected CategoryRepo $repo;

    public function getTree(): array
    {
        $list = $this->repo->list();
        return $this->getTreeData($list);
    }

    public function detail($id)
    {
        return $this->repo->findFromCache($id);
    }

    public function edit($dto): bool
    {
        if ($dto->id) {
            $this->repo->edit($dto);
        } else {
            $this->repo->add($dto);
        }
        return true;
    }

    public function destroy($id): ?bool
    {
        return $this->repo->destroy($id);
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
