<?php

namespace App\Repository;

use App\Models\AfterEffectsPack;
use Illuminate\Support\Collection;

interface AfterEffectsPackRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getSorted(): Collection;

    /**
     * @return Collection
     */
    public function getEnabledSorted(): Collection;

    /**
     * @param int $intPackID
     * @param int $intOrder
     */
    public function updateOrder(int $intPackID, int $intOrder): void;

    /**
     * @param int $intPackID
     */
    public function delete(int $intPackID): void;

    /**
     * @param int $intPackID
     * @return AfterEffectsPack|null
     */
    public function find(int $intPackID): ?AfterEffectsPack;

    /**
     * @param int $intEvantroID
     * @return AfterEffectsPack|null
     */
    public function findByEvantroID(int $intEvantroID): ?AfterEffectsPack;

    /**
     * @param array $data
     * @return AfterEffectsPack
     */
    public function create(array $data): AfterEffectsPack;

    /**
     * @param AfterEffectsPack $afterEffectsPack
     * @param array $data
     * @return AfterEffectsPack
     */
    public function update(AfterEffectsPack $afterEffectsPack, array $data): AfterEffectsPack;
}
