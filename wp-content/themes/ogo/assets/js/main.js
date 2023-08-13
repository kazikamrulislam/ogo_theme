jQuery(document).ready(function ($) {
    "use strict";

    $('a[href=\\#]').on('click', function (e) {
        e.preventDefault();
    })

    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

    /* Page scroll Bottom To Top */
    if ($(".scroll-wrap").length) {
        var progressPath = document.querySelector('.scroll-wrap path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
        var updateProgress = function() {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);
        var offset = 50;
        var duration = 550;
        jQuery(window).on('scroll', function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.scroll-wrap').addClass('active-scroll');
            } else {
                jQuery('.scroll-wrap').removeClass('active-scroll');
            }
        });
        jQuery('.scroll-wrap').on('click', function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })
    }

    /*---------------------------------------
    Background Parallax
    --------------------------------------- */
    if ($(".amt-parallax-bg-yes").length) {
        $(".amt-parallax-bg-yes").each(function () {
            var speed = $(this).data('speed');
            $(this).parallaxie({
                speed: speed ? speed : 0.5,
                offset: 0,
            });
        })
    }

    /* Theia Side Bar */
    if (typeof ($.fn.theiaStickySidebar) !== "undefined") {
        $('.has-sidebar .fixed-bar-coloum').theiaStickySidebar({'additionalMarginTop': 80});
        $('.fixed-sidebar-addon .fixed-bar-coloum').theiaStickySidebar({'additionalMarginTop': 160});
    }


    if (typeof $.fn.theiaStickySidebar !== "undefined") {
    $(".sticky-coloum-wrap .sticky-coloum-item").theiaStickySidebar({
        additionalMarginTop: 130,
    });
  }

    /* Header Search */
    $('a[href="#header-search"]').on("click", function (event) {
        event.preventDefault();
        $("#header-search").addClass("open");
        $('#header-search > form > input[type="search"]').focus();
    });

    $("#header-search, #header-search button.close").on("click keyup", function (event) {
        if (
            event.target === this ||
            event.target.className === "close" ||
            event.keyCode === 27
        ) {
            $(this).removeClass("open");
        }
    });

    /* masonary */
    var galleryIsoContainer = $(".amt-masonry-grid");
    if (galleryIsoContainer.length) {
        var imageGallerIso = galleryIsoContainer.imagesLoaded(function () {
            imageGallerIso.isotope({
                itemSelector: ".amt-grid-item",
                percentPosition: true,
                isAnimated: true,
                masonry: {
                    columnWidth: ".amt-grid-item",
                },
                animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
        });
    }
    
    /* Mobile menu */
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $("body").addClass("not-top");
            $("body").removeClass("top");
        } else {
            $("body").addClass("top");
            $("body").removeClass("not-top");
        }
    });

    /*Social print*/
    $(document).on('click', '.print-share-button', function (e) {
        console.log();
        e.preventDefault();
        window.print();
        return false;
    });

    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function (event) {
        event.preventDefault();
        if ($('.search-text').hasClass('active')) {
            $('.search-text, .search-close').removeClass('active');
        } else {
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });

    /* Offcanvas Menu */
    var menuArea = $('.additional-menu-area');
    menuArea.on('click', '.side-menu-trigger', function (e) {
        e.preventDefault();
        var self = $(this);
        if (self.hasClass('side-menu-open')) {
            $('.sidenav').css('transform', 'translateX(0%)');
            if (!menuArea.find('> .amt-cover').length) {
                menuArea.append("<div class='amt-cover'></div>");
            }
            self.removeClass('side-menu-open').addClass('side-menu-close');
        }
    });

    // start the ticker
    if (typeof $.fn.ticker == 'function') {
        $('#amt-js-news').ticker({
            speed: ogoObj.tickerSpeed,
            debugMode: true,
            titleText: ogoObj.tickerTitleText,
            displayType: ogoObj.tickerStyle,
            pauseOnItems: ogoObj.tickerDelay,
            direction: ogoObj.rtl,
        });
    }
    
    /*-------------------------------------
    Offcanvas Menu activation code
    -------------------------------------*/
    function closeMenuArea() {
        var trigger = $('.side-menu-trigger', menuArea);
        trigger.removeClass('side-menu-close').addClass('side-menu-open');
        if (menuArea.find('> .amt-cover').length) {
            menuArea.find('> .amt-cover').remove();
        }

        if( ogoObj.rtl =='rtl'  ) {
            $('.sidenav').css('transform', 'translateX(100%)');
        }else {
            $('.sidenav').css('transform', 'translateX(-100%)');
        }
    }

    menuArea.on('click', '.closebtn', function (e) {
        e.preventDefault();
        closeMenuArea();
    });

    $(document).on('click', '.amt-cover', function () {
        closeMenuArea();
    });
    
    /*-------------------------------------
    MeanMenu activation code
    --------------------------------------*/
    var a = $('.offscreen-navigation .menu');

    if (a.length) {
        a.children("li").addClass("menu-item-parent");
        a.find(".menu-item-has-children > a").on("click", function (e) {
            e.preventDefault();
            $(this).toggleClass("opened");
            var n = $(this).next(".sub-menu"),
                s = $(this).closest(".menu-item-parent").find(".sub-menu");
            a.find(".sub-menu").not(s).slideUp(250).prev('a').removeClass('opened'), n.slideToggle(250)
        });
        a.find('.menu-item:not(.menu-item-has-children) > a').on('click', function (e) {
            $('.amt-slide-nav').slideUp();
            $('body').removeClass('slidemenuon');
        });
    }

    $('.mean-bar .sidebarBtn').on('click', function (e) {
        e.preventDefault();
        if ($('.amt-slide-nav').is(":visible")) {
            $('.amt-slide-nav').slideUp();
            $('body').removeClass('slidemenuon');
        } else {
            $('.amt-slide-nav').slideDown();
            $('body').addClass('slidemenuon');
        }

    });

    /*Header and mobile menu stick*/
    $(window).on('scroll', function () {
        if ($('body').hasClass('sticky-header')) {
            // Sticky header
            var stickyPlaceHolder = $("#sticky-placeholder"),
                menu = $("#header-menu"),
                menuH = menu.outerHeight(),
                topHeaderH = $('#tophead').outerHeight() || 0,
                middleHeaderH = $('#header-middlebar').outerHeight() || 0,
                targrtScroll = topHeaderH + middleHeaderH;
            if ($(window).scrollTop() > targrtScroll) {
                menu.addClass('amt-sticky');
                stickyPlaceHolder.height(menuH);
            } else {
                menu.removeClass('amt-sticky');
                stickyPlaceHolder.height(0);
            }

             // Sticky mobile header
            var stickyPlaceHolder = $("#mobile-sticky-placeholder"),
                menubar = $("#mobile-men-bar"),
                menubarH = menubar.outerHeight(),
                topHeaderH = $('#mobile-top-fix').outerHeight() || 0,

                total_height =topHeaderH;

            if ($(window).scrollTop() > total_height) {
                $("#meanmenu").addClass('mobile-sticky');
                stickyPlaceHolder.height(menubarH);            
            } else {
                $("#meanmenu").removeClass('mobile-sticky');
                stickyPlaceHolder.height(0);
            }
        }
    });

    // Popup - Used in video
    if (typeof $.fn.magnificPopup == 'function') {
        $('.amt-video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }
    if (typeof $.fn.magnificPopup == 'function') {
        if ($('.zoom-gallery').length) {
            $('.zoom-gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a.ogo-popup-zoom', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        }
    }

    $('#shop-view-mode li a').on('click', function () {
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ($(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        } else {
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });
    /* when product quantity changes, update quantity attribute on add-to-cart button */
    $("form.cart").on("change", "input.qty", function () {
        if (this.value === "0")
            this.value = "1";

        $(this.form).find("button[data-quantity]").data("quantity", this.value);
    });

    /* remove old "view cart" text, only need latest one thanks! */
    $(document.body).on("adding_to_cart", function () {
        $("a.added_to_cart").remove();
    });

    /*variable ajax cart end*/
    // Quantity
    $(document).on('click', '.quantity .input-group-btn .quantity-btn', function () {
        var $input = $(this).closest('.quantity').find('.input-text');

        if ($(this).hasClass('quantity-plus')) {
            $input.trigger('stepUp').trigger('change');
        }

        if ($(this).hasClass('quantity-minus')) {
            $input.trigger('stepDown').trigger('change');
        }
    });

    if( $('.header-shop-cart').length ){
        $( document ).on('click', '.remove-cart-item', function(){
          var product_id = $(this).attr("data-product_id");
          var loader_url = $(this).attr("data-url");
          var main_parent = $(this).parents('li.menu-item.dropdown');
          var parent_li = $(this).parents('li.cart-item');
          parent_li.find('.remove-item-overlay').css({'display':'block'});
          $.ajax({
            type: 'post',
            dataType: 'json',
            url: ogoObj.ajaxURL,
            data: { action: "ogo_product_remove",
                product_id: product_id
            },success: function(data){
              main_parent.html( data["mini_cart"] );
              $( document.body ).trigger( 'wc_fragment_refresh' );
            },error: function(xhr, status, error) {
              $('.header-shop-cart').children('ul.minicart').html('<li class="cart-item"><p class="cart-update-pbm text-center">'+ ogoObj.caamt_update_pbm +'</p></li>');
            }
          });
          return false;
        }); 
    }
    // Wishlist
    $(document).on('click', '.rttheme-wishlist-icon', function () {

        if ($(this).hasClass('rttheme-add-to-wishlist') && typeof yith_wcwl_l10n != "undefined") {

            var $obj = $(this),
                productId = $obj.data('product-id'),
                afterTitle = $obj.data('title-after');
            var data = {
                'action': 'ogo_add_to_wishlist',
                'context': 'frontend',
                'nonce': $obj.data('nonce'),
                'add_to_wishlist': productId
            };

            $.ajax({
                url: yith_wcwl_l10n.ajax_url,
                type: 'POST',
                data: data,
                success: function success(data) {
                    if (data['result'] != 'error') {
                        $obj.removeClass('ajaxloading');
                        $obj.find('.wishlist-icon').removeClass('fa fa-heart').addClass('fas fa-heart').show();
                        $obj.removeClass('rttheme-add-to-wishlist').addClass('rttheme-remove-from-wishlist');
                        $obj.find('span').html(afterTitle);
                        $obj.attr('title',afterTitle);
                        $('body').trigger('amt_added_to_wishlist', [productId]);
                    } else {
                        console.log(data['message']);
                    }
                }
            });
            return false;
        }
    });
});

//function Load
function ogo_content_load_scripts() {
    var $ = jQuery;
    // Preloader
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    var windowWidth = $(window).width();

    imageFunction();
    function imageFunction() {
        $("[data-bg-image]").each(function () {
        let img = $(this).data("bg-image");
            $(this).css({
                backgroundImage: "url(" + img + ")",
            });
        });
    }

    /* Counter */
    var counterContainer = $('.counter');
    if (counterContainer.length) {
        counterContainer.counterUp({
            delay: counterContainer.data('rtsteps'),
            time: counterContainer.data('rtspeed')
        });
    }

    // use elementor addon
    $('.amt-news-ticker').each(function() {
        var $this = $(this);
        var settings = $this.data('xld'); 
        if (typeof $.fn.ticker == 'function') {
            $('#amt-news-ticker').ticker({
                speed: settings['speed'],
                debugMode: true,
                titleText: settings['titleText'],
                displayType: settings['displayType'],
                pauseOnItems: settings['pauseOnItems'],
                direction: settings['direction'],
            });
        }
    });
    
    /* Wow Js Init */
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true,
        scrollContainer: null,
    });
    new WOW().init();

    /* Swiper Slider Blog */
    $('.amt-swiper-slider-blog').each(function() {
        var $this = $(this);
        var settings = $this.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var options = {
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        };

        if( settings['autoplay'] ) {
            options.autoplay = {
                delay: settings['autoplaydelay'],
            };
        }

        var swiper = new Swiper( this, options );
        swiper.init();
    });

        /* Swiper Slider Portfolio */
        $('.amt-swiper-slider-portfolio').each(function() {
            var $this = $(this);
            var settings = $this.data('xld');
            var autoplayconditon= settings['auto'];
            // var $pagination = $this.find('.swiper-pagination')[0];
            // var $next = $this.find('.swiper-button-next')[0];
            // var $prev = $this.find('.swiper-button-prev')[0];
            var options = {
                    speed: settings['speed'],
                    loop:  settings['loop'],
                    pauseOnMouseEnter :true,
                    slidesPerView: settings['slidesPerView'],
                    spaceBetween:  settings['spaceBetween'],
                    centeredSlides:  settings['centeredSlides'], 
                    slidesPerGroup: settings['slidesPerGroup'],
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        type: 'bullets',
                    },
                    // navigation: {
                    //     nextEl: $next,
                    //     prevEl: $prev,
                    // },
                    breakpoints: {
                    0: {
                        slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                    },
                    576: {
                        slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                    },
                    768: {
                        slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                    },
                    992: {
                        slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                    },
                    1200: {
                        slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                    },
                    1600: {
                        slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                    },
                },
            };
    
            if( settings['autoplay'] ) {
                options.autoplay = {
                    delay: settings['autoplaydelay'],
                };
            }
    
            var swiper = new Swiper( this, options );
            swiper.init();
        });

     /* Swiper Slider Team*/
    $('.amt-swiper-slider-team').each(function() {
        var $this = $(this);
        var settings = $this.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var options = {
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        };

        if( settings['autoplay'] ) {
            options.autoplay = {
                delay: settings['autoplaydelay'],
            };
        }

        var swiper = new Swiper( this, options );
        swiper.init();
    });

     /* Swiper Slider Shop*/
    $('.amt-swiper-slider-shop').each(function() {
        var $this = $(this);
        var settings = $this.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var options = {
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        };

        if( settings['autoplay'] ) {
            options.autoplay = {
                delay: settings['autoplaydelay'],
            };
        }

        var swiper = new Swiper( this, options );
        swiper.init();
    });

    /* Swiper slider */
    $('.amt-swiper-cat-slider').each(function() {
        var $this = $(this);
        var $_slider = $this.find('.swiper-container');
        var settings = $_slider.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiperOptions = {
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el:  $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        }
        if(settings.autoplay){
            swiperOptions.autoplay = {
                delay: settings['autoplaydelay'],
            }
        }
        var swiper1 = new Swiper('.amt-swiper-cat-slider .swiper-container', swiperOptions );
        swiper1.init();
    });

    /* Horizontal Thumbnail slider */
    $('.ogo-horizontal-slider').each(function(){
        var slider_wrap = $(this);
        var $pagination = slider_wrap.find('.swiper-pagination')[0];
        var $next = slider_wrap.find('.swiper-button-next')[0];
        var $prev = slider_wrap.find('.swiper-button-prev')[0];
        var target_thumb_slider = slider_wrap.find('.horizontal-thumb-slider');
        var thumb_slider = null;
        if(target_thumb_slider.length){
            var settings = target_thumb_slider.data('xld');
            var autoplayconditon= settings['auto'];
            thumb_slider = new Swiper(target_thumb_slider[0],{
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                spaceBetween:  settings['spaceBetween'],
                breakpoints: {
                    0: {
                        slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                    },
                    576: {
                        slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                    },
                    768: {
                        slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                    },
                    992: {
                        slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                    },
                    1200: {
                        slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                    },            
                },
                pagination: {
                    el: $pagination,
                    type: 'progressbar',
                },                
            });
        }

        var target_slider = slider_wrap.find('.horizontal-slider');
        if(target_slider.length){
            var settings = target_slider.data('xld');
            var swiperOptions = {
                autoplay:  settings && settings['auto'],
                speed: settings && settings['speed'],
                loop:  settings && settings['loop'],
                thumbs: {
                  swiper: thumb_slider,
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
            }
            if(settings.autoplay){
                swiperOptions.autoplay = {
                    delay: settings['autoplaydelay'],
                }
            }
            var swiper1 = new Swiper(target_slider[0], swiperOptions );
            swiper1.init();
        }
    });

    /* vertical Thumbnail slider */
    $('.ogo-vertical-slider').each(function(){
        var slider_wrap = $(this);
        var $pagination = slider_wrap.find('.swiper-pagination')[0];
        var target_thumb_slider = slider_wrap.find('.vertical-thumb-slider');
        var thumb_slider = null;
        if(target_thumb_slider.length){
            var settings = target_thumb_slider.data('xld');
            var autoplayconditon= settings['auto'] ;
            thumb_slider = new Swiper(target_thumb_slider[0], {
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                spaceBetween:  settings['spaceBetween'],
                breakpoints: {
                    0: {
                        slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                    },
                    576: {
                        slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                    },
                    768: {
                        slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                    },
                    992: {
                        slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                        direction: "vertical",
                    },
                    1200: {
                        slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                        direction: "vertical",
                    },            
                },
                pagination: {
                    el: $pagination,
                    type: 'progressbar',
                },
            });
        }

        var target_slider = slider_wrap.find('.vertical-slider');
        if(target_slider.length){
            var settings = target_slider.data('xld');
            var swiperOptions = {
                autoplay:  settings && settings['auto'],
                speed: settings && settings['speed'],
                loop:  settings && settings['loop'],
                thumbs: {
                  swiper: thumb_slider,
                },
            }

            if(settings.autoplay){
                swiperOptions.autoplay = {
                    delay: settings['autoplaydelay'],
                }
            }
            var swiper1 = new Swiper(target_slider[0], swiperOptions );
            swiper1.init();
        }
    });

     /* Swiper slider Main */
    $('.amt-swiper-slider-main1').each(function() {
        var $this = $(this);
        var $_slider = $this.find('.inner-container1');
        var settings = $_slider.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiperOptions = {
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el:  $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        }
        if(settings.autoplay){
            swiperOptions.autoplay = {
                delay: settings['autoplaydelay'],
            }
        }
        var swiper1 = new Swiper('.amt-swiper-slider-main1 .inner-container1', swiperOptions );
        swiper1.init();
    }); 

     /* Swiper slider Main */
    $('.amt-swiper-slider-main2').each(function() {
        var $this = $(this);
        var $_slider = $this.find('.inner-container2');
        var settings = $_slider.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiperOptions = {
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el:  $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        }
        if(settings.autoplay){
            swiperOptions.autoplay = {
                delay: settings['autoplaydelay'],
            }
        }
        var swiper1 = new Swiper('.amt-swiper-slider-main2 .inner-container2', swiperOptions );
        swiper1.init();
    }); 

     /* Swiper slider Main */
    $('.amt-swiper-slider-main3').each(function() {
        var $this = $(this);
        var $_slider = $this.find('.inner-container3');
        var settings = $_slider.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiperOptions = {
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el:  $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        }
        if(settings.autoplay){
            swiperOptions.autoplay = {
                delay: settings['autoplaydelay'],
            }
        }
        var swiper1 = new Swiper('.amt-swiper-slider-main3 .inner-container3', swiperOptions );
        swiper1.init();
    }); 

     /* Woocommerce Related Product Slider */
    $('.amt-related-slider').each(function() {
        var $this = $(this);
        var settings = $this.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiper = new Swiper( this, {
                autoplay:   autoplayconditon,
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'] ? settings['slidesPerGroup']:1,
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        });
        if( autoplayconditon == true ) {
            $(".amt-related-slider").mouseenter(function() {
                swiper.autoplay.stop();
            });
        
            $(".amt-related-slider").mouseleave(function() {
                swiper.autoplay.start();
            });
        }
        swiper.init();
    });
}

(function ($) {
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {

        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');

        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    ogo_content_load_scripts();
                });
            }
        });
    });

    // Window Load
    $(window).on('load', function () {
        ogo_content_load_scripts();
    });


    /*Single case like*/
    $('.ogo-like').on('click', function(e){
        var $element = $(this);
        if($element.hasClass('unregistered')){
            alert('You need to register to like this post');
            return;
        }
        var data = {
            action: 'ogo_like',
            post_id: parseInt($element.data('id'), 10) || 0
        };

        $.ajax({
          method: "POST",
          url: ogoObj.ajaxURL,
          data: data,
          dataType: "json",
          beforeSend: function(){
            console.log(data);
          },
          success:function(res){
            console.log(res);
            if(res.success === true){
                if(res.data.action == 'unliked' ){
                    $element.removeClass('liked');

                }else if(res.data.action == 'liked'){
                    $element.addClass('liked');
                }
            }else{
                alert(res.data);
            }
          }
        });

    });

    //ogo_single_scroll_post
    if ($(".ajax-scroll-post").length > 0) {
        var onScrollPagi = true;
        var current_post = 1;
        $(window).scroll(function () {
            if (!onScrollPagi) return;
            var bottomOffset = 1900; // the distance (in px) from the page bottom when you want to load more posts 

            if (current_post >= ogoObj.post_scroll_limit) {
                onScrollPagi = false;
                return;
            }

            if ($(document).scrollTop() > ($(document).height() - bottomOffset) && onScrollPagi == true) {
                let cat_ids = $('input#ogo-cat-ids').val();
                $.ajax({
                    url: ogoObj.ajaxURL,
                    data: {
                        action: 'ogo_single_scroll_post',
                        current_post: current_post,
                        cat_ids
                    },
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function () {
                        onScrollPagi = false;
                    },
                    success: function (resp) {
                        if (resp.success) {
                            $('.ajax-scroll-post').append(resp.data.nextContent);
                            history.pushState({}, null, resp.data.nextUrl);
                            current_post++;
                            onScrollPagi = true;
                        }
                    }
                });
            }
        });
    }

    $(window).on('scroll', scrollFunction);
    function scrollFunction() {
        var target = $('#contentHolder');
        
        if ( target.length > 0 ) {
            var contentHeight = target.outerHeight();
            var documentScrollTop = $(document).scrollTop();
            var targetScrollTop = target.offset().top;
            var scrolled = documentScrollTop - targetScrollTop;
            
            if (0 <= scrolled) {
                var scrolledPercentage = (scrolled / contentHeight) * 100;
                if (scrolledPercentage >= 0 && scrolledPercentage <= 100) {
                    scrolledPercentage = scrolledPercentage >= 90 ? 100 : scrolledPercentage;
                    $("#ogoBar").css({
                        width: scrolledPercentage + "%"
                    });
                }
            } else {
                $("#ogoBar").css({
                    width: "0%"
                });
            }
        }
    }

    function revealPosts(){
        var posts = $('.single-grid-item:not(.reveal)');
        var i = 0;
        setInterval( function(){
          if ( i >= posts.length) return false;
          var el = posts[i];
          $(el).addClass('reveal');
          i++
        }, 100);
    }

    // Ajax Blog Loadmore Function 01
    var page = 2;
    $(document).on( 'click', '#loadMore1', function( event ) {
        event.preventDefault();

        jQuery('#loadMore1').addClass('loading-lazy');

        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog1',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore1').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore1").html(ogoObj.loadmoretxt); 
                jQuery('#loadMore1').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })


    // Ajax Blog Loadmore Function 02
    var page = 2;
    $(document).on( 'click', '#loadMore2', function( event ) {
        event.preventDefault();

        jQuery('#loadMore2').addClass('loading-lazy');

        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog2',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore2').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore2").html(ogoObj.loadmoretxt);  
                jQuery('#loadMore2').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })

    // Ajax Blog Loadmore Function 03
    var page = 2;
    $(document).on( 'click', '#loadMore3', function( event ) {
        event.preventDefault();

        jQuery('#loadMore3').addClass('loading-lazy');

        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog3',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore3').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore3").html(ogoObj.loadmoretxt); 
                jQuery('#loadMore3').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })

    // Ajax Blog Loadmore Function 04
    var page = 2;
    $(document).on( 'click', '#loadMore4', function( event ) {
        event.preventDefault();

        jQuery('#loadMore4').addClass('loading-lazy');

        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog4',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore4').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore4").html(ogoObj.loadmoretxt);
                jQuery('#loadMore4').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })

    // Ajax Blog Loadmore Function 05
    var page = 2;
    $(document).on( 'click', '#loadMore5', function( event ) {
        event.preventDefault();

        jQuery('#loadMore5').addClass('loading-lazy');

        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog5',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore5').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore5").html(ogoObj.loadmoretxt);
                jQuery('#loadMore5').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })


    // Elementor grid one addon Loadmore Function
    var list_page = 2;
    $(document).on( 'click', '#listloadMore', function( event ) {
        event.preventDefault();

        jQuery('#listloadMore').addClass('loading-lazy');
        var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
        var $container = jQuery('.listloadmore-items');
        $.ajax({
            type       : "POST",
            data       : {
                action: 'load_more_list_one',
                numPosts : 2, 
                pageNumber: list_page,
                query_data: data_json,
            },
            //dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
                var $data = jQuery(html);
                if ($data.length) {
                    $container.append( html );
                        jQuery('#listloadMore').removeClass('loading-lazy');
                } else {
                    jQuery("#listloadMore").html(ogoObj.loadmoretxt);
                    jQuery('#listloadMore').removeClass('loading-lazy');
                }
                setTimeout( function() {
                    revealPosts();
                }, 500);
            },
        })
        list_page++;
    })
