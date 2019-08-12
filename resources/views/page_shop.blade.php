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
                            <a href="/" class="breadcrumb-link">Home</a>
                        </li>
                        <li class="breadcrumb-list">
                            <a href="#" class="breadcrumb-link">Shop</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="section-shop">
            <div id="filters" class="filters-buttons">
                <button class="btn btn-filters is-checked" data-filter="*">All Items</button>
                <button class="btn btn-filters" data-filter=".after-effect">After Effects</button>
                <button class="btn btn-filters" data-filter=".premiere-pro">Premiere Pro</button>
            </div>

            <div class="wrap-grid__nav">
                <div id="sorts" class="filters-buttons">
                    <button class="btn btn-filters is-checked _sort" data-sort-by="name">name</button>
                    <button class="btn btn-filters _sort" data-sort-by="symbol">symbol</button>
                    <button class="btn btn-filters _sort" data-sort-by="category">category</button>
                </div>
                <div class="grid grid-shop">
                    <div class="shop-item after-effect" data-category="after-effect">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item premiere-pro" data-category="premiere-pro">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item after-effect" data-category="after-effect">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item premiere-pro" data-category="premiere-pro">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item after-effect" data-category="after-effect">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item premiere-pro" data-category="premiere-pro">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item after-effect" data-category="after-effect">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                    <div class="shop-item premiere-pro" data-category="premiere-pro">
                        <a href="#">
                            <div class="img-holder">
                                <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1"
                                     class="image">
                            </div>
                        </a>
                        <div class="shop-item__content">
                            <a href="#" class="name">Creative Slideshow</a>
                            <div class="symbol">Some filter</div>
                            <div class="price-inline">
                                <div class="price">$59.00</div>
                                {{--variable (rating-view) adjusts the stars--}}
                                <div class="rating" style="--rating-view: 63%;">
                                    <img src="img/icons/rating-view.svg" alt="" class="rating-star">
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
                </div>
            </div>
            <div class="row-pagination">
                <div class="pagination">
                    <a href="#" class="prev page-numbers">←</a>
                    <a href="" class="page-numbers _active">1</a>
                    <a href="" class="page-numbers">2</a>
                    <a href="" class="page-numbers">3</a>
                    <a href="#" class="next page-numbers">→</a>
                </div>
            </div>
        </section>
    </div>

@endsection
