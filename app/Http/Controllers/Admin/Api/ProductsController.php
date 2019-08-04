<?php

namespace App\Http\Controllers\Admin\Api;

use App\DTO\PaginationDTO;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductsController
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductsController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
}
