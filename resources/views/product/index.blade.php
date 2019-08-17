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
                            <a href="#" class="btn btn-fill btn-purchase">
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
