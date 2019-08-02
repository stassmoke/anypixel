<?php

namespace App\Http\Controllers\Admin\Api;


use App\Repository\HomepageReviewRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageReviewsController
{
    /**
     * @var HomepageReviewRepositoryInterface
     */
    private $homepageReviewRepository;

    /**
     * HomepageReviewsController constructor.
     * @param HomepageReviewRepositoryInterface $homepageReviewRepository
     */
    public function __construct(HomepageReviewRepositoryInterface $homepageReviewRepository)
    {
        $this->homepageReviewRepository = $homepageReviewRepository;
    }

    /**
     * @return JsonResponse
     */
    public function listOfReviews(): JsonResponse
    {
        $reviews = $this->homepageReviewRepository->getSorted();

        return new JsonResponse([
            'data' => [
                'reviews' => $reviews,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function saveSort(Request $request): JsonResponse
    {
        $reviews = (array) $request->request->get('reviews', []);

        foreach ($reviews as $index => $intReviewID) {
            $this->homepageReviewRepository->updateOrder($intReviewID, $index);
        }

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param int $intReviewID
     * @return JsonResponse
     */
    public function delete(int $intReviewID): JsonResponse
    {
        $this->homepageReviewRepository->delete($intReviewID);

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->request->get('review');

        $dataReview = [
            'varName' => $data['varName'],
            'intOrder' => $this->homepageReviewRepository->getLastSortIndex() + 1,
            'varLink' => $data['varLink'],
            'isEnabled' => $data['isEnabled'],
            'varText' => $data['varText'],
            'varPosition' => $data['varPosition'],
        ];

        $validator = Validator::make($dataReview, [
            'varName' => 'required|max:255',
            'varPosition' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $review = $this->homepageReviewRepository->createFromArray($dataReview);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.homepage-reviews.edit', [
                    'intReviewID' => $review->intReviewID,
                ]),
                'review' => $review,
            ],
        ]);
    }

    /**
     * @param int $intReviewID
     * @return JsonResponse
     */
    public function find(int $intReviewID): JsonResponse
    {
        $review = $this->homepageReviewRepository->find($intReviewID);

        return new JsonResponse([
            'data' => [
                'review' => $review,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @param int $intReviewID
     * @return JsonResponse
     */
    public function update(Request $request, int $intReviewID): JsonResponse
    {
        $review = $this->homepageReviewRepository->find($intReviewID);

        if ($review === null) {
            return new JsonResponse([
                'data' => [
                    'error' => 'Review not found',
                ]
            ], Response::HTTP_BAD_REQUEST);
        }

        $data = $request->request->get('review');

        $dataReview = [
            'varName' => $data['varName'],
            'varLink' => $data['varLink'],
            'isEnabled' => $data['isEnabled'],
            'varText' => $data['varText'],
            'varPosition' => $data['varPosition'],
        ];

        $validator = Validator::make($dataReview, [
            'varName' => 'required|max:255',
            'varPosition' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $review = $this->homepageReviewRepository->update($review, $dataReview);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.homepage-reviews.edit', [
                    'intReviewID' => $review->intReviewID,
                ]),
                'review' => $review,
            ],
        ]);
    }
}
