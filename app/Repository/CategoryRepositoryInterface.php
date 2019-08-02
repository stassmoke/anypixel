<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getSorted(): Collection;

    /**
     * @param int $intCatID
     * @param int $intOrder
     */
    public function updateCatOrder(int $intCatID, int $intOrder): void;

    /**
     * @param int $intCatID
     */
    public function delete(int $intCatID): void;

    /**
     * @return int
     */
    public function getLastSortIndex(): int;

    /**
     * @param int $intCatID
     * @return Category|null
     */
    public function find(int $intCatID): ?Category;

    /**
     * @param Category $category
     * @param array $data
     * @return Category
     */
    public function update(Category $category, array $data): Category;

    /**
     * @param array $data
     * @return Category
     */
    public function createFromArray(array $data): Category;
}