// Elementor grid one addon Loadmore Function

    var list_page = 2;
    $(document).on( 'click', '#blog_loadMore_style1', function( event ) {
        event.preventDefault();

        jQuery('#blog_loadMore_style1').addClass('loading-lazy');
        var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
        var $container = jQuery('.blog-loadmore-style1 .row');
        $.ajax({
            type       : "POST",
            data       : {
                action: 'load_more_blog_one',
                numPosts : 2, 
                pageNumber: list_page,
                query_data: data_json,
            },
            //dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
                var $data = jQuery(html);
                if ($data.length) {
                    $container.append( html );
                        jQuery('#blog_loadMore_style1').removeClass('loading-lazy');
                } else {
                    jQuery("#blog_loadMore_style1").html(ogoObj.loadmoretxt);
                    jQuery('#blog_loadMore_style1').removeClass('loading-lazy');
                }
                setTimeout( function() {
                    revealPosts();
                }, 500);
            },
        })
        list_page++;
    })

 // Elementor grid two addon Loadmore Function

    var list_page = 2;
    $(document).on( 'click', '#blog_loadMore_style2', function( event ) {
        event.preventDefault();

        jQuery('#blog_loadMore_style2').addClass('loading-lazy');
        var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
        var $container = jQuery('.blog-loadmore-style2 .row');
        $.ajax({
            type       : "POST",
            data       : {
                action: 'load_more_blog_two',
                numPosts : 2, 
                pageNumber: list_page,
                query_data: data_json,
            },
            //dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
                var $data = jQuery(html);
                if ($data.length) {
                    $container.append( html );
                        jQuery('#blog_loadMore_style2').removeClass('loading-lazy');
                } else {
                    jQuery("#blog_loadMore_style2").html(ogoObj.loadmoretxt);
                    jQuery('#blog_loadMore_style2').removeClass('loading-lazy');
                }
                setTimeout( function() {
                    revealPosts();
                }, 500);
            },
        })
        list_page++;
    })

