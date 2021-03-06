@extends('base')

@section('body')
    
    <section class="section-banner">
        <div id="video-bg">
            <video width="100%" height="auto" preload loop muted autoplay poster="bg/daisy-stock-poster.jpg">
                <source src="/videos/bg.mp4" type="video/mp4"></source>
                <source src="/videos" type="video/webm"></source>
            </video>
        </div>
        <div class="container text-center">
            <div class="banner-content">
                <h1>
                    High Quality Templates for <br>
                    <span>After Effects & Premiere Pro</span>
                </h1>
                <p>
                    DigitalMarket is a powerful Digital Marketplace theme to Buy and Sell
                </p>
                <div class="search-form">
                    <form action="{{ route('catalog') }}" method="get">
                        <div class="search-form__flex">
                            <div class="search-form__filter">
                                <select name="intCatID" class="wide select-filter">
                                    <option value="" data-display="All Categories">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->intCatID }}">{{ $category->varName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="search-form__input">
                                <input name="term" type="text" placeholder="Search Template">
                                <div class="search-icon">
                                    <input type="submit">
                                    <div class="icon">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
                                             class="svg-inline--fa fa-search fa-w-16" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <a href="{{ route('catalog') }}" class="btn btn-fill">shop now</a>
                    <a href="#" class="btn btn-border">learn more</a>
                </div>
            </div>
        </div>
    </section>

    @if (\count($latestProducts) > 0)
        <section class="section-filter__product">
            <div class="container">
                <h2>
                    Latest Products
                </h2>
                <div id="filters" class="filters-buttons">
                    <button class="btn btn-filters is-checked" data-filter="*">All Items</button>
                    @foreach($categories as $category)
                        <button class="btn btn-filters" data-filter=".{{ $category->varLink }}">{{ $category->varName }}</button>
                    @endforeach
                </div>
                <div class="grid">
                    @foreach($latestProducts as $product)
                        <div class="element-item {{ optional($categories[$product->intCatID])->varLink ?? '' }} tooltip" data-category="{{ optional($categories[$product->intCatID])->varLink ?? '*' }}"
                             data-tooltip-content="#tooltip_product_{{ $product->intProductID }}">
                            <a class="element-item__link" href="{{ route('product',['varSlug' => $product->varSlug]) }}">
                                <img src="{{ $product->getThumbnailImage() }}" alt="{{ $product->varName }}" class="image"/>
                            </a>
                        </div>
                    @endforeach
                    <div class="tooltip_templates">
                        @foreach($latestProducts as $product)
                            <div id="tooltip_product_{{ $product->intProductID }}" class="custom-tooltip">
                                <img src="{{ $product->getMainImage() }}" alt="{{ $product->varName }}"/>
                                <div class="body-tooltip__item">
                                    <div class="tooltip-name">
                                        {{ $product->varName }}
                                    </div>
                                    @if(!empty($product->varAuthor))
                                        <div class="create-item">
                                            {{ $product->varAuthor }}
                                        </div>
                                    @endif
                                    @isset($categories[$product->intCatID])
                                        <div class="tag-item">
                                            {{ $categories[$product->intCatID]->varName }}
                                        </div>
                                    @endisset
                                    <div class="price-item">
                                        {{ number_format($product->varPrice, 2) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(\count($counters) > 0)
        <section class="section-product__sales">
            <h2>Satisfied Clients</h2>
            <div class="container">
                <div class="row-product__sales">
                    @foreach($counters as $counter)
                        <span class="item-sale">
                            <span class="count">{{ $counter->intValue }}</span>
                             <span class="inner-item__sale">{{ $counter->varName }}</span>
                        </span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(\count($reviews) > 0)
        <section class="section-reviews">
            <div class="container">
                <div class="swiper-container slider-reviews">
                    <div class="swiper-wrapper">
                        @foreach($reviews as $review)
                            <div class="swiper-slide slide-reviews">
                                <a href="#" class="wrap-content__slide">
                                    <div class="slide-text">
                                        {!! $review->varText !!}
                                    </div>
                                    <div class="reviews-name">
                                        {{ $review->varName }}
                                    </div>
                                    <div class="reviews-position">
                                        {{ $review->varPosition }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

@endsection
