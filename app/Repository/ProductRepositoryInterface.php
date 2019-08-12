<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    /**
     * @param PaginationDTO $paginationDTO
     * @return LengthAwarePaginator
     */
    public function paginateWithCategory(PaginationDTO $paginationDTO): LengthAwarePaginator;

    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product;

    /**
     * @param Product $product
     * @param array $data
     * @return Product
     */
    public function update(Product $product, array $data): Product;

    /**
     * @param int $intProductID
     * @return Product|null
     */
    public function find(int $intProductID): ?Product;
}
