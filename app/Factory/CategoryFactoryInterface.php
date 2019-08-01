<?php

namespace App\Factory;

use App\Models\Category;

interface CategoryFactoryInterface
{
    /**
     * @param array $data
     * @return Category
     */
    public function createFromArray(array $data): Category;
}
