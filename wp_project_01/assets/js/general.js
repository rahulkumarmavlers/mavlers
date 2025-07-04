'use strict';
var $ = jQuery.noConflict();

/*script for mac*/
document.addEventListener("DOMContentLoaded", function () {
    if (/Mobi|Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        document.body.classList.add("real-mobile-device");
    }
});

if (navigator.userAgent.indexOf('Mac') !== -1) {
    document.body.classList.add('mac-os');
}
/*script for mac end*/


document.addEventListener("DOMContentLoaded", function () {

    window.addEventListener('scroll', function () {
        const header = document.querySelector('.site-header');
        const scrollPosition = window.scrollY || document.documentElement.scrollTop;

        if (scrollPosition > 100) { // Adjust the scroll threshold as needed
            header.classList.add('is-sticky');
        } else {
            header.classList.remove('is-sticky');
        }
    });


    var testimonialImage = document.querySelectorAll('.js-testimonials-slider');
    var testimonialImageLength = $(testimonialImage).find('.testimonials-item').length > 1;
    // console.log(teamSliderLength)
    // console.log(testimonialImageLength);

    if (testimonialImage.length > 0) {
        if (testimonialImageLength) {
            testimonialImage.forEach(function (elem) {
                new Flickity(elem, {
                    contain: true,
                    pageDots: false,
                    prevNextButtons: true,
                    autoPlay: false,//$(testimonialImage).find('.testimonials-item').length > 1,
                    wrapAround: true,
                    draggable: $(testimonialImage).find('.testimonials-item').length > 1,
                    // Responsive settings can be added here
                });
            });
        }
    }

    var retailersSliders = document.querySelectorAll('.js-retailers-slider');
    var flickityInstances = [];

    // Function to initialize the slider
    function initializeSliders() {
        retailersSliders.forEach(function (elem, index) {
            var retailersItems = elem.querySelectorAll('.retailers-item');
            var retailersItemsLength = retailersItems.length;

            if (window.innerWidth <= 767 && retailersItemsLength > 2) {
                // Initialize Flickity only if not already initialized
                if (!flickityInstances[index]) {
                    flickityInstances[index] = new Flickity(elem, {
                        contain: true,
                        pageDots: false,
                        prevNextButtons: true,
                        autoPlay: false,
                        wrapAround: true,
                        draggable: retailersItemsLength > 2,
                    });
                }
            } else {
                // Destroy Flickity if initialized and screen size is above 767px
                if (flickityInstances[index]) {
                    flickityInstances[index].destroy();
                    flickityInstances[index] = null;
                }
            }
        });
    }

    // Initialize on page load
    initializeSliders();

    // Re-initialize on window resize
    window.addEventListener('resize', function () {
        initializeSliders();
    });


    /*js-stories-slider script start*/
    var storiesSlider = document.querySelectorAll('.js-stories-slider');
    var storiesSliderLength = $(storiesSlider).find('.storie-item').length > 3;
    if (storiesSlider.length > 0) {
        if (storiesSliderLength){
            storiesSlider.forEach(function (elem) {
                new Flickity(elem, {
                    contain: true,
                    pageDots: false,
                    prevNextButtons: true,
                    wrapAround: true,
                    // autoPlay: $(storiesSlider).find('.storie-item').length > 2,
                    draggable: $(window).width() < 1199 || $(storiesSlider).find('.storie-item').length > 3,
                    // Responsive settings can be added here
                });
            });
        }
    }
    /*js-stories-slider script end*/

    /*js-stories-slider script start*/
    var fullTestimonialsSlider = document.querySelectorAll('.js-full-testimonials-slider');
    var fullTestimonialsSliderLength = $(fullTestimonialsSlider).find('.full-testimonials-item').length > 0;

    // console.log(fullTestimonialsSliderLength, fullTestimonialsSlider , "test")
    if (fullTestimonialsSlider.length > 0) {
        if (fullTestimonialsSliderLength) {
            fullTestimonialsSlider.forEach(function (elem) {
                new Flickity(elem, {
                    contain: true,
                    pageDots: false,
                    prevNextButtons: true,
                    wrapAround: true,
                    // autoPlay: $(fullTestimonialsSlider).find('.storie-item').length > 2,
                    // draggable: $(fullTestimonialsSlider).find('.full-testimonials-item').length > 1,
                    // Responsive settings can be added here
                });
            });
        }
    }
    /*js-stories-slider script end*/

    /*map-section script start */
    if ($(".map-section").length > 0){
    const mapSection = document.querySelector(".map-section");
    console.log(mapSection)

        const mapImage = mapSection.querySelector(".left-image");


        if (mapSection && mapImage) {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            mapImage.classList.add("mapdrop");
                        }
                    });
                },
                { threshold: 0.3 } // Adjust threshold for triggering visibility
            );

            observer.observe(mapSection);
        }
    }
    /*map-section script end */

    /*work-detail-full-slider script start*/
    var workFullImageSlider = document.querySelectorAll('.js-work-detail-full-slider');

    console.log(workFullImageSlider , "test")
    if (workFullImageSlider.length > 0) {
        workFullImageSlider.forEach(function (elem) {
            new Flickity(elem, {
                contain: true,
                pageDots: false,
                prevNextButtons: true,
                wrapAround: true,
            });
        });
    }
    /*work-detail-full-slider script end*/

});



$(document).ready(function(){


    /*menu script start*/
    $('.enumenu_ul').responsiveMenu({
        // 'menuIcon_text': 'Menu',
        menuslide_overlap: true,
        // menuslide_direction: 'left',
        onMenuopen: function () { }
    });
    /*menu script end*/

    // $(".js-chosen-select select").bselect({ searchInput: false });
    $('.js-chosen-select select').select2();

    AOS.init({
        duration: 1200,
        once: true,
    })

});
/*ready function end*/


/*convert svg to code*/
$(function () {
    $('img.svg-convert').each((i, e) => {
        const $img = $(e);
        const imgID = $img.attr('id');
        const imgClass = $img.attr('class');
        const imgURL = $img.attr('src');

        $.get(imgURL, (data) => {
            // Get the SVG tag, ignore the rest+
            let $svg = $(data).find('svg');
            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', `${imgClass} replaced-svg`);
            }
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');
            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr(`viewBox 0 0  ${$svg.attr('height')} ${$svg.attr('width')}`);
            }
            // Replace image with new SVG
            $img.replaceWith($svg);
        }, 'xml');
    });
});
/*convert svg to code end*/