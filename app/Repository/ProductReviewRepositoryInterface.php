<?php

namespace App\Repository;

use App\Models\ProductReview;

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
}
