<?php

namespace App\Http\Controllers\Admin\Api;

use App\Repository\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoriesController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return JsonResponse
     */
    public function listOfCategories(): JsonResponse
    {
        $categories = $this->categoryRepository->getSorted();

        return new JsonResponse([
            'data' => [
                'categories' => $categories,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function saveSort(Request $request): JsonResponse
    {
        $categories = (array) $request->request->get('categories', []);

        foreach ($categories as $index => $intCatID) {
            $this->categoryRepository->updateCatOrder($intCatID, $index);
        }

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param int $intCatID
     * @return JsonResponse
     */
    public function delete(int $intCatID): JsonResponse
    {
        $this->categoryRepository->delete($intCatID);

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
        $data = $request->request->get('category');

        $dataCategory = [
            'varName' => $data['varName'],
            'intOrder' => $this->categoryRepository->getLastSortIndex() + 1,
            'varLink' => Str::slug($data['varName']),
            'isEnabled' => $data['isEnabled'],
        ];

        $validator = Validator::make($dataCategory, [
            'varName' => 'required|unique:categories|max:255',
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $category = $this->categoryRepository->createFromArray($dataCategory);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.categories.edit', [
                    'intCatID' => $category->intCatID,
                ]),
                'category' => $category,
            ],
        ]);
    }

    /**
     * @param int $intCatID
     * @return JsonResponse
     */
    public function find(int $intCatID): JsonResponse
    {
        $category = $this->categoryRepository->find($intCatID);

        return new JsonResponse([
            'data' => [
                'category' => $category,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @param int $intCatID
     * @return JsonResponse
     */
    public function update(Request $request, int $intCatID): JsonResponse
    {
        $category = $this->categoryRepository->find($intCatID);

        if ($category === null) {
            return new JsonResponse([
                'data' => [
                    'error' => 'Category not found',
                ]
            ], Response::HTTP_BAD_REQUEST);
        }

        $data = $request->request->get('category');

        $dataCategory = [
            'varName' => $data['varName'],
            'varLink' => Str::slug($data['varName']),
            'isEnabled' => $data['isEnabled'],
        ];

        $validator = Validator::make($dataCategory, [
            'varName' => 'required|max:255|unique:categories,varName,' . $category->intCatID . ',intCatID',
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $category = $this->categoryRepository->update($category, $dataCategory);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.categories.edit', [
                    'intCatID' => $category->intCatID,
                ]),
                'category' => $category,
            ],
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function getForOptions(): JsonResponse
    {
        return new JsonResponse([
            'data' => [
                'categories' => $this->categoryRepository->getForOptions(),
            ]
        ]);
    }
}
