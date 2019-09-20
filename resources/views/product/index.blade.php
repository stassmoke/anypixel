@extends('base')

@section('body')

    <div class="item-page">
        <div class="item-page__section--title">
            <div class="container">
                <h2>
                    {{ $product->varName }}
                </h2>
                <div class="item-page__section--subtitle">
                    {{ $product->varSubtitle }}
                </div>
            </div>
        </div>
        <section class="section-item__page--content">
            <div class="container">
                <div class="row-sides">
                    <div class="l-side">
                        <div class="wrap-video">
                            <div id="player" data-id="{{ $product->varYoutubeCode }}"></div>
                            <div id="thumbnail_container" class="thumbnail_container">
                                <img class="thumbnail" id="thumbnail"
                                     data-src="{{ $product->getMainImage() }}"/>
                            </div>

                            <a class="start-video">
                                <img class="preview-img" width="64"
                                     src="{{ asset('img/icons/play.png') }}"
                                     style="filter: invert(100%); -webkit-filter: invert(100%);">
                            </a>
                        </div>
                        <div class="wrap-tabs">
                            <ul class="tabs__caption">
                                <li class="active">Item Details</li>
                            </ul>
                            <div class="wrap-tab__content">
                                <div class="tabs__content active">
                                    {!! $product->varDescription !!}
                                    <a href="{{ $product->varLink }}" target="_blank" class="btn btn-fill btn-purchase">
                                        ${{ number_format($product->varPrice,2) }} – Purchase
                                    </a>
                                    @if (\count($reviews) > 0)
                                        <div class="reviews-product">
                                            <div class="section-reviews__title">
                                                Reviews
                                            </div>
                                            @foreach($reviews as $review)
                                                <div class="reviews-product__one">
                                                    <div class="head-reviews__product--one">
                                                        <div class="rating" style="--rating-view: {{ $review->intRating * 20 }}%">
                                                            <img src="{{ asset('img/icons/rating-view.svg') }}" alt="{{ $product->varName }} Rating" class="rating-star">
                                                        </div>
                                                        <div class="img-holder">
                                                            <img src="/img/background/Creative Slideshow Preview Image.jpg" alt="">
                                                        </div>
                                                        <div class="head-reviews__product--block">
                                                            <div class="reviewer-name">
                                                                {{ $review->varName }}
                                                            </div>
                                                            <time datetime="2019-05-20T06:47:25+00:00" class="review-created">
                                                                {{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y h:i a') }}
                                                            </time>
                                                        </div>
                                                    </div>
                                                    <div class="review-text">
                                                        <p>{!! $review->varComment !!}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="r-side">
                        <div class="widget-price">
                            <div class="item-price">
                                ${{ number_format($product->varPrice,2) }}
                            </div>
                            <a href="{{ $product->varLink }}" target="_blank" class="btn btn-fill btn-purchase">
                                ${{ number_format($product->varPrice,2) }} – Purchase
                            </a>
                            <div class="item-rating">
                                <span>Item Rating</span>
                                <div class="rating" style="--rating-view: {{ $product->intRating * 20 }}%;">
                                    <img src="{{ asset('img/icons/rating-view.svg') }}" alt="{{ $product->varName }} Rating" class="rating-star">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
