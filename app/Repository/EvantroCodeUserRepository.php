<?php

namespace App\Repository;

use App\Models\EvantroCode;
use App\Models\EvantroCodeUser;
use Illuminate\Support\Collection;

/**
 * Class EvantroCodeUserRepository
 * @package App\Repository
 */
class EvantroCodeUserRepository implements EvantroCodeUserRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function findByEvantroCode(EvantroCode $code): Collection
    {
        return EvantroCodeUser::query()
            ->where('intCodeID','=', $code->intCodeID)
            ->get()
        ;
    }

    /**
     * @inheritdoc
     */
    public function countByEvantroCode(EvantroCode $code): int
    {
        return EvantroCodeUser::query()
            ->where('intCodeID','=', $code->intCodeID)
            ->count()
        ;
    }

    /**
     * @inheritdoc
     * @return EvantroCodeUser|null|object
     */
    public function findByEvantroAndUserNameAndEmail(EvantroCode $code, string $username, string $email): ?EvantroCodeUser
    {
        return EvantroCodeUser::query()
            ->where('intCodeID','=', $code->intCodeID)
            ->where('varUserName','=', $username)
            ->where('varEmail','=', $email)
            ->first()
        ;
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): EvantroCodeUser
    {
        $evantroCodeUser = new EvantroCodeUser();

        $evantroCodeUser->intCodeID = $data['intCodeID'];
        $evantroCodeUser->varEmail = $data['varEmail'];
        $evantroCodeUser->varUserName = $data['varUserName'];

        $evantroCodeUser->save();

        return $evantroCodeUser;
    }
}
