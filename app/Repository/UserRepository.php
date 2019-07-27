<?php

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function findByEmail(string $email): ?User
    {
        /** @var User $user */
        $user = User::query()
            ->where('varEmail','=', $email)
            ->first()
        ;

        return $user;
    }

}
