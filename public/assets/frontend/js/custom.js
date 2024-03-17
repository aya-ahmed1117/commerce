/* =====================================
All JavaScript fuctions Start
======================================*/
(function ($) {
  "use strict";
  /*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
  // > TouchSpin box function by  = jquery.bootstrap-touchspin.js =============== //
  function input_number_demo3() {
    jQuery("input[name='itm-Quantity']").TouchSpin();
  }

  // Wow Animate function by = owl.js
  function wow_animate() {
    var wow = new WOW({
      boxClass: "wow",
      animateClass: "animated",
      offset: 0,
      mobile: true,
      live: true,
      scrollContainer: null,
    });
    wow.init();
  }

  // testimonial Carousel Two function by = owl.js
  function aon_testi_one() {
    jQuery(".aon-testi-one-carousel").owlCarousel({
      loop: true,
      margin: 30,
      items: 1,
      nav: true,
      dots: false,
      navText: [
        '<span class="ar-left"></span>',
        '<span class="ar-right"></span>',
      ],
    });
  }

  // testimonial Two Carousel Onefunction by = owl.js
  function aon_testi_two() {
    jQuery(".aon-testi-two-carousel").owlCarousel({
      loop: true,
      margin: 30,
      items: 1,
      center: true,
      nav: true,
      dots: false,
      navText: [
        '<span class="ar-left"></span>',
        '<span class="ar-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
          center: false,
        },
        991: {
          items: 2,
        },
        1024: {
          items: 3,
        },
      },
    });
  }

  // Services Carousel function by = owl.js
  function aon_services_slider() {
    jQuery(".aon-services-slider").owlCarousel({
      loop: true,
      margin: 30,
      items: 3,
      nav: true,
      dots: false,
      navText: [
        '<span class="ar-left"></span>',
        '<span class="ar-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
          center: false,
        },
        767: {
          items: 2,
        },
        1024: {
          items: 3,
        },
      },
    });
  }

  /*Submot contact form*/
  jQuery(document).on("submit", "form.contact-form", function (e) {
    e.preventDefault();
    var form = jQuery(this);
    /* sending message */
    jQuery.ajax({
      url: "http://serviothemes.com/designer/doctor/contact-form.php",
      data: form.serialize() + "&action=contactform",
      type: "POST",
      dataType: "JSON",
      beforeSend: function () {
        jQuery(".alert").remove();
        jQuery(".loading-area").show();
      },
      success: function (data) {
        jQuery(".loading-area").hide();
        if (data["success"]) {
          jQuery(
            "<div class='alert alert-success'>" + data["message"] + "</div>"
          ).insertBefore("form.contact-form");
          jQuery(".alert-success").delay(20000).fadeOut(500);
        } else {
          jQuery(
            "<div class='alert alert-danger'>" + data["message"] + "</div>"
          ).insertBefore("form.contact-form");
        }
      },
    });
  });
  // Header Search Popup function by = custom.js ========================= //
  function header_search_popup() {
    jQuery(".aon-btn-search, .aon-seach-close").on("click", function () {
      jQuery("body").toggleClass("active-search");
    });
  }

  // Woo Cart Panel function by = custom.js ========================= //
  function woocart_panel() {
    jQuery(".aon-btn-woocart, .aon-woocart-close").on("click", function () {
      jQuery("body").toggleClass("show-color-demo");
    });
  }

  // Video responsive function by = custom.js ========================= //
  function video_responsive() {
    jQuery('iframe[src*="youtube.com"]').wrap(
      '<div class="embed-responsive embed-responsive-16by9"></div>'
    );
    jQuery('iframe[src*="vimeo.com"]').wrap(
      '<div class="embed-responsive embed-responsive-16by9"></div>'
    );
  }

  // Latest News function by = owl.carousel.js
  function latest_news_slider() {
    jQuery(".latest-news-slider").owlCarousel({
      rtl: false,
      loop: false,
      margin: 30,
      nav: true,
      dots: false,
      items: 1,
      navText: [
        '<span class="ar-left"></span>',
        '<span class="ar-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        480: {
          items: 1,
        },
        991: {
          items: 2,
        },
      },
    });
  }

  // > LIGHTBOX Gallery Popup function	by = lc_lightbox.lite.js =========================== //
  function lightbox_popup() {
    lc_lightbox(".elem", {
      wrap_class: "lcl_fade_oc",
      gallery: true,
      thumb_attr: "data-lcl-thumb",

      skin: "minimal",
      radius: 0,
      padding: 0,
      border_w: 0,
    });
  }
  // > magnificPopup for video function	by = magnific-popup.js ===================== //
  function magnific_video() {
    jQuery(".mfp-video").magnificPopup({
      type: "iframe",
    });
  }
  // > magnificPopup function	by = magnific-popup.js =========================== //
  function magnific_popup() {
    jQuery(".mfp-gallery").magnificPopup({
      delegate: ".mfp-link",
      type: "image",
      tLoading: "Loading image #%curr%...",
      mainClass: "mfp-img-mobile",
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      },
    });
  }
  // > Main menu sticky on top  when scroll down function by = custom.js ========== //
  function sticky_header() {
    if (jQuery(".sticky-header").length) {
      var sticky = new Waypoint.Sticky({
        element: jQuery(".sticky-header"),
      });
    }
  }
  // > Sidebar sticky  when scroll down function by = theia-sticky-sidebar.js ========== //
  function sticky_sidebar() {
    $(".rightSidebar").theiaStickySidebar({
      additionalMarginTop: 100,
    });
  }
  // > page scroll top on button click function by = custom.js ===================== //
  function scroll_top() {
    jQuery("button.scroltop").on("click", function () {
      jQuery("html, body").animate(
        {
          scrollTop: 0,
        },
        1000
      );
      return false;
    });
    jQuery(window).on("scroll", function () {
      var scroll = jQuery(window).scrollTop();
      if (scroll > 900) {
        jQuery("button.scroltop").fadeIn(1000);
      } else {
        jQuery("button.scroltop").fadeOut(1000);
      }
    });
  }

  // > accordion active calss function by = custom.js ========================= //
  function accordion_active() {
    $(".acod-head a").on("click", function () {
      $(".acod-head").removeClass("acc-actives");
      $(this).parents(".acod-head").addClass("acc-actives");
      $(".acod-title").removeClass("acc-actives"); //just to make a visual sense
      $(this).parent().addClass("acc-actives"); //just to make a visual sense
      $(this).parents(".acod-head").attr("class");
    });
  }
  // > Nav submenu show hide on mobile by = custom.js
  function mobile_nav() {
    jQuery(".sub-menu").parent("li").addClass("has-child");
    jQuery("<div class='fa fa-angle-right submenu-toogle'></div>").insertAfter(
      ".has-child > a"
    );
    jQuery(".has-child a+.submenu-toogle").on("click", function (ev) {
      jQuery(this)
        .parent()
        .siblings(".has-child ")
        .children(".sub-menu")
        .slideUp(500, function () {
          jQuery(this).parent().removeClass("nav-active");
        });
      jQuery(this)
        .next(jQuery(".sub-menu"))
        .slideToggle(500, function () {
          jQuery(this).parent().toggleClass("nav-active");
        });
      ev.stopPropagation();
    });
  }

  // Mobile side drawer function by = custom.js
  function mobile_side_drawer() {
    jQuery("#mobile-side-drawer").on("click", function () {
      jQuery(".mobile-sider-drawer-menu").toggleClass("active");
    });
  }

  // > TouchSpin box function by  = jquery.bootstrap-touchspin.js =============== //
  function input_number_vertical_form() {
    jQuery("input[name='demo_vertical2']").TouchSpin({
      verticalbuttons: true,
    });
  }
  //  Counter Section function by = counterup.min.js
  function counter_section() {
    jQuery(".counter").counterUp({
      delay: 10,
      time: 3000,
    });
  }

  /*--------------------------------------------------------------------------------------------
	Window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
  // > page loader function by = custom.js ========================= //
  function page_loader() {
    jQuery(".loading-area").fadeOut(1000);
  }
  /*--------------------------------------------------------------------------------------------
    Window on scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
  function color_fill_header() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      $(".is-fixed").addClass("color-fill");
    } else {
      $(".is-fixed").removeClass("color-fill");
    }
  }

  /*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
  jQuery(document).ready(function () {
    // > TouchSpin box function by  = jquery.bootstrap-touchspin.js =============== //
    input_number_demo3();
    // Wow Animate function by = owl.js
    wow_animate(),
      // testimonial Carousel function by = owl.js
      aon_testi_one(),
      // testimonial two Carousel function by = owl.js
      aon_testi_two(),
      // Services Carousel function by = owl.js
      aon_services_slider(),
      // Woo Cart Panel function by = custom.js
      woocart_panel(),
      // Header Search Popup function by = custom.js ========================= //
      header_search_popup(),
      // > Video responsive function by = custom.js
      video_responsive(),
      // Latest News function by = owl.carousel.js
      latest_news_slider();
    // > LIGHTBOX Gallery Popup function by = lc_lightbox.lite.js =========================== //
    lightbox_popup(),
      // > magnificPopup for video function by = magnific-popup.js
      magnific_video(),
      // > magnificPopup function	by = magnific-popup.js =========================== //
      magnific_popup();
    // > Main menu sticky on top  when scroll down function by = custom.js
    sticky_header(),
      // > Sidebar sticky  when scroll down function by = theia-sticky-sidebar.js ========== //
      sticky_sidebar(),
      // > page scroll top on button click function by = custom.js
      scroll_top(),
      // > accordion active calss function by = custom.js ========================= //
      accordion_active(),
      // > Nav submenu on off function by = custome.js ===================//
      mobile_nav(),
      // Mobile side drawer function by = custom.js
      mobile_side_drawer(),
      // > TouchSpin box function by  = jquery.bootstrap-touchspin.js
      input_number_vertical_form(),
      //  Counter Section function by = counterup.min.js
      counter_section();
  });
  /*--------------------------------------------------------------------------------------------
	Window Load START
---------------------------------------------------------------------------------------------*/
  jQuery(window).on("load", function () {
    // > page loader function by = custom.js
    page_loader();
  });
  /*===========================
	Window Scroll ALL FUNCTION START
===========================*/
  jQuery(window).on("scroll", function () {
    // > Window on scroll header color fill
    color_fill_header();
  });

  /*===========================
	Window Resize ALL FUNCTION START
===========================*/
  jQuery(window).on("resize", function () {});
  jQuery(window).resize();
})(window.jQuery);
