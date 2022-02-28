<?php

namespace App\Repo\Goods;

use App\Constants\ErrorCode;
use App\Entity\Goods\EditCategoryDto;
use App\Exception\BusinessException;
use App\Model\Category;

class CategoryRepo
{
    public function list()
    {
        return Category::all();
    }

    public function findFromCache($id)
    {
        return Category::findFromCache($id);
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function add(EditCategoryDto $dto): Category
    {
        $model = new Category();
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function edit(EditCategoryDto $dto)
    {
        $model = Category::findFromCache($dto->id);
        $model->fill($dto->getData());
        $model->save();

        return $model;
    }

    public function destroy($id): ?bool
    {
        /** @var Category $model */
        $model = Category::findFromCache($id);
        if ($model->goods()->exists()) {
            throw new BusinessException(ErrorCode::BAD_REQUEST, '分类正在使用，无法删除');
        }
        $model->delete();

        return true;
    }

}
