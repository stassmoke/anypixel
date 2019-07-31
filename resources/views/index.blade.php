@extends('base')

@section('body')
    <section class="section-banner">
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
                    <form>
                        <div class="search-form__flex">
                            <div class="search-form__filter">
                                <select class="wide select-filter">
                                    <option data-display="All Categories">All Categories</option>
                                    <option value="1">After Effects</option>
                                    <option value="2">Premiere Pro</option>
                                </select>
                            </div>
                            <div class="search-form__input">
                                <input name="search" value="" type="text" placeholder="Search Template">
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
                    <a href="#" class="btn btn-fill">shop now</a>
                    <a href="#" class="btn btn-border">learn more</a>
                </div>
                <ul class="banner-product">
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/anypixel-logo__nav.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section-advantages">
        <div class="container">
            <div class="advantages-items">
                <div class="advantages-item text-center">
                    <div class="img-holder">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
                             class="svg-inline--fa fa-lock fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 448 512">
                            <path fill="currentColor"
                                  d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path>
                        </svg>
                    </div>
                    <h4>Secure Transaction</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, quaerat! consectetur
                        adipisicing elit
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-filter__product">
        <div class="container">
            <h2>
                Latest Products
            </h2>
            <div id="filters" class="filters-buttons">
                <button class="btn btn-filters is-checked" data-filter="*">All Items</button>
                <button class="btn btn-filters" data-filter=".after-effect">After Effects</button>
                <button class="btn btn-filters" data-filter=".premiere-pro">Premiere Pro</button>
            </div>
            <div class="grid">
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="img/Dynamic Intro Thumbnail.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item premiere-pro tooltip" data-category="premiere-pro"
                     data-tooltip-content="#tooltip_content1">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
                <div class="element-item after-effect tooltip" data-category="after-effect"
                     data-tooltip-content="#tooltip_content">
                    <a class="element-item__link" href="#">
                        <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb-1-3.jpg" alt="image"
                             class="image"/>
                    </a>
                </div>
            </div>
            <div class="tooltip_templates">
                <div id="tooltip_content" class="custom-tooltip">
                    <img src="img/Dynamic Intro Preview Image.jpg" alt=""/>
                    <div class="body-tooltip__item">
                        <div class="tooltip-name">
                            Nick After Effects Project
                        </div>
                        <div class="create-item">
                            Nick Chvalun
                        </div>
                        <div class="tag-item">
                            After Effect
                        </div>
                        <div class="price-item">
                            52.00
                        </div>
                    </div>
                </div>
                <div id="tooltip_content1" class="custom-tooltip">
                    <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/thumb.jpg" alt=""/>
                    <div class="body-tooltip__item">
                        <div class="tooltip-name">
                            Nick Premiere Pro Project
                        </div>
                        <div class="create-item">
                            Nick Chvalun
                        </div>
                        <div class="tag-item">
                            Premiere Pro
                        </div>
                        <div class="price-item">
                            28.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-reviews"
             style="background: url('http://themeplace.codecorns.com/wp-content/uploads/2019/07/testimonial.jpg') center no-repeat">
        <div class="container">
            <div class="swiper-container slider-reviews">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide-reviews">
                        <div class="reviews-holder">
                            <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/t-2.jpg" alt="" class="image">
                        </div>
                        <div class="wrap-content__slide">
                            <p class="slide-text">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.
                            </p>
                            <div class="reviews-name">
                                Jhon Doe
                            </div>
                            <div class="reviews-position">
                                Java Developer
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide slide-reviews">
                        <div class="reviews-holder">
                            <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/t-3.jpg" alt="" class="image">
                        </div>
                        <div class="wrap-content__slide">
                            <p class="slide-text">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.
                            </p>
                            <div class="reviews-name">
                                Jhon Doe
                            </div>
                            <div class="reviews-position">
                                Java Developer
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide slide-reviews">
                        <div class="reviews-holder">
                            <img src="http://themeplace.codecorns.com/wp-content/uploads/2019/05/t-1.jpg" alt="" class="image">
                        </div>
                        <div class="wrap-content__slide">
                            <p class="slide-text">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.
                            </p>
                            <div class="reviews-name">
                                Jhon Doe
                            </div>
                            <div class="reviews-position">
                                Java Developer
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
