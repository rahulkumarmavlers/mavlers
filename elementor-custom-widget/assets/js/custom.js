(function ($) {
  if ($(".programs-slider").length) {
    $(".programs-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      infinite: false,
      adaptiveHeight: false,
      autoplay: true,
      centerMode: false,
      variableWidth: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            variableWidth: false,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            variableWidth: false,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            variableWidth: true,
          },
        },
      ],
    });
  }
  if ($(".slider-timeline").length) {
    $(".slider-timeline").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      appendDots: $(".slide-d-dots"),
      prevArrow: $(".slide-prev"),
      nextArrow: $(".slide-next"),
      infinite: true,
    });
  }

  // Employee testimonial slider JS here
  $(".emp-testimonial .slider-nav, .emp-testimonial .slider-for").on("init reInit afterChange", function (event, slick) {
    $(".slider-counter").html(slick.slickCurrentSlide() + 1 + "<span></span>" + slick.slideCount);
  });

  $(".emp-testimonial .slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
    infinite: true,
    dots: false,
    //centerMode:true,
  });
  $(".emp-testimonial .slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    asNavFor: ".slider-for",
    prevArrow: $(".slide-prev"),
    nextArrow: $(".slide-next"),
    dots: false,
    infinite: true,
    focusOnSelect: true,
    centerMode: true,
    draggable: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".emp-testimonial button.slide-next").click(function () {
    $(".testimonial-slider.slider-nav").slick("slickNext");
  });
  $(".emp-testimonial button.slide-prev").click(function () {
    $(".testimonial-slider.slider-nav").slick("slickPrev");
  });
  // Employee testimonial slider JS end

  // Slider JS here
  $(".slider-block .slider-equipment-nav, .slider-equipment-for").on("init reInit afterChange", function (event, slick) {
    slick.$slider
      .parent()
      .find(".slider-counter")
      .html(slick.slickCurrentSlide() + 1 + "<span></span>" + slick.slideCount);
  });

  $(" .slider-block .slider-nav, .slider-equipment-nav").on("init reInit afterChange", function (event, slick) {
    slick.$slider
      .parent()
      .find(".slider-counter")
      .html(slick.slickCurrentSlide() + 1 + "<span></span>" + slick.slideCount);
  });

  $(".slider-block .slider-for").each(function () {
    var sliderFor = $(this);

    sliderFor.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: sliderFor.parent().find(".slider-nav"),
      infinite: true,
      dots: false,
      //centerMode:true,
    });
  });

  $(".slider-block .slider-nav").each(function () {
    var sliderNav = $(this);

    sliderNav.slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      asNavFor: sliderNav.parent().find(".slider-for"),
      prevArrow: sliderNav.parent().find(".slide-prev"),
      nextArrow: sliderNav.parent().find(".slide-next"),
      dots: false,
      infinite: true,
      focusOnSelect: true,
      centerMode: true,
      draggable: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 1023,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  });
  $(".slider-equipment-nav").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    dots: false,
    //centerMode:true,
  });
  $(".slider-block button.slide-next").click(function () {
    $(".testimonial-slider.slider-nav").slick("slickNext");
  });
  $(".slider-block button.slide-prev").click(function () {
    $(".testimonial-slider.slider-nav").slick("slickPrev");
  });
  // slider JS end
  $("section.video-parallax").click(function () {
    $(".video-parallax-popup").show();
  });
  $(".video-parallax-popup .overlay, .video-parallax-popup-inner .close").click(function () {
    $(".video-parallax-popup").hide();
  });
})(jQuery);



var $ = jQuery.noConflict();
(function ($) {
  $(document).ready(function () {
    $(".insight-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      autoplay: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,

          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,

          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            variableWidth: false,
          },
        },
      ],
    });
  });
})(jQuery);

// equalHeight js start here
function equalHeight() {
  let $equalize = [
    $('.insight-equal'),
  ];

  for (let i = 0; i < $equalize.length; i++) {
    if ($equalize[i].length) {
      let maxHeight = 0;
      $equalize[i].css('height', '');
      $equalize[i].each(function (j, el) {
        let $equalizer_el = $(el);
        maxHeight = $(this).outerHeight(true) > maxHeight ? $equalizer_el.outerHeight(true) : maxHeight;
      });
      $equalize[i].height(maxHeight);
    }
  }
}

//menu_content();
$(window).on('load', function () {
  equalHeight();
}).resize(function () {
  setTimeout(function () {
    equalHeight();
  }, 501);
});

//  on load ajax equalHeight
$(document).on('sf:ajaxstart', '.searchandfilter', function () {
  equalHeight();
});
$(document).on('sf:ajaxfinish', '.searchandfilter', function () {
  equalHeight();
});