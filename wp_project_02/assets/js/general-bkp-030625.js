'use strict';
var $ = jQuery.noConflict();

$(document).ready(function(){

    // Smooth scroll to next section on .trigger-next click
    const $triggerNext = $('.trigger-next');
    const $siteHeader = $('.site-header'); // Select the site-header

    if ($triggerNext.length) {
        $triggerNext.on('click', function() {
            const $currentSection = $(this).closest('.banner-section');
            if ($currentSection.length) {
                const $nextSection = $currentSection.nextAll('section').first();
                console.log($nextSection);
                if ($nextSection.length) {
                    // Calculate the target scroll position, accounting for header height
                    const headerHeight = $siteHeader.outerHeight(); // Get the outer height of the header
                    const targetOffset = $nextSection.offset().top - (headerHeight - 30);  // Subtract header height

                    $('html, body').animate({
                        scrollTop: targetOffset
                    }, 800); // 800ms for smooth scroll animation
                }
            }
        });
    }

    // Add/remove is-sticky class on scroll
    const stickyThreshold = 100; // Pixels scrolled before adding class

    $(window).on('scroll', function() {
        const scrollPosition = $(window).scrollTop();

        if (scrollPosition >= stickyThreshold) {
            $siteHeader.addClass('is-sticky');
        } else {
            $siteHeader.removeClass('is-sticky');
        }
    });

    // Initial check on page load
    $(window).trigger('scroll');

    // Menu functionality for screens <= 991px
    const handleMenuDropdown = () => {
        if ($(window).width() <= 991) {
            // Append arrow if not already present
            $('.menu-item-has-children').each(function() {
                if (!$(this).find('.submenu-trigger').length) {
                     $(this).append('<i class="fa-solid fa-chevron-down submenu-trigger"></i>');
                }
            });

            // Add click event to the arrow
            $('.submenu-trigger').off('click').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevent click from bubbling to parent link

                const $parentMenuItem = $(this).closest('.menu-item-has-children');
                const $subMenu = $parentMenuItem.find('> .sub-menu');

                // Close other open sub-menus at the same level
                $('.menu-item-has-children > .sub-menu').not($subMenu).slideUp(300);
                $('.menu-item-has-children .submenu-trigger').not($(this)).removeClass('rotate');

                // Slide toggle the clicked sub-menu
                $subMenu.slideToggle(300);
                 $(this).toggleClass('rotate');
            });

            // Close sub-menus when clicking outside the menu
            $(document).off('click.menu').on('click.menu', function(e) {
                if (!$(e.target).closest('.menu-item-has-children').length) {
                    $('.menu-item-has-children > .sub-menu').slideUp(300);
                    $('.menu-item-has-children .submenu-trigger').removeClass('rotate');
                }
            });

        } else {
            // Remove arrow and click handlers on larger screens
             $('.menu-item-has-children .submenu-trigger').remove();
             $('.menu-item-has-children').off('click'); // Remove any potential click handler on the link itself
             $('.menu-item-has-children > .sub-menu').css('display', ''); // Reset display for larger screens
              $(document).off('click.menu'); // Remove document click handler
        }
    };

    // Run menu functionality on load and resize
    handleMenuDropdown();
    $(window).on('resize', handleMenuDropdown);


    $('.form-select').select2({
        minimumResultsForSearch: 6,
        width: '100%',
        placeholder: function() {
            return $(this).data('placeholder');
        }
    });

    
    // Testimonials Slider
    const $testimonialsSlider = $('.testimonials-slider');

    if ($testimonialsSlider.length) {
        $testimonialsSlider.slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false, // Hide default arrows
            autoplay: false,
        });

        // Function to check and update controls visibility
        const updateControlsVisibility = () => {
            const slideCount = $testimonialsSlider.find('.testimonial-slide').length;
            const $sliderControls = $('.slider-controls');
            
            if (slideCount <= 1) {
                $sliderControls.hide();
            } else {
                $sliderControls.show();
            }
        };

        // Custom Navigation
        $('.testimonial-prev').on('click', function() {
            $testimonialsSlider.slick('slickPrev');
        });

        $('.testimonial-next').on('click', function() {
            $testimonialsSlider.slick('slickNext');
        });

        // Slider Counter
        const $currentSlide = $('.slider-counter .current-slide');
        const $totalSlides = $('.slider-counter .total-slides');

        // Set initial total slides count
        $totalSlides.text($testimonialsSlider.slick('getSlick').slideCount);

        // Update current slide number on slide change
        $testimonialsSlider.on('afterChange', function(event, slick, currentSlide) {
            $currentSlide.text(currentSlide + 1);
        });

        // Check controls visibility on init
        updateControlsVisibility();
    }


    // blog share script
    $('.share-icons-wrap').hover(
        function() {
            // Mouse enter
            $(this).addClass('active');
        },
        function() {
            // Mouse leave
            $(this).removeClass('active');
        }
    );


     $('.faq-question').on('click', function() {
        var $item = $(this).closest('.faq-item');
        var $answer = $item.find('.faq-answer');

        if ($item.hasClass('open')) {
        $answer.stop().slideUp(250);
        $item.removeClass('open');
        } else {
        // Optionally close others:
        // $('.faq-item.open').removeClass('open').find('.faq-answer').stop().slideUp(250);
        $answer.stop().slideDown(250);
        $item.addClass('open');
        }
    });

    // Optionally, start with all answers hidden
    $('.faq-answer').hide();


    // form
    jQuery(function($){
        // Add floating-label class to all text fields
        $('.gfield--type-text').each(function(){
            var $field = $(this);
            $field.addClass('floating-label');
            var $input = $field.find('input[type="text"]');
            var $label = $field.find('.gfield_label');
            // Move label after input for + selector in CSS
            if ($input.length && $label.length && !$input.next('.gfield_label').length) {
            $input.after($label);
            }
            // Set filled class if input has value
            if ($input.val()) {
            $field.addClass('filled');
            }
            $input.on('focus blur input', function() {
            if ($(this).val()) {
                $field.addClass('filled');
            } else {
                $field.removeClass('filled');
            }
            });
        });
    });
});
$(".menu-trigger").click(function (e) {
    $("body").toggleClass("menu-open")
    $(this).toggleClass("is-active")
})

