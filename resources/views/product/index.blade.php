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
                                <li>Comments</li>
                                <li>Reviews</li>
                                <li>Support</li>
                                <li>item FAQ</li>
                            </ul>
                            <div class="wrap-tab__content">
                                <div class="tabs__content active">
                                    {!! $product->varDescription !!}
                                    <div class="reviews-product">
                                        <div class="section-reviews__title">
                                            Reviews
                                        </div>
                                        <div class="reviews-product__one">
                                            <div class="head-reviews__product--one">
                                                <div class="rating" style="--rating-view: 50%">
                                                    <img src="{{ asset('img/icons/rating-view.svg') }}" alt="{{ $product->varName }} Rating" class="rating-star">
                                                </div>
                                                <div class="img-holder">
                                                    <img src="/img/background/Creative Slideshow Preview Image.jpg" alt="">
                                                </div>
                                                <div class="head-reviews__product--block">
                                                    <div class="reviewer-name">
                                                        Farhan Khan
                                                    </div>
                                                    <time datetime="2019-05-20T06:47:25+00:00" class="review-created">
                                                        May 20, 2019 at 6:47 am
                                                </div>
                                            </div>
                                            <div class="review-text">
                                                <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
                                            </div>
                                        </div>
                                        <form class="review-form">
                                            <div class="error-submit">
                                                You must log in to submit a review.
                                            </div>
                                            <div class="login-username">
                                                <label for="review-name">Username or Email Address</label>
                                                <input id="user-name" class="input-form" type="name" require>
                                            </div>
                                            <div class="login-password">
                                                <label for="user-pass">Password</label>
                                                <input id="user-pass" class="input-form" type="password" require>
                                            </div>
                                            <div class="user-remember">
                                                <label for="rememberme">
                                                    <input id="rememberme" type="checkbox"> Remember Me
                                                </label>
                                            </div>
                                            <div class="login-submit">
                                                <button type="submit" class="btn btn-fill">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tabs__content">
                                    Comments
                                </div>
                                <div class="tabs__content">
                                    Reviews
                                </div>
                                <div class="tabs__content">
                                    Support
                                </div>
                                <div class="tabs__content">
                                    item FAQ
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