// Elementor grid three addon Loadmore Function

    var list_page = 2;
    $(document).on( 'click', '#blog_loadMore_style3', function( event ) {
        event.preventDefault();

        jQuery('#blog_loadMore_style3').addClass('loading-lazy');
        var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
        var $container = jQuery('.blog-loadmore-style3 .row');
        $.ajax({
            type       : "POST",
            data       : {
                action: 'load_more_blog_three',
                numPosts : 2, 
                pageNumber: list_page,
                query_data: data_json,
            },
            //dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
                var $data = jQuery(html);
                if ($data.length) {
                    $container.append( html );
                        jQuery('#blog_loadMore_style3').removeClass('loading-lazy');
                } else {
                    jQuery("#blog_loadMore_style3").html(ogoObj.loadmoretxt);
                    jQuery('#blog_loadMore_style3').removeClass('loading-lazy');
                }
                setTimeout( function() {
                    revealPosts();
                }, 500);
            },
        })
        list_page++;
    })

// Elementor grid four addon Loadmore Function

var list_page = 2;
$(document).on( 'click', '#blog_loadMore_style4', function( event ) {
    event.preventDefault();

    jQuery('#blog_loadMore_style4').addClass('loading-lazy');
    var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
    var $container = jQuery('.blog-loadmore-style4 .row');
    $.ajax({
        type       : "POST",
        data       : {
            action: 'load_more_blog_four',
            numPosts : 2, 
            pageNumber: list_page,
            query_data: data_json,
        },
        //dataType   : "html",
        url        : ogoObj.ajaxURL,
        success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#blog_loadMore_style4').removeClass('loading-lazy');
            } else {
                jQuery("#blog_loadMore_style4").html(ogoObj.loadmoretxt);
                jQuery('#blog_loadMore_style4').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
        },
    })
    list_page++;
})

