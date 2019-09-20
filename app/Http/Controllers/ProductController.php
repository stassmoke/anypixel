<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepositoryInterface;
use App\Repository\ProductReviewRepositoryInterface;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController
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
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param ProductReviewRepositoryInterface $productReviewRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductReviewRepositoryInterface $productReviewRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->productReviewRepository = $productReviewRepository;
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

        $reviews = $this
            ->productReviewRepository
            ->findByProductID($product->intProductID)
        ;

        return view('product.index', [
            'product' => $product,
            'titlePage' => $product->varName,
            'reviews' => $reviews,
        ]);
    }
}
