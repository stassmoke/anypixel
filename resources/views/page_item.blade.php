@extends('base')

@section('body')

    <div class="item-page">
        <div class="item-page__section--title">
            <div class="container">
                <h2>
                    Creative Slideshow
                </h2>
                <div class="item-page__section--subtitle">
                    Subtitle or label project
                </div>
            </div>
        </div>
        <section class="section-item__page--content">
            <div class="container">
                <div class="row-sides">
                    <div class="l-side">
                        <div class="wrap-video">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/GOp3Nhzfr-I?controls=0"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="r-side">
                        <div class="widget-price">
                            <div class="item-price">
                                $36.00
                            </div>
                            <a href="#" class="btn btn-fill btn-purchase">
                                $36.00 – Purchase
                            </a>
                            <div class="item-rating">
                                <span>Item Rating</span>
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>



@endsection