// Elementor grid five addon Loadmore Function

var list_page = 2;
$(document).on( 'click', '#blog_loadMore_style5', function( event ) {
    event.preventDefault();

    jQuery('#blog_loadMore_style5').addClass('loading-lazy');
    var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
    var $container = jQuery('.blog-loadmore-style5 .row');
    $.ajax({
        type       : "POST",
        data       : {
            action: 'load_more_blog_five',
            numPosts : 2, 
            pageNumber: list_page,
            query_data: data_json,
        },
        //dataType   : "html",
        url        : ogoObj.ajaxURL,
        success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#blog_loadMore_style5').removeClass('loading-lazy');
            } else {
                jQuery("#blog_loadMore_style5").html(ogoObj.loadmoretxt);
                jQuery('#blog_loadMore_style5').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
        },
    })
    list_page++;
})

// Portfolio addon Loadmore Function

var list_page = 2;
$(document).on( 'click', '#portfolio_loadMore', function( event ) {
    event.preventDefault();

    jQuery('#portfolio_loadMore').addClass('loading-lazy');
    var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
    var $container = jQuery('.portfolio-loadmore .row');
    $.ajax({
        type       : "POST",
        data       : {
            action: 'load_more_portfolio',
            numPosts : 2, 
            pageNumber: list_page,
            query_data: data_json,
        },
        //dataType   : "html",
        url        : ogoObj.ajaxURL,
        success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#portfolio_loadMore').removeClass('loading-lazy');
            } else {
                jQuery("#portfolio_loadMore").html(ogoObj.loadmoretxtportfolio);
                jQuery('#portfolio_loadMore').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
        },
    })
    list_page++;
})

