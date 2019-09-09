<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use App\Models\Subscriber;
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

    /**
     * @param string $email
     * @return Subscriber|null
     */
    public function findByEmail(string $email): ?Subscriber;

    /**
     * @param array $data
     * @return Subscriber
     */
    public function create(array $data): Subscriber;
}
