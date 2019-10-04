<?php

namespace App\Repository;

use App\Models\EvantroCode;

interface EvantroCodeRepositoryInterface
{
    /**
     * @param string $varCode
     * @param int $intEvantroID
     * @return EvantroCode|null
     */
    public function findByCodeAndEvantroID(string $varCode, int $intEvantroID): ?EvantroCode;

    /**
     * @param array $data
     * @return EvantroCode
     */
    public function create(array $data): EvantroCode;
}
