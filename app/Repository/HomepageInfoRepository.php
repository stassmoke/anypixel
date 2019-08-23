<?php

namespace App\Repository;

use App\Models\HomepageInfo;

class HomepageInfoRepository implements HomepageInfoRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function findOrCreate(): HomepageInfo
    {
        /** @var HomepageInfo $homepageInfo */
        $homepageInfo = HomepageInfo::query()->first();

        if (!$homepageInfo) {
            $homepageInfo = new HomepageInfo();
        }

        return $homepageInfo;
    }

    /**
     * @inheritdoc
     */
    public function update(HomepageInfo $homepageInfo, array $data): void
    {
        $homepageInfo->varType = $data['varType'];
        $homepageInfo->varImgUrl = $data['varImgUrl'];
        $homepageInfo->varVideoUrl = $data['varVideoUrl'];

        $homepageInfo->save();
    }

}
