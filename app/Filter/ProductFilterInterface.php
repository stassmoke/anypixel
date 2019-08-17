<?php

namespace App\Filter;

use App\DTO\SortByDTO;
use Illuminate\Database\Eloquent\Builder;

interface ProductFilterInterface
{
    /**
     * @param Builder $builder
     * @param SortByDTO $sortByDTO
     * @param array $filter
     * @return Builder
     */
    public function filter(Builder $builder, SortByDTO $sortByDTO, array $filter): Builder;
}
