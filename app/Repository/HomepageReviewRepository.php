<?php

namespace App\Repository;

use App\Models\HomepageReview;
use Illuminate\Support\Collection;

class HomepageReviewRepository implements HomepageReviewRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getSorted(): Collection
    {
        return HomepageReview::query()
            ->orderBy('intOrder')
            ->get()
        ;
    }

    /**
     * @inheritdoc
     */
    public function updateOrder(int $intReviewID, int $intOrder): void
    {
        HomepageReview::query()
            ->where('intReviewID','=', $intReviewID)
            ->update([
                'intOrder' => $intOrder
            ])
        ;
    }

    /**
     * @inheritdoc
     */
    public function delete(int $intReviewID): void
    {
        HomepageReview::query()
            ->where('intReviewID','=', $intReviewID)
            ->delete()
        ;
    }

    /**
     * @inheritdoc
     */
    public function getLastSortIndex(): int
    {
        $intOrder = HomepageReview::query()->max('intOrder');

        return (int) $intOrder;
    }

    /**
     * @inheritdoc
     * @return HomepageReview|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $intReviewID): HomepageReview
    {
        return HomepageReview::query()->find($intReviewID);
    }

    /**
     * @inheritdoc
     */
    public function update(HomepageReview $homepageReview, array $data): HomepageReview
    {
        $homepageReview->varName = $data['varName'];
        $homepageReview->varLink = $data['varLink'];
        $homepageReview->isEnabled = $data['isEnabled'];
        $homepageReview->varText = $data['varText'];
        $homepageReview->varPosition = $data['varPosition'];

        $homepageReview->save();

        return $homepageReview;
    }

    /**
     * @inheritdoc
     */
    public function createFromArray(array $data): HomepageReview
    {
        $homepageReview = new HomepageReview();

        return $this->update($homepageReview, $data);
    }

    /**
     * @inheritdoc
     */
    public function getEnabledSorted(): Collection
    {
        return HomepageReview::query()
            ->where('isEnabled','=', true)
            ->orderBy('intOrder')
            ->get()
        ;
    }
}
