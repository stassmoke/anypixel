<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\CounterRepositoryInterface;
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
     * @var CounterRepositoryInterface
     */
    private $counterRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductRepositoryInterface $productRepository
     * @param HomepageReviewRepositoryInterface $homepageReviewRepository
     * @param CounterRepositoryInterface $counterRepository
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        HomepageReviewRepositoryInterface $homepageReviewRepository,
        CounterRepositoryInterface $counterRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->homepageReviewRepository = $homepageReviewRepository;
        $this->counterRepository = $counterRepository;
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

        $counters = $this
            ->counterRepository
            ->getEnabledSorted()
        ;

        return \view('home.index', [
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'reviews' => $reviews,
            'counters' => $counters,
        ]);
    }
}
