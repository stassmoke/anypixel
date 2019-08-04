<?php

namespace App\Repository;

use App\Models\ProductReview;

class ProductReviewRepository implements ProductReviewRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function create(array $data): ProductReview
    {
        $productReview = new ProductReview();

        return $this->update($productReview, $data);
    }

    /**
     * @inheritdoc
     */
    public function update(ProductReview $productReview, array $data): ProductReview
    {
        $productReview->varName = $data['varName'];
        $productReview->intProductID = $data['intProductID'];
        $productReview->intRating = $data['intRating'];
        $productReview->intReviewID = $data['intReviewID'];
        $productReview->varComment = $data['varComment'];

        $productReview->save();

        return $productReview;
    }

    /**
     * @inheritdoc
     * @return ProductReview|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $intReviewID): ?ProductReview
    {
        return ProductReview::query()->find($intReviewID);
    }

    /**
     * @inheritdoc
     */
    public function delete(int $intReviewID): void
    {
        ProductReview::query()
            ->where('intReviewID','=', $intReviewID)
            ->delete()
        ;
    }

}
