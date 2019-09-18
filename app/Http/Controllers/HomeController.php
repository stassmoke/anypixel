<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\CounterRepositoryInterface;
use App\Repository\HomepageReviewRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Repository\SocialRepositoryInterface;
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
     * @var SocialRepositoryInterface
     */
    private $socialRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductRepositoryInterface $productRepository
     * @param HomepageReviewRepositoryInterface $homepageReviewRepository
     * @param CounterRepositoryInterface $counterRepository
     * @param SocialRepositoryInterface $socialRepository
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        HomepageReviewRepositoryInterface $homepageReviewRepository,
        CounterRepositoryInterface $counterRepository,
        SocialRepositoryInterface $socialRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->homepageReviewRepository = $homepageReviewRepository;
        $this->counterRepository = $counterRepository;
        $this->socialRepository = $socialRepository;
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

        $socials = $this
            ->socialRepository
            ->getSorted()
        ;

        return \view('home.index', [
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'reviews' => $reviews,
            'counters' => $counters,
            'socials' => $socials,
        ]);
    }
}
