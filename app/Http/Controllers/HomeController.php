<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\HomepageReviewRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use Illuminate\View\View;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var HomepageReviewRepositoryInterface
     */
    private $homepageReviewRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductRepositoryInterface $productRepository
     * @param HomepageReviewRepositoryInterface $homepageReviewRepository
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        HomepageReviewRepositoryInterface $homepageReviewRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->homepageReviewRepository = $homepageReviewRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $categories = $this
            ->categoryRepository
            ->getEnabledSorted()
            ->keyBy('intCatID')
        ;

        $latestProducts = $this
            ->productRepository
            ->getLatest()
        ;

        $reviews = $this
            ->homepageReviewRepository
            ->getEnabledSorted()
        ;

        return \view('index', [
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'reviews' => $reviews,
        ]);
    }
}
