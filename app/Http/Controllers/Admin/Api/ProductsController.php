<?php

namespace App\Http\Controllers\Admin\Api;

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

    }
}
