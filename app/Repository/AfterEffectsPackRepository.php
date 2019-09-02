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
    public function updateOrder(int $intPackID, int $intOrder): void
    {
        AfterEffectsPack::query()
            ->where('intPackID','=', $intPackID)
            ->update([
                'intOrder' => $intOrder
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
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $intPackID): ?AfterEffectsPack
    {
        return AfterEffectsPack::query()->find($intPackID);
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
        $afterEffectsPack->varLink = $data['varLink'];
        $afterEffectsPack->varDescription = $data['varDescription'];
        $afterEffectsPack->varImg = $data['varImg'];

        $afterEffectsPack->save();

        return $afterEffectsPack;
    }
}
