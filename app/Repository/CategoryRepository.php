<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getSorted(): Collection
    {
        return Category::query()
            ->orderBy('intOrder')
            ->get()
        ;
    }

    /**
     * @inheritdoc
     */
    public function updateCatOrder(int $intCatID, int $intOrder): void
    {
        Category::query()
            ->where('intCatID','=', $intCatID)
            ->update([
                'intOrder' => $intOrder
            ])
        ;
    }

    /**
     * @inheritdoc
     */
    public function delete(int $intCatID): void
    {
        Category::query()
            ->where('intCatID','=', $intCatID)
            ->delete()
        ;
    }

    /**
     * @inheritdoc
     */
    public function getLastSortIndex(): int
    {
        $intOrder = Category::query()->max('intOrder');

        return (int) $intOrder;
    }

    /**
     * @inheritdoc
     * @return Category|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $intCatID): Category
    {
        return Category::query()->find($intCatID);
    }

    /**
     * @inheritdoc
     */
    public function update(Category $category, array $data): Category
    {
        $category->varName = $data['varName'];
        $category->varLink = $data['varLink'];
        $category->isEnabled = $data['isEnabled'];

        $category->save();

        return $category;
    }

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

    /**
     * @inheritdoc
     */
    public function getForOptions(): Collection
    {
        return Category::query()
            ->orderBy('intOrder')
            ->get(['varName','intCatID'])
        ;
    }

    /**
     * @inheritdoc
     */
    public function getEnabledSorted(): Collection
    {
        return Category::query()
            ->where('isEnabled','=',true)
            ->orderBy('intOrder')
            ->get()
        ;
    }

}
