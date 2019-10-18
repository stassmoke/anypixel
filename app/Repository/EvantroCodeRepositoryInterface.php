<?php

namespace App\Repository;

use App\Models\EvantroCode;

interface EvantroCodeRepositoryInterface
{
    /**
     * @param string $varCode
     * @return EvantroCode|null
     */
    public function findByCode(string $varCode): ?EvantroCode;

    /**
     * @param array $data
     * @return EvantroCode
     */
    public function create(array $data): EvantroCode;
}
