 (function($) {

function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top - 200;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function () {
    $('.animation').each(function () {
        if (isScrolledIntoView(this) === true) {
            $('.menu-wrapper').addClass('visible');
        }
    });

});

$(window).scroll(function () {
    $('.bg.home').each(function () {
        if (isScrolledIntoView(this) === true) {
            $('.red-col-wrapper').addClass('visible');
        }
    });

});
$(window).scroll(function () {
    $('.half-bg.animation').each(function () {
        if (isScrolledIntoView(this) === true) {
            $('.slide-in').addClass('visible');
        }
    });

});

$(window).scroll(function () {
    $('.about.animation').each(function () {
        if (isScrolledIntoView(this) === true) {
            $('.slide-right').addClass('visible');
        }
    });

});

})( jQuery );