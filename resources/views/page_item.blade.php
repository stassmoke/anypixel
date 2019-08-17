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
                            <div id="player" data-id="GOp3Nhzfr-I"></div>
                            <div id="thumbnail_container" class="thumbnail_container">
                                <img class="thumbnail" id="thumbnail"
                                     data-src="/img/background/Creative Slideshow Preview Image.jpg"/>
                            </div>

                            <a class="start-video">
                                <img class="preview-img" width="64"
                                     src="http://image.flaticon.com/icons/png/512/0/375.png"
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
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Haec quo modo
                                        conveniant, non sane intellego. Hanc ergo intuens debet institutum illud quasi
                                        signum absolvere. Et ille ridens: Video, inquit, quid agas; Duo Reges:
                                        constructio interrete. Ad eos igitur converte te, quaeso. Atque haec ita
                                        iustitiae propria sunt, ut sint virtutum reliquarum communia.
                                    </p>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        ‘Content here, content here’, making it look like readable English. Many desktop
                                        publishing packages and web page editors now use Lorem Ipsum as their default
                                        model text, and a search for ‘lorem ipsum’ will uncover many web sites still in
                                        their infancy. Various versions have evolved over the years, sometimes by
                                        accident, sometimes on purpose.
                                    </p>
                                    <h4>
                                        Features
                                    </h4>
                                    <ul>
                                        <li>
                                            Software – WordPress
                                        </li>
                                        <li>
                                            Compatible Browsers – IE9+, Chrome, Safari, Opera, Firefox
                                        </li>
                                        <li>
                                            Documentation – Yes
                                        </li>
                                        <li>
                                            License – GPL
                                        </li>
                                        <li>
                                            Version – 1.0.1
                                        </li>
                                        <li>
                                            Layout – Responsive
                                        </li>
                                        <li>
                                            Columns – 4
                                        </li>
                                        <li>
                                            Files Included – php, html, JS, css
                                        </li>
                                        <li>
                                            Compatible with – Elementor
                                        </li>
                                    </ul>
                                    <div>
                                        <p>
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                            for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum
                                            et Malorum” by Cicero are also reproduced in their exact original form,
                                            accompanied by English versions from the 1914 translation by H. Rackham.
                                        </p>
                                        <h4>
                                            Sources and Credits:
                                        </h4>
                                        <ul>
                                            <li>
                                                <a href="#">Bootstrap v4.0.0</a>
                                            </li>
                                            <li><a href="#">
                                                    jQuery v3.3.1
                                                </a></li>
                                            <li><a href="#">
                                                    Animate CSS
                                                </a></li>
                                            <li><a href="#">
                                                    FontAwesome
                                                </a></li>
                                            <li><a href="#">
                                                    Smoothscroll
                                                </a></li>
                                            <li><a href="#">
                                                    Parallax
                                                </a></li>
                                            <li><a href="#">
                                                    Owl carosel
                                                </a></li>
                                            <li><a href="#">
                                                    isotop
                                                </a></li>
                                            <li><a href="#">
                                                    Waypoints
                                                </a></li>
                                            <li><a href="#">
                                                    Countdown
                                                </a></li>
                                            <li><a href="#">
                                                    sPreoader
                                                </a></li>
                                        </ul>
                                        <strong>
                                            Note: Images are not included with the main files. They are used for preview purposes only
                                        </strong>
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
