<?php

namespace App\Filter;

use App\DTO\SortByDTO;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter implements ProductFilterInterface
{
    /**
     * @inheritdoc
     */
    public function filter(Builder $builder, SortByDTO $sortByDTO, array $filter): Builder
    {
        $builder->orderBy($sortByDTO->getColumn(), $sortByDTO->getDirection());

        if (isset($filter['intCatID']) && is_numeric($filter['intCatID'])) {
            $builder->where('intCatID','=', $filter['intCatID']);
        }

        if (isset($filter['term'])) {
            $builder->where('varName','LIKE', '%' . $filter['term'] . '%');
        }

        return $builder;
    }
}
