jQuery(document).ready(function ($) {
    "use strict";
    /**-------------------------------------------------
     *Fixed Header
     *----------------------------------------------------**/
    $(window).on('scroll', function () {

        /**Fixed header**/
        if ($(window).scrollTop() > 250) {
            $('.navbar-sticky').addClass('sticky fade_down_effect');
        } else {
            $('.navbar-sticky').removeClass('sticky fade_down_effect');
        }
    });


    /* ----------------------------------------------------------- */
    /*  Mobile Menu
    /* ----------------------------------------------------------- */
    $('.dropdown > a').on('click', function (e) {
        e.preventDefault();
        if ($(window).width() > 991) {
            location.href = this.href;
        }
        var dropdown = $(this).parent('.dropdown');
        dropdown.find('>.dropdown-menu').slideToggle('show');
        $(this).toggleClass('opened');
        return false;
    });


    /* ----------------------------------------------------------- */
    /*  tooltip
    /* ----------------------------------------------------------- */
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    /* ----------------------------------------------------------- */
    /*  Site search
    /* ----------------------------------------------------------- */


    $('.nav-search').on('click', function () {
        $('.search-block').fadeIn(350);
        $('.nav-search').addClass('hide');
    });

    $('.search-close').on('click', function () {
        $('.search-block').fadeOut(350);
        $('.nav-search').removeClass('hide');
    });

    $(document).on('mouseup', function (e) {
        var container = $(".nav-search-area");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.search-block').fadeOut(350);
            $('.nav-search').removeClass('hide');
        }

    });
    /* ----------------------------------------------------------- */
    /*  Video popup
    /* ----------------------------------------------------------- */

    if ($('.ts-play-btn').length > 0) {
        $('.ts-play-btn').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    }

    if ($('.play-btn').length > 0) {
        $('.play-btn').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    }
    /* ----------------------------------------------------------- */
    /*  Back to top
    /* ----------------------------------------------------------- */

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > $(window).height()) {
            $(".BackTo").fadeIn('slow');
        } else {
            $(".BackTo").fadeOut('slow');
        }

    });
    $("body, html").on("click", ".BackTo", function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 800);
    });


    /*---------------====================
      side menu
  ================-------------------*/

    $(".fixed-sidebar-nav ul li.menu-item-has-children > a").on("click", function () {


        var element = $(this).parent("li");
        if (element.hasClass("open")) {
            element.removeClass("open");
            element.find("li").removeClass("open");
            element.find("ul").slideUp(500, "linear");
        } else {
            element.addClass("open");
            element.children("ul").slideDown();
            element.siblings("li").children("ul").slideUp();
            element.siblings("li").removeClass("open");
            element.siblings("li").find("li").removeClass("open");
            element.siblings("li").find("ul").slideUp();
        }


    });


    $(".xs-sidenav").overlayScrollbars({
        className: "os-theme-light",
    });



    $(".open-sidemenu").on("click", function () {
        $(".open-sidemenu").toggleClass("open-menu");
        $(".xs-sidenav, .xs-content").toggleClass("xs-active");
    });

    /*
    * Microsoft edge css support
    * blend mode supoort
    */
    if ($('.elementor-background-overlay').length > 0) {
        let supportsMixBlendMode = window.getComputedStyle(document.body).mixBlendMode,
            supportsBackgroundBlendMode = window.getComputedStyle(document.body).backgroundBlendMode;

        if (supportsMixBlendMode === undefined || supportsBackgroundBlendMode === undefined) {
            $('.elementor-background-overlay').addClass('blend-mode-unset').append('<div class="blend-mode-overlay"></div>');
        }
    }
    // Dynamic webfont loads
    if (fontList) {
        //eslint-disable-next-line
        const observeFontList = fontList.map((fontName) => {
            //eslint-disable-next-line
            const observer = new FontFaceObserver(fontName);
            return observer.load();
        });

        Promise.all(observeFontList).then(function () {
            document.documentElement.className += ' fonts-loaded';
        });
    } else {
        const body_font = new FontFaceObserver('Rubik');
        const heading_font_one = new FontFaceObserver('Merriweather');
        const heading_font_two = new FontFaceObserver('Poppins');
        const heading_font_three = new FontFaceObserver('Poppins');
        Promise.all([
            body_font.load(),
            heading_font_one.load(),
            heading_font_two.load(),
            heading_font_three.load(),
        ]).then(function () {
            document.documentElement.className += ' fonts-loaded';
        });
    }
    //Background image lazy load
    const loadScripts_PreloadTimer = setTimeout(triggerScriptLoader_Preload, 8e3),
        userInteractionEvents_Preload = [
            "mouseover",
            "keydown",
            "touchstart",
            "touchmove",
            "wheel",
        ];
    function triggerScriptLoader_Preload() {
        document.querySelector("html").classList.add("is-active-page"),
            clearTimeout(loadScripts_PreloadTimer);
    }
    userInteractionEvents_Preload.forEach(function (e) {
        window.addEventListener(e, triggerScriptLoader_Preload, {
            passive: !0,
        });
    });
	
	// Quadradinhos da seção de serviços
	$(".items-2342").hide();
	$(".items-2343").hide();
	
	$("#elementor-tab-title-2341").on("click", function () {
		$(".items-2342").hide();
		$(".items-2343").hide();
		$(".items-2341").show();	
	});
	
	$("#elementor-tab-title-2342").on("click", function () {
		$(".items-2341").hide();
		$(".items-2343").hide();
		$(".items-2342").show();	
	});
	
	$("#elementor-tab-title-2343").on("click", function () {
		$(".items-2341").hide();
		$(".items-2342").hide();
		$(".items-2343").show();	
	});
																		
});

jQuery(window).on('load', function () {
    setTimeout(() => {
        jQuery('.blo-preloder').slideUp(1000);
    }, 1000);
})
