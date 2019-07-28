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
                Newly Added
            </h2>
            <p class="heading-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since.
            </p>
        </div>
    </section>

@endsection
