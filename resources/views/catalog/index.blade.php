@extends('base')

@section('body')
    <div class="shop-page">
        <div class="breadcrumb-content">
            <div class="container">
                <h2>
                    Shop
                </h2>
                <div class="row-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-list">
                            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
                        </li>
                        <li class="breadcrumb-list">
                            <span class="breadcrumb-link">Shop</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="section-shop">
            <div id="filters" class="filters-buttons">
                <button class="catalog-category-filter btn btn-filters @if(empty($filter['intCatID']))is-checked @endif" data-filter="*">All Items</button>
                @foreach($categories as $category)
                    <button class="catalog-category-filter btn btn-filters @if((int) \Illuminate\Support\Arr::get($filter,'intCatID') === $category->intCatID)is-checked @endif" data-category="{{ $category->intCatID }}">{{ $category->varName }}</button>
                @endforeach
            </div>

            <div class="wrap-grid__nav">
                <div id="sorts" class="filters-buttons">
                    <button data-sort="isNew" class="catalog-sort-filter btn btn-filters _sort @if($sortBy->getColumn() === 'isNew')is-checked @endif">Newest Items</button>
                    <button data-sort="isCheapest" class="catalog-sort-filter btn btn-filters _sort @if($sortBy->getColumn() === 'isCheapest')is-checked @endif">Cheapest</button>
                    <button data-sort="isBestSelling" class="catalog-sort-filter btn btn-filters _sort @if($sortBy->getColumn() === 'isBestSelling')is-checked @endif">Best Selling</button>
                </div>
                <div class="grid grid-shop">
                    @foreach($products as $product)
                        <div class="shop-item after-effect">
                        <a href="{{ route('product',['varSlug' => $product->varSlug]) }}">
                            <div class="img-holder">
                                <img src="{{ $product->getMainImage() }}" alt="{{ $product->varName }}" class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="{{ route('product',['varSlug' => $product->varSlug]) }}" class="name">{{ $product->varName }}</a>
                            <div class="symbol">{{ $product->varSubtitle }}</div>
                            <div class="price-inline">
                                <div class="price">${{ number_format($product->varPrice, 2) }}</div>
                                <div class="rating" style="--rating-view: {{ $product->intRating * 20 }}%;">
                                    <img src="{{ asset('img/icons/rating-view.svg') }}" alt="{{ $product->varName }} Rating" class="rating-star">
                                </div>
                            </div>
                            <div class="additional-functions">
                                <a href="#" class="btn additional-functions__btn">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Details</span>
                                </a>
                                <a href="#" class="btn additional-functions__btn">
                                    <i class="far fa-eye"></i>
                                    <span>Demo</span>
                                </a>
                                <a href="#" class="btn additional-functions__btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @if ($products->lastPage() > 1)
                @include('catalog.pagination',['pagination' => $products])
            @endif

        </section>

    </div>

    <script src="{{ asset('js/CatalogFilter.js') }}"></script>

    <script>
        let catalogFilter = new CatalogFilter("{{ route('catalog') }}");

        catalogFilter.setFilters('{!! json_encode($filter) !!}');
    </script>

@endsection
