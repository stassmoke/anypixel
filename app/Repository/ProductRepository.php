<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function paginateWithCategory(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        return Product::query()
            ->with(['category:intCatID,varName'])
            ->paginate($paginationDTO->getPerPage(), ['*'],'page', $paginationDTO->getPage())
        ;
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): Product
    {
        $product = new Product();

        return $this->update($product, $data);
    }

    /**
     * @inheritdoc
     */
    public function update(Product $product, array $data): Product
    {
        $product->intCatID = $data['intCatID'];
        $product->varName = $data['varName'];
        $product->varSubtitle = $data['varSubtitle'];
        $product->varSlug = $data['varSlug'];
        $product->varLink = $data['varLink'];
        $product->varAuthor = $data['varAuthor'];
        $product->varMainImage = $data['varMainImage'];
        $product->varThumbnailImage = $data['varThumbnailImage'];
        $product->varDescription = $data['varDescription'];
        $product->varYoutubeCode = $data['varYoutubeCode'];
        $product->varPrice = $data['varPrice'];
        $product->intRating = $data['intRating'];
        $product->isEnabled = $data['isEnabled'];
        $product->isNew = $data['isNew'];
        $product->isCheapest = $data['isCheapest'];
        $product->isBestSelling = $data['isBestSelling'];
        $product->isLatest = $data['isLatest'];

        $product->save();

        return $product;
    }

    /**
     * @param int $intProductID
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|Product
     */
    public function find(int $intProductID): ?Product
    {
        return Product::query()->find($intProductID);
    }

    /**
     * @inheritdoc
     */
    public function getLatest(): Collection
    {
        return Product::query()
            ->where('isEnabled','=',true)
            ->where('isLatest','=', true)
            ->get()
        ;
    }

    /**
     * @param Builder $builder
     * @param PaginationDTO $paginationDTO
     * @return LengthAwarePaginator
     */
    public function paginateEnabledQuery(Builder $builder, PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        return $builder
            ->where('isEnabled','=',true)
            ->paginate($paginationDTO->getPerPage(), ['*'],'page', $paginationDTO->getPage())
        ;
    }

    /**
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|Product
     */
    public function findEnableBySlag(string $slug): ?Product
    {
        return Product::query()
            ->where('isEnabled','=',true)
            ->where('varSlug','=', $slug)
            ->first()
        ;
    }
}
