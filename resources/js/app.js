
window.$ = window.jQuery = require('jquery');
require('jquery-nice-select');
require('isotope-layout/dist/isotope.pkgd.min');
require('tooltipster/dist/js/tooltipster.bundle.min');
require('smoothscroll-for-websites/SmoothScroll');


import Swiper from 'swiper';

$(document).ready(function() {

    $('select').niceSelect();

    $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 50,
        theme: 'tooltipster-noir'
    });

    let mySwiper = new Swiper('.swiper-container', {
        speed: 400,
        spaceBetween: 100,
        autoplay: true
    });

// isotope grid
    let $grid = $('.grid').isotope({
        itemSelector: '.element-item, .shop-item',
        layoutMode: 'fitRows',
        getSortData: {
            name: '.name',
            symbol: '.symbol',
            number: '.number parseInt',
            category: '[data-category]',
            weight: function( itemElem ) {
                let weight = $( itemElem ).find('.weight').text();
                return parseFloat( weight.replace( /[\(\)]/g, '') );
            }
        }

    });

// filter functions
    let filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function() {
            let number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
        },
        // show if name ends with -ium
        ium: function() {
            let name = $(this).find('.name').text();
            return name.match( /ium$/ );
        }
    };

// bind filter button click
    $('#filters').on( 'click', 'button', function() {
        let filterValue = $( this ).attr('data-filter');
        // use filterFn if matches value
        filterValue = filterFns[ filterValue ] || filterValue;
        $grid.isotope({ filter: filterValue });
    });

// bind sort button click
    $('#sorts').on( 'click', 'button', function() {
        let sortByValue = $(this).attr('data-sort-by');
        $grid.isotope({ sortBy: sortByValue });
    });

// change is-checked class on buttons
    $('.filters-buttons').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
        });
    });

// tabs
    $("ul.tabs__caption").on("click", "li:not(.active)", function () {
        $(this)
            .addClass("active")
            .siblings()
            .removeClass("active")
            .closest("div.wrap-tabs")
            .find("div.tabs__content")
            .removeClass("active")
            .eq($(this).index())
            .addClass("active")
        ;

    });

});

$('.catalog-sort-filter').on('click', function () {
    let sort = $(this).data('sort');

    window.location.href = window.location.origin + window.location.pathname + '?orderBy=' + sort;
});

// counter //

$('.count').each(function () {
    var $this = $(this);
    jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
        duration: 2500,
        easing: 'swing',
        step: function () {
            $this.text(Math.ceil(this.Counter));
        }
    });
});

// counter //

// // modal open subscribe //
//
// setTimeout(function(){
//     $('.wrap-modals').addClass('_open')
//     $('body').css('overflow', 'hidden')
// }, 3000);

// modal open subscribe //

// close modals //
$(document).ready(function () {
    $('.close-modal').on('click', function (e) {
        e.preventDefault();
        $('.wrap-modals').removeClass('_open');
        $('body').css('overflow', 'initial')
    });
});


// close modals //


if (document.getElementsByClassName('start-video').length > 0) {
    let tag = document.createElement('script');
    tag.src = "//www.youtube.com/iframe_api";

    let firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    let player;

    let dataSrc = document.getElementById("player").getAttribute("data-id");

    window.onYouTubeIframeAPIReady = function () {
        player = new YT.Player('player', {
            height: '100%',
            width: '100%',
            videoId: dataSrc,  // youtube video id
            playerVars: {
                'autoplay': 0,
                'rel': 0,
                'showinfo': 0
            },
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    };

    let p = document.getElementById ('player');
    $(p).hide();

    let t = document.getElementById ('thumbnail');
    t.src = t.getAttribute("data-src");

    window.onPlayerStateChange = function (event) {
        if (event.data === YT.PlayerState.ENDED) {
            $('.start-video').fadeIn('normal');
        }
    };

    $(document).on('click', '.start-video', function () {
        $(this).hide();
        $("#player").show();
        $("#thumbnail_container").hide();
        player.playVideo();
    });
}




