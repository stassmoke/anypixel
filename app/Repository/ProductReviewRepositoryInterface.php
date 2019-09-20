<?php

namespace App\Repository;

use App\Models\ProductReview;
use Illuminate\Support\Collection;

interface ProductReviewRepositoryInterface
{
    /**
     * @param array $data
     * @return ProductReview
     */
    public function create(array $data): ProductReview;

    /**
     * @param ProductReview $productReview
     * @param array $data
     * @return ProductReview
     */
    public function update(ProductReview $productReview, array $data): ProductReview;

    /**
     * @param int $intReviewID
     * @return ProductReview|null
     */
    public function find(int $intReviewID): ?ProductReview;

    /**
     * @param int $intReviewID
     */
    public function delete(int $intReviewID): void;

    /**
     * @param array $reviewsIds
     * @param int $intProductID
     */
    public function setProductID(array $reviewsIds, int $intProductID): void;

    /**
     * @param int $intProductID
     * @return Collection
     */
    public function findByProductID(int $intProductID): Collection;
}
