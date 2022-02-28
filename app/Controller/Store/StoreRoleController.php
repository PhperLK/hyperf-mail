<?php


namespace App\Controller\Store;


use App\Controller\AbstractController;
use App\Entity\PaginatorQo;
use App\Entity\Result;
use App\Entity\Store\EditStoreRoleDto;
use App\Resource\PaginatorCollection;
use App\Service\Store\StoreRoleService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\GetMapping;

/**
 * Class StoreRoleController
 * @package App\Controller\Store
 * @AutoController (prefix="storeRole")
 */
class StoreRoleController extends AbstractController
{
    /**
     * @var StoreRoleService
     * @Inject
     */
    protected StoreRoleService $service;

    public function paginator(): Result
    {
        $paginator = $this->service->paginator(new PaginatorQo($this->request->inputs(['page', 'pageSize'])));
        return Result::success(new PaginatorCollection($paginator));
    }

    public function detail(): Result
    {
        return Result::success($this->service->detail($this->request->input('id')));
    }

    public function edit(): Result
    {
        $this->service->edit(new EditStoreRoleDto($this->request->inputs(['id', 'roleName', 'parentId', 'sort'])), $this->request->input('menuIds', []));
        return Result::success([]);
    }

    public function destroy(): Result
    {
        $this->service->destroy($this->request->input('id'));
        return Result::success([]);
    }

    /**
     * @return Result
     */
    public function getMenuTree(): Result
    {
        return Result::success($this->service->getMenuTree());
    }
}