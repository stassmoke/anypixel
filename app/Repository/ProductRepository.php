<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function paginateWithCategory(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        return Product::query()
            ->with(['category:intCatID,varName'])
            ->paginate($paginationDTO->getPerPage(), ['*'],'page', $paginationDTO->getPage())
        ;
    }

}
