<?php

namespace App\Repository;

use App\Models\AfterEffectsPack;
use Illuminate\Support\Collection;

class AfterEffectsPackRepository implements AfterEffectsPackRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSorted(): Collection
    {
        return AfterEffectsPack::query()
            ->orderBy('intSort')
            ->get()
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnabledSorted(): Collection
    {
        return AfterEffectsPack::query()
            ->where('isEnabled','=', true)
            ->orderBy('intSort')
            ->get()
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function updateOrder(int $intPackID, int $intOrder): void
    {
        AfterEffectsPack::query()
            ->where('intPackID','=', $intPackID)
            ->update([
                'intSort' => $intOrder
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(int $intPackID): void
    {
        AfterEffectsPack::query()
            ->where('intPackID','=', $intPackID)
            ->delete()
        ;
    }

    /**
     * {@inheritdoc}
     * @return AfterEffectsPack|null|object
     */
    public function find(int $intPackID): ?AfterEffectsPack
    {
        return AfterEffectsPack::query()->find($intPackID);
    }

    /**
     * @inheritdoc
     * @return AfterEffectsPack|null|object
     */
    public function findByEvantroID(int $intEvantroID): ?AfterEffectsPack
    {
        return AfterEffectsPack::query()
            ->where('intEvantroID','=', $intEvantroID)
            ->first()
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): AfterEffectsPack
    {
        $afterEffectsPack = new AfterEffectsPack();

        return $this->update($afterEffectsPack, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function update(AfterEffectsPack $afterEffectsPack, array $data): AfterEffectsPack
    {
        $afterEffectsPack->varName = $data['varName'];
        $afterEffectsPack->intEvantroID = $data['intEvantroID'];
        $afterEffectsPack->varLink = $data['varLink'];
        $afterEffectsPack->isEnabled = $data['isEnabled'];
        $afterEffectsPack->varDescription = $data['varDescription'];
        $afterEffectsPack->varImg = $data['varImg'];

        $afterEffectsPack->save();

        return $afterEffectsPack;
    }
}
