<?php

namespace App\Repository;

use App\Models\EvantroCode;
use App\Models\EvantroCodeUser;
use Illuminate\Support\Collection;

interface EvantroCodeUserRepositoryInterface
{
    /**
     * @param EvantroCode $code
     * @return Collection
     */
    public function findByEvantroCode(EvantroCode $code): Collection;

    /**
     * @param EvantroCode $code
     * @return int
     */
    public function countByEvantroCode(EvantroCode $code): int;

    /**
     * @param EvantroCode $code
     * @param string $username
     * @param string $email
     * @return EvantroCodeUser|null|object
     */
    public function findByEvantroAndUserNameAndEmail(EvantroCode $code, string $username, string $email): ?EvantroCodeUser;

    /**
     * @param array $data
     * @return EvantroCodeUser
     */
    public function create(array $data): EvantroCodeUser;
}
