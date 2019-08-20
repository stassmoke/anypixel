<?php

namespace App\Http\Controllers;

use App\DTO\PaginationDTO;
use App\DTO\SortByDTO;
use App\Filter\ProductFilterInterface;
use App\Models\Product;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CatalogController
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
     * @var ProductFilterInterface
     */
    private $productFilter;

    /**
     * CatalogController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductRepositoryInterface $productRepository
     * @param ProductFilterInterface $productFilter
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        ProductFilterInterface $productFilter
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productFilter = $productFilter;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $categories = $this->categoryRepository->getEnabledSorted();

        $filter = array_filter($request->query->all());

        $productQuery = Product::query();

        $sortByDTO = new SortByDTO(
            $request->query->get('orderBy','isNew'),
            'DESC'
        );

        $filterQuery = $this->productFilter->filter($productQuery, $sortByDTO, $filter);

        $paginateDTO = new PaginationDTO(
            $request->query->getInt('page'),
            9
        );

        $products = $this->productRepository->paginateEnabledQuery($filterQuery, $paginateDTO)->appends($filter);

        return \view('catalog.index', [
            'categories' => $categories,
            'products' => $products,
            'filter' => $filter,
            'sortBy' => $sortByDTO,
            'titlePage' => 'Shop'
        ]);
    }

    /**
     * @param string $varLink
     * @param Request $request
     * @return View
     */
    public function category(string $varLink, Request $request): View
    {
        $category = $this->categoryRepository->findEnabledByLink($varLink);

        if ($category === null) {
            throw new NotFoundHttpException();
        }

        $categories = $this->categoryRepository->getEnabledSorted();

        $filter = array_filter($request->query->all());

        $filter['intCatID'] = $category->intCatID;

        $productQuery = Product::query();

        $sortByDTO = new SortByDTO(
            $request->query->get('orderBy','isNew'),
            'DESC'
        );

        $filterQuery = $this->productFilter->filter($productQuery, $sortByDTO, $filter);

        $paginateDTO = new PaginationDTO(
            $request->query->getInt('page'),
            9
        );

        $products = $this->productRepository->paginateEnabledQuery($filterQuery, $paginateDTO)->appends($filter);

        return \view('catalog.index', [
            'categories' => $categories,
            'products' => $products,
            'filter' => $filter,
            'sortBy' => $sortByDTO,
            'titlePage' => $category->varName
        ]);
    }
}
