<?php


namespace App\Controller\Store;


use App\Controller\AbstractController;
use App\Entity\PaginatorQo;
use App\Entity\Result;
use App\Entity\Store\EditStoreUserDto;
use App\Entity\Store\StoreUserQo;
use App\Resource\PaginatorCollection;
use App\Service\Store\StoreUserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class StoreUserController
 * @package App\Controller\Store
 * @AutoController(prefix="storeUser")
 */
class StoreUserController extends AbstractController
{
    /**
     * @Inject
     * @var StoreUserService
     */
    protected StoreUserService $service;

    /**
     * 分页列表
     */
    public function paginator(): Result
    {
        $paginator = $this->service->paginator(new PaginatorQo($this->request->inputs(['page', 'pageSize'])), new StoreUserQo($this->request->inputs(['type', 'keywords'])));

        return Result::success(new PaginatorCollection($paginator));
    }

    /**
     * @return Result
     */
    public function detail(): Result
    {
        return Result::success($this->service->detail($this->request->input('id')));
    }

    /**
     * 新增或修改
     * @return Result
     */
    public function edit(): Result
    {
        $this->service->edit(new EditStoreUserDto($this->request->all()), $this->request->input('roleIds'));
        return Result::success([]);
    }

    /**
     * 删除
     * @return Result
     */
    public function destroy(): Result
    {
        $this->service->destroy($this->request->input('id'));

        return Result::success([]);
    }
}