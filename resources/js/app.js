
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
    // $.smoothScroll({
    //     stepSize: 1000,
    //     accelerationDelta : 10,
    //     animationTime    : 1000,
    // });


    let mySwiper = new Swiper('.swiper-container', {
        speed: 400,
        spaceBetween: 100,
        autoplay: true
    });

});




let $grid = $('.grid').isotope({
    itemSelector: '.element-item',
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



