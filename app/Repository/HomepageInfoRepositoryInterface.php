<?php

namespace App\Repository;

use App\Models\HomepageInfo;

interface HomepageInfoRepositoryInterface
{
    /**
     * @return HomepageInfo
     */
    public function findOrCreate(): HomepageInfo;

    /**
     * @param HomepageInfo $homepageInfo
     * @param array $data
     */
    public function update(HomepageInfo $homepageInfo, array $data): void ;
}
