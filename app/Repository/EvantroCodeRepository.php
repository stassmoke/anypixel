<?php

namespace App\Repository;

use App\Models\EvantroCode;

class EvantroCodeRepository implements EvantroCodeRepositoryInterface
{
    /**
     * @inheritdoc
     * @return EvantroCode|null|object
     */
    public function findByCode(string $varCode): ?EvantroCode
    {
        return EvantroCode::query()
            ->where('varCode','=', $varCode)
            ->first()
        ;
    }


    /**
     * @inheritdoc
     */
    public function create(array $data): EvantroCode
    {
        $evantroCode = new EvantroCode();

        $evantroCode->varCode = $data['varCode'];
        $evantroCode->intEvantroID = $data['intEvantroID'];

        $evantroCode->save();

        return $evantroCode;
    }
}
