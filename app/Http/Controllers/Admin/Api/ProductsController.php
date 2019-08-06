<?php

namespace App\Http\Controllers\Admin\Api;

use App\DTO\PaginationDTO;
use App\Models\Product;
use App\Repository\ProductRepositoryInterface;
use App\Repository\ProductReviewRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class ProductsController
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var ProductReviewRepositoryInterface
     */
    private $productReviewRepository;

    /**
     * ProductsController constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param ProductReviewRepositoryInterface $productReviewRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository, ProductReviewRepositoryInterface $productReviewRepository)
    {
        $this->productRepository = $productRepository;
        $this->productReviewRepository = $productReviewRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listOfProducts(Request $request): JsonResponse
    {
        $page = $request->query->getInt('page',1);
        $perPage = $request->query->getInt('perPage',30);

        $paginationDTO = new PaginationDTO($page, $perPage);

        $productPagination = $this->productRepository->paginateWithCategory($paginationDTO);

        return new JsonResponse([
            'data' => [
                'products' => $productPagination->items(),
                'pagination' => [
                    'count' => $productPagination->lastPage(),
                    'currentPage' => $productPagination->currentPage(),
                ],
                'imagePrefix' => '/storage/images/',
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $dataProduct = $request->request->get('product');

        $validator = Validator::make($dataProduct, [
            'varName' => 'required|max:255|unique:products',
            'intCatID' => 'required|exists:categories,intCatID',
            'varLink' => 'required|url',
            'varPrice' => 'required|numeric',
            'isEnabled' => 'required|boolean',
            'isNew' => 'required|boolean',
            'isCheapest' => 'required|boolean',
            'isBestSelling' => 'required|boolean',
        ]);

        $dataProduct['varSlug'] = Str::slug($dataProduct['varName']);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $product = $this->productRepository->create($dataProduct);

        $reviewsIds = (array) $request->request->get('reviewsIds', []);

        $this->productReviewRepository->setProductID($reviewsIds, $product->intProductID);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.products.edit', [
                    'intProductID' => $product->intProductID,
                ]),
                'product' => $product,
            ],
        ]);
    }

    /**
     * @param int $intProductID
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $intProductID, Request $request): JsonResponse
    {
        /** @var Product $product */
        $product = Product::query()->findOrFail($intProductID);

        $dataProduct = $request->request->get('product');

        $validator = Validator::make($dataProduct, [
            'varName' => 'required|max:255|unique:products,varName,' . $product->intProductID . ',intProductID',
            'intCatID' => 'required|exists:categories,intCatID',
            'varLink' => 'required|url',
            'varPrice' => 'required|numeric',
            'isEnabled' => 'required|boolean',
            'isNew' => 'required|boolean',
            'isCheapest' => 'required|boolean',
            'isBestSelling' => 'required|boolean',
        ]);

        $dataProduct['varSlug'] = Str::slug($dataProduct['varName']);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $this->productRepository->update($product, $dataProduct);

        $reviewsIds = (array) $request->request->get('reviewsIds', []);

        $this->productReviewRepository->setProductID($reviewsIds, $product->intProductID);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.products.edit', [
                    'intProductID' => $product->intProductID,
                ]),
                'product' => $product,
            ],
        ]);
    }

    /**
     * @param int $intProductID
     * @return JsonResponse
     */
    public function find(int $intProductID): JsonResponse
    {
        $product = $this->productRepository->find($intProductID);

        return new JsonResponse([
            'data' => [
                'product' => $product,
            ]
        ]);
    }
}