// inner-filter-banner start
if ($('.inner-filter-banner').length > 0) {
    $('body').addClass('has-filter-banner');
}

/*convert svg to code*/
$(function () {
    $('img.svg-convert').each((i, e) => {
        const $img = $(e);
        const imgID = $img.attr('id');
        const imgClass = $img.attr('class');
        const imgURL = $img.attr('src');

        $.get(imgURL, (data) => {
            // Get the SVG tag, ignore the rest
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



const popularJobsSlider = document.querySelector('.popular-jobs-slider');
if (popularJobsSlider) {
    const $slider = $(popularJobsSlider);
    const $prevButton = $('.popular-jobs-prev');
    const $nextButton = $('.popular-jobs-next');
    
    $slider.slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        centerMode: false,
        variableWidth: false,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            }
        ]
    });

    // Function to check and update navigation visibility
    const updateNavigationVisibility = () => {
        const slideCount = $slider.find('.popular-jobs-item').length;
        const currentSlidesToShow = $slider.slick('slickGetOption', 'slidesToShow');
        
        if (slideCount <= currentSlidesToShow) {
            $prevButton.hide();
            $nextButton.hide();
        } else {
            $prevButton.show();
            $nextButton.show();
        }
    };

    // Custom Navigation
    if ($prevButton.length && $nextButton.length) {
        $prevButton.on('click', () => {
            $slider.slick('slickPrev');
        });

        $nextButton.on('click', () => {
            $slider.slick('slickNext');
        });
    }

    // Update navigation visibility on init and resize
    updateNavigationVisibility();
    $(window).on('resize', updateNavigationVisibility);
}

// Core Goals Slider
const jobsSlider = document.querySelector('.jobs-slider');
if (jobsSlider) {
    const $slider = $(jobsSlider);
    const $prevButton = $('.jobs-prev');
    const $nextButton = $('.jobs-next');
    
    $slider.slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    // Function to check and update navigation visibility
    const updateNavigationVisibility = () => {
        const slideCount = $slider.find('.carousel-cell').length;
        const currentSlidesToShow = $slider.slick('slickGetOption', 'slidesToShow');
        
        if (slideCount <= currentSlidesToShow) {
            $prevButton.hide();
            $nextButton.hide();
        } else {
            $prevButton.show();
            $nextButton.show();
        }
    };

    // Custom Navigation
    if ($prevButton.length && $nextButton.length) {
        $prevButton.on('click', () => {
            $slider.slick('slickPrev');
        });

        $nextButton.on('click', () => {
            $slider.slick('slickNext');
        });
    }

    // Update navigation visibility on init and resize
    updateNavigationVisibility();
    $(window).on('resize', updateNavigationVisibility);
}


// Jobs Slider
const blogSlider = document.querySelector('.blogs-slider');
if (blogSlider) {
    const $slider = $(blogSlider);
    const $prevButton = $('.blog-prev');
    const $nextButton = $('.blog-next');
    
    $slider.slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    // Function to check and update navigation visibility
    const updateNavigationVisibility = () => {
        const slideCount = $slider.find('.blog-item').length;
        const currentSlidesToShow = $slider.slick('slickGetOption', 'slidesToShow');
        
        if (slideCount <= currentSlidesToShow) {
            $prevButton.hide();
            $nextButton.hide();
        } else {
            $prevButton.show();
            $nextButton.show();
        }
    };

    // Custom Navigation
    if ($prevButton.length && $nextButton.length) {
        $prevButton.on('click', () => {
            $slider.slick('slickPrev');
        });

        $nextButton.on('click', () => {
            $slider.slick('slickNext');
        });
    }

    // Update navigation visibility on init and resize
    updateNavigationVisibility();
    $(window).on('resize', updateNavigationVisibility);
}


// Core Goals Slider
const coreGoalsSlider = document.querySelector('.core-goals-wrap');
if (coreGoalsSlider) {
    const $slider = $(coreGoalsSlider);
    const $prevButton = $('.goal-prev');
    const $nextButton = $('.goal-next');
    
    $slider.slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,

                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    // Function to check and update navigation visibility
    const updateNavigationVisibility = () => {
        const slideCount = $slider.find('.goals-item').length;
        const currentSlidesToShow = $slider.slick('slickGetOption', 'slidesToShow');
        
        if (slideCount <= currentSlidesToShow) {
            $prevButton.hide();
            $nextButton.hide();
        } else {
            $prevButton.show();
            $nextButton.show();
        }
    };

    // Custom Navigation
    if ($prevButton.length && $nextButton.length) {
        $prevButton.on('click', () => {
            $slider.slick('slickPrev');
        });

        $nextButton.on('click', () => {
            $slider.slick('slickNext');
        });
    }

    // Update navigation visibility on init and resize
    updateNavigationVisibility();
    $(window).on('resize', updateNavigationVisibility);
}

// AOS
if ($("[data-aos]").length > 0) {
    AOS.init({
        duration: 600,
        offset: 50,
        once: true
    });
}
