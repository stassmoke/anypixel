<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\ProductReview;
use App\Repository\ProductReviewRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductReviewsController
{
    /**
     * @var ProductReviewRepositoryInterface
     */
    private $productReviewRepository;

    /**
     * ProductReviewsController constructor.
     * @param ProductReviewRepositoryInterface $productReviewRepository
     */
    public function __construct(ProductReviewRepositoryInterface $productReviewRepository)
    {
        $this->productReviewRepository = $productReviewRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $intProductID = $request->request->get('intProductID');

        $reviewData = $request->request->get('review');
        $reviewData['intProductID'] = $intProductID;

        $review = $this->productReviewRepository->create($reviewData);

        return new JsonResponse([
            'data' => [
                'review' => $review->toArray(),
            ]
        ]);
    }

    /**
     * @param int $intReviewID
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $intReviewID, Request $request): JsonResponse
    {
        $intProductID = $request->request->get('intProductID');

        $reviewData = $request->request->get('review');
        $reviewData['intProductID'] = $intProductID;

        /** @var ProductReview $review */
        $review = $this->productReviewRepository->find($intReviewID);

        $review = $this->productReviewRepository->update($review, $reviewData);

        return new JsonResponse([
            'data' => [
                'review' => $review->toArray(),
            ]
        ]);
    }

    /**
     * @param int $intReviewID
     * @return JsonResponse
     */
    public function delete(int $intReviewID): JsonResponse
    {
        $this->productReviewRepository->delete($intReviewID);

        return new JsonResponse([
            'data' => [
                'success' => true,
            ]
        ]);
    }
}
