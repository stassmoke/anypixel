<?php

namespace App\Repository;

use App\Models\Social;
use Illuminate\Support\Collection;

class SocialRepository implements SocialRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getSorted(): Collection
    {
        return Social::query()
            ->orderBy('intSort')
            ->get()
        ;
    }

    /**
     * @inheritdoc
     */
    public function update(Social $social, array $data): Social
    {
        $social->varName = $data['varName'];
        $social->varLink = $data['varLink'];
        $social->varIcon = $data['varIcon'];

        $social->save();

        return $social;
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): Social
    {
        $social = new Social();

        return $this->update($social, $data);
    }

    /**
     * @inheritdoc
     */
    public function updateSort(int $intSocialID, int $intOrder): void
    {
        Social::query()
            ->where('intSocialID','=', $intSocialID)
            ->update([
                'intSort' => $intOrder,
            ])
        ;
    }

    /**
     * @inheritdoc
     */
    public function delete(int $intSocialID): void
    {
        Social::query()
            ->where('intSocialID','=', $intSocialID)
            ->delete()
        ;
    }

    /**
     * @inheritdoc
     * @return Social|object|null
     */
    public function find(int $intSocialID): ?Social
    {
        return Social::query()->find($intSocialID);
    }
}
