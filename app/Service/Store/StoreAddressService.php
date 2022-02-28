<?php

namespace App\Service\Store;

use App\Entity\PaginatorQo;
use Hyperf\Di\Annotation\Inject;
use App\Repo\Store\StoreAddressRepo;
use Hyperf\Contract\LengthAwarePaginatorInterface;

class StoreAddressService
{
    /**
     * @var StoreAddressRepo
     * @Inject
     */
    protected StoreAddressRepo $repo;

    public function paginator(PaginatorQo $qo, $storeAddressQo): LengthAwarePaginatorInterface
    {
        return $this->repo->paginator($qo, $storeAddressQo);
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
