<?php

namespace App\Repository;

use App\Models\Counter;
use Illuminate\Support\Collection;

class CounterRepository implements CounterRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getEnabledSorted(): Collection
    {
        return Counter::query()
            ->where('isEnabled','=', true)
            ->orderBy('intSort','ASC')
            ->get()
        ;
    }

    /**
     * @inheritdoc
     */
    public function all(): Collection
    {
        return Counter::all();
    }

    /**
     * @inheritdoc
     */
    public function update(Counter $counter, array $data): void
    {
        $counter->varName = $data['varName'];
        $counter->isEnabled = $data['isEnabled'];
        $counter->intSort = $data['intSort'];
        $counter->intValue = $data['intValue'];

        $counter->save();
    }

    /**
     * @param string $alias
     * @return Counter|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object|Counter
     */
    public function findByAlias(string $alias): ?Counter
    {
        return Counter::query()
            ->where('varAlias','=', $alias)
            ->first()
        ;
    }

    /**
     * @inheritdoc
     */
    public function updateCount(string $alias, int $count): void
    {
        Counter::query()
            ->where('varAlias','=', $alias)
            ->update([
                'intValue' => $count,
            ])
        ;
    }
}
