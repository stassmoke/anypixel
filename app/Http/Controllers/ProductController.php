<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepositoryInterface;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param string $varSlug
     * @return View
     */
    public function index(string $varSlug): View
    {
        $product = $this->productRepository->findEnableBySlag($varSlug);

        if ($product === null) {
            throw new NotFoundHttpException();
        }

        return view('product.index', [
            'product' => $product,
            'titlePage' => $product->varName
        ]);
    }
}
