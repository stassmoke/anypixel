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
            <div id="sorts" class="filters-buttons">
                <button class="btn btn-filters is-checked" data-sort-by="name">name</button>
                <button class="btn btn-filters" data-sort-by="symbol">symbol</button>
                <button class="btn btn-filters" data-sort-by="category">category</button>
            </div>
            <div class="grid grid-shop">
                <div class="shop-item after-effect" data-category="after-effect">
                    <div class="img-holder">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/demo-7.jpg" alt="1" class="image">
                    </div>
                    <div class="shop-item__content">
                        <a href="#" class="name">Creative Slideshow</a>
                        <div class="symbol">Some filter</div>
                        <div class="price-inline">
                            <div class="price">$59.00</div>
                            <div class="rating">X X X X X</div>
                        </div>
                    </div>
                </div>
                <div class="shop-item premiere-pro" data-category="premiere-pro">

                    <p class="name">z</p>
                    <p class="symbol">Some filter</p>
                </div>
                <div class="shop-item after-effect" data-category="after-effect">

                    <p class="name">a</p>
                    <p class="symbol">Some filter</p>
                </div>
                <div class="shop-item premiere-pro" data-category="premiere-pro">

                    <p class="name">z</p>
                    <p class="symbol">5</p>
                </div>
                <div class="shop-item after-effect" data-category="after-effect">

                    <p class="name">a</p>
                    <p class="symbol">6</p>
                </div>
                <div class="shop-item premiere-pro" data-category="premiere-pro">

                    <p class="name">z</p>
                    <p class="symbol">7</p>
                </div>
                <div class="shop-item after-effect" data-category="after-effect">

                    <p class="name">a</p>
                    <p class="symbol">8</p>
                </div>
                <div class="shop-item premiere-pro" data-category="premiere-pro">

                    <p class="name">z</p>
                    <p class="symbol">9</p>
                </div>

            </div>
        </section>
    </div>

@endsection
