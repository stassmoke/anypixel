<?php

namespace App\Repository;

use App\Models\Social;
use Illuminate\Support\Collection;

class SocialRepository implements SocialRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function get(): Collection
    {
        return Social::query()
            ->orderBy('intSort')
            ->get()
        ;
    }

    /**
     * @inheritdoc
     */
    public function update(Social $social, array $data): void
    {
        $social->varName = $data['varName'];
        $social->varLink = $data['varLink'];
        $social->varIcon = $data['varIcon'];

        $social->save();
    }

}
