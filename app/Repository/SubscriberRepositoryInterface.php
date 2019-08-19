<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SubscriberRepositoryInterface
{
    /**
     * @param PaginationDTO $paginationDTO
     * @return LengthAwarePaginator
     */
    public function getOrderByCreatePaginate(PaginationDTO $paginationDTO): LengthAwarePaginator;

    /**
     * @param int $intSubscriberID
     */
    public function delete(int $intSubscriberID): void;
}
