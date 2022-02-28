<?php


namespace App\Controller\Goods;


use App\Controller\AbstractController;
use App\Entity\Goods\EditCategoryDto;
use App\Entity\Result;
use App\Service\Goods\CategoryService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class CategoryController
 * @package App\Controller\Goods
 * @AutoController (prefix="category")
 */
class CategoryController extends AbstractController
{
    /**
     * @var CategoryService
     * @Inject
     */
    protected CategoryService $service;

    public function tree(): Result
    {
        return Result::success($this->service->getTree());
    }

    public function detail(): Result
    {
        return Result::success($this->service->detail($this->request->input('id')));
    }

    public function edit(): Result
    {
        $this->service->edit(new EditCategoryDto($this->request->all()));
        return Result::success([]);
    }

    public function destroy(): Result
    {
        return Result::success($this->service->destroy($this->request->input('id')));
    }
}