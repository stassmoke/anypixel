<?php

namespace App\Repository;

use App\Models\Counter;
use Illuminate\Support\Collection;

interface CounterRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getEnabledSorted(): Collection;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param Counter $counter
     * @param array $data
     */
    public function update(Counter $counter, array $data): void;

    /**
     * @param string $alias
     * @return Counter|null
     */
    public function findByAlias(string $alias): ?Counter;

    /**
     * @param string $alias
     * @param int $count
     */
    public function updateCount(string $alias, int $count): void;
}
