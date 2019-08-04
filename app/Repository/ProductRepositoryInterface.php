<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    /**
     * @param PaginationDTO $paginationDTO
     * @return LengthAwarePaginator
     */
    public function paginateWithCategory(PaginationDTO $paginationDTO): LengthAwarePaginator;
}
