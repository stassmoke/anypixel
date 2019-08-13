<?php

namespace App\Repository;

use App\Models\HomepageReview;
use Illuminate\Support\Collection;

interface HomepageReviewRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getSorted(): Collection;

    /**
     * @param int $intReviewID
     * @param int $intOrder
     */
    public function updateOrder(int $intReviewID, int $intOrder): void;

    /**
     * @param int $intReviewID
     */
    public function delete(int $intReviewID): void;

    /**
     * @return int
     */
    public function getLastSortIndex(): int;

    /**
     * @param int $intReviewID
     * @return HomepageReview|null
     */
    public function find(int $intReviewID): ?HomepageReview;

    /**
     * @param HomepageReview $homepageReview
     * @param array $data
     * @return HomepageReview
     */
    public function update(HomepageReview $homepageReview, array $data): HomepageReview;

    /**
     * @param array $data
     * @return HomepageReview
     */
    public function createFromArray(array $data): HomepageReview;

    /**
     * @return Collection
     */
    public function getEnabledSorted(): Collection;
}