// Team addon Loadmore Function 1
    var list_page = 2;
    $(document).on( 'click', '#team_loadMore1', function( event ) {
        event.preventDefault();

        jQuery('#team_loadMore1').addClass('loading-lazy');
        var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
        var $container = jQuery('.team-loadmore-style1 .row');
        $.ajax({
            type       : "POST",
            data       : {
                action: 'load_more_team1',
                numPosts : 2, 
                pageNumber: list_page,
                query_data: data_json,
            },
            //dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
                var $data = jQuery(html);
                if ($data.length) {
                    $container.append( html );
                        jQuery('#team_loadMore1').removeClass('loading-lazy');
                } else {
                    jQuery("#team_loadMore1").html(ogoObj.loadmoretxt);
                    jQuery('#team_loadMore1').removeClass('loading-lazy');
                }
                setTimeout( function() {
                    revealPosts();
                }, 500);
            },
        })
        list_page++;
    })

// Team addon Loadmore Function 2
    var list_page = 2;
    $(document).on( 'click', '#team_loadMore2', function( event ) {
        event.preventDefault();

        jQuery('#team_loadMore2').addClass('loading-lazy');
        var data_json =  JSON.parse( $( this ).attr('data-loadmore') ) ;
        var $container = jQuery('.team-loadmore-style2 .row');
        $.ajax({
            type       : "POST",
            data       : {
                action: 'load_more_team2',
                numPosts : 2, 
                pageNumber: list_page,
                query_data: data_json,
            },
            //dataType   : "html",
            url        : ogoObj.ajaxURL,
            success    : function(html){
                var $data = jQuery(html);
                if ($data.length) {
                    $container.append( html );
                        jQuery('#team_loadMore2').removeClass('loading-lazy');
                } else {
                    jQuery("#team_loadMore2").html(ogoObj.loadmoretxt);
                    jQuery('#team_loadMore2').removeClass('loading-lazy');
                }
                setTimeout( function() {
                    revealPosts();
                }, 500);
            },
        })
        list_page++;
    })

})(jQuery);
