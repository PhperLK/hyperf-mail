<?php

namespace App\Service\Goods;

use App\Entity\PaginatorQo;
use App\Repo\Goods\GoodsRepo;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Contract\LengthAwarePaginatorInterface;

class GoodsService
{
    /**
     * @var GoodsRepo
     * @Inject
     */
    protected GoodsRepo $repo;

    public function paginator(PaginatorQo $qo, $GoodsQo): LengthAwarePaginatorInterface
    {
        return $this->repo->paginator();
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

}
