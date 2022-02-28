<?php

namespace App\Service\Store;

use App\Entity\PaginatorQo;
use Hyperf\Di\Annotation\Inject;
use App\Repo\Store\StoreRepo;
use Hyperf\Contract\LengthAwarePaginatorInterface;

class StoreService
{
    /**
     * @var StoreRepo
     * @Inject
     */
    protected StoreRepo $repo;

    public function paginator(PaginatorQo $qo, $StoreQo): LengthAwarePaginatorInterface
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
