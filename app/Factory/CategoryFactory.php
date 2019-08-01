<?php

namespace App\Factory;

use App\Models\Category;

class CategoryFactory implements CategoryFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createFromArray(array $data): Category
    {
        $category = new Category();

        $category->varName = $data['varName'];
        $category->varLink = $data['varLink'];
        $category->isEnabled = $data['isEnabled'];
        $category->intOrder = $data['intOrder'];

        $category->save();

        return $category;
    }
}
