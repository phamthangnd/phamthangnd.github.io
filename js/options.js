var teslaThemes = {

  settings: {
    scripts: [
      'js/plugins/queryloader.js',
      'js/plugins/simple-slider.js',
      'js/plugins/isotope.pkgd.min.js',
      'js/plugins/swipebox.js',
      'js/plugins/placeholder.js',
      'js/plugins/enquire.js',
      'js/plugins/jquery.roundabout.js',
      'js/plugins/jquery.finger.js',
      'js/plugins/jquery.stellar.min.js'
    ]
  },

  init: function() {
    "use strict";
    this.loadScripts();
  },

  module: function() {
    "use strict";
    this.queryLoader();
    this.parallaxEffect();
    this.roundSlider();
    this.simpleSlider();
    this.menu();
    this.zoomImage();
    this.eventsRegister();
    this.izotopeList();
    this.contactForm();
  },

  loadScripts: function() {
    "use strict";
    teslaThemes.module();
    /*
    Modernizr.load([
      {
        load: [
                'js/jquery.js',
                'js/bootstrap.js'
              ],

        complete: function () {
            var scripts = [];

            jQuery.each(teslaThemes.settings.scripts,function(index,script){
              scripts[index] = jQuery.getScript(script);
            });

            jQuery.when.apply( jQuery, scripts ).done( function(){
              teslaThemes.module();
            });
        }
      },
      {
        test: window.matchMedia,
        nope: ['js/media.match.js']
      }
    ]);
    */
  },

  queryLoader: function() {
    "use strict";
    jQuery(document).ready(function() {
      showContent();

      function showContent() {
        jQuery('#home').addClass('show-content');
      }
    });
  },

  sticky: function() {
    "use strict";
    if (jQuery('.sticky-bar').length) {
      jQuery(".sticky-bar").sticky({
        topSpacing: 0
      });
    }
  },

  fitvids: function() {
    "use strict";
    var video = jQuery('noscript').text();

    if (video.trim().search('iframe') === 1) {
      jQuery('noscript').parent().append(video);
    }


    jQuery("#home").fitVids({
      customSelector: "iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com']"
    });
  },

  scrolld: function() {
    "use strict";
    jQuery(".main-nav > ul > li > a, .intro-button").stop(true).on('click', function(e) {
      jQuery(".main-nav > ul > li").removeClass('current-menu-item');

      if (jQuery(this).hasClass('intro-button')) {
        jQuery(".main-nav > ul > li").eq(0).addClass('current-menu-item');
      } else {
        jQuery(this).parent().addClass('current-menu-item');
      }


      e.preventDefault();
      jQuery(this).scrolld({
        scrolldEasing: 'easeOutBack'
      });
    });
  },

  menu: function () {
    "use strict";
    var menu = jQuery('.responsive-main-nav');
    var bodyPosition;
    var menuButtonHTML = '<a href="#" class="mobile-menu-button"><i class="icon-62"></i></a>';
    var menuButtonHolder = jQuery('.menu-button');
    var menuMarkup = menu.clone();
        //menuMarkup.prepend(menuButtonHTML);

        jQuery(document).on('click', '.mobile-menu-button', function(e) {
          e.preventDefault();

          if(menuMarkup.hasClass('active-menu')) {
            menuMarkup.removeClass('active-menu');
          }else {
            menuMarkup.toggleClass('active-menu');            
          }

          if(jQuery('body').hasClass('active-menu')) {
             jQuery('body').removeClass('active-menu');
          }else {            
            jQuery('body').toggleClass('menu-effect');
          }
        });

        jQuery(document).on('drag', 'body .responsive-main-nav', function(e) {
            bodyPosition = -(e.adx - 200);

            if(e.adx < 100) {
              jQuery('body.menu-effect .boxed-view').css({
                '-webkit-transform': 'translate3d('+bodyPosition+'px,0,0)'
              });
            }

            if(e.end === true) {
                jQuery('body.menu-effect .boxed-view').removeAttr("style");
              if(e.adx > 100) {
                jQuery('body ').removeClass('menu-effect');
                jQuery('body > .responsive-main-nav').removeClass('active-menu');
              }
            }
            //jQuery('body .main-nav').removeClass('active-menu');
            //jQuery('body ').removeClass('menu-effect');              
        });

        enquire.register("screen and (max-width:992px)", {

            // OPTIONAL
            // If supplied, triggered when a media query matches.
            match : function() {
              menu.hide();
              jQuery('body').prepend(menuMarkup);
              menuButtonHolder.append(menuButtonHTML);
            },

                                        
            // OPTIONAL
            // If supplied, triggered when the media query transitions 
            // *from a matched state to an unmatched state*.
            unmatch : function() {
             menuMarkup.remove();
             menu.show();
             jQuery('.logo .mobile-menu-button').remove();
            },    
            
            // OPTIONAL
            // If supplied, triggered once, when the handler is registered.
            setup : function() {},    
                                        
            // OPTIONAL, defaults to false
            // If set to true, defers execution of the setup function 
            // until the first time the media query is matched
            deferSetup : true,
                                        
            // OPTIONAL
            // If supplied, triggered when handler is unregistered. 
            // Place cleanup code here
            destroy : function() {}
              
        });

  },

  roundSlider: function(){
    "use strict";
      (function( $ ) {
        $(function() {
          var $controls = $('#carousel-controls').find('span');
                var $carousel = $('#round_slider').roundabout({childSelector:"li", minScale: 0.8, minOpacity:1, autoplay:true, autoplayDuration:5000, autoplayPauseOnHover:true }).on('focus', 'li', function() {
                    var slideNum = $carousel.roundabout("getChildInFocus");
                    $($controls.get(slideNum)).addClass('current');
                  });

            $controls.on('click dblclick', function() {
              var slideNum = -1,
                i = 0, len = $controls.length;

              for (; i<len; i++) {
                if (this === $controls.get(i)) {
                  slideNum = i;
                  break;
                }
              }
              
              if (slideNum >= 0) {
                $controls.removeClass('current');
                $(this).addClass('current');
                $carousel.roundabout('animateToChild', slideNum);
              }
            });
  /*
          jQuery('#round_slider').roundabout({
           autoplay: false, 
           autoplayDuration: 5000,
           autoplayPauseOnHover: true,
           minScale: 0.8,
           duration: 800,
           easing: "swing",
           minOpacity: 1
        });
        */  
        });
      })(jQuery);
  },

  simpleSlider: function() {
    "use strict";
    jQuery(document).ready(function() {
      if ( jQuery('#simple_slider').length ){
    var simple_slider = jQuery('#simple_slider').sudoSlider({
          numeric: false,
          auto: false,
          responsive: true,
          vertical: false,
          autoHeight: true,
          moveCount: 1,
          slideCount: 3,
          prevhtml: ' <a href="#" class="prev-nav"></a> ',
          nexthtml: ' <a href="#" class="next-nav"></a> ',
          controlsattr: 'id="slider_controls" class="slider-controls"',
          numericattr: 'class="page-slider-nav"',
          continuous: false,
          animationZIndex: 10
        });

        jQuery(window).resize(function() {

          if (jQuery(window).width() < 992 && jQuery(window).width() > 660) {
              simple_slider.setOption('slideCount', 2);
              simple_slider.setOption('moveCount', 2);
          } else if (jQuery(window).width() < 660 ) {
              simple_slider.setOption('slideCount', 1);
              simple_slider.setOption('moveCount', 1);
          }
          else {
              simple_slider.setOption('slideCount', 3);
              simple_slider.setOption('moveCount', 3);
          }
        });

          if (jQuery(window).width() < 992 && jQuery(window).width() > 660) {
              simple_slider.setOption('slideCount', 2);
              simple_slider.setOption('moveCount', 2);
          } else if (jQuery(window).width() < 660 ) {
              simple_slider.setOption('slideCount', 1);
              simple_slider.setOption('moveCount', 1);
          } else {
              simple_slider.setOption('slideCount', 3);
              simple_slider.setOption('moveCount', 3);
          }
      }


    });
  },

  parallaxEffect: function() {
    "use strict";
    (function( $ ) {
      $(function() {

        $.stellar({
          horizontalScrolling: false,
          verticalOffset: 40
        });

        var timeout = null;

        $(window).resize(function(){
          timeout = setTimeout (function() {
            $(window).data('plugin_stellar').destroy();
            $(window).data('plugin_stellar').init();
          }, 500);
        });
      });
    })(jQuery);
  },

  tabs: function() {
    "use strict";
    jQuery(document).ready(function() {

      jQuery('#tabs_widgets a').click(function(e) {
        e.preventDefault();
        jQuery(this).tab('show');
      });

      jQuery('#toggle_tabs a').click(function(e) {
        e.preventDefault();
        jQuery(this).tab('show');
      });

    });
  },

  zoomImage: function() {
    "use strict";
    jQuery(function(){
      if ( jQuery('.zoom-image').length ){
        jQuery('.zoom-image').swipebox();
      }
    });
  },

  barPercentage: function(){
    "use strict";
      (function($){
        $( function(){

          $('.bar-percentage[data-percentage]').each(function () {
              var progress = $(this);
              var percentage = Math.ceil($(this).attr('data-percentage'));

                $({countNum: 0}).animate({countNum: percentage}, {
                  duration: 2000,
                  easing:'linear',
                  step: function() {
                    // What todo on every count
                  var pct = '';
                  if(percentage === 0){
                    pct = Math.floor(this.countNum) + '%';
                  }else{
                    pct = Math.floor(this.countNum+1) + '%';
                  }
                  progress.text(pct) && progress.siblings().css('width', pct);
                  }
                });
            });
        });
      })(jQuery);
  },

  eventsRegister: function() {
    "use strict";
      (function($){
        $( function(){

          $('.share-links li a').click(function (e) {
            e.preventDefault();
          });

          var flag = false;
          window.onscroll=function(){

            if ( jQuery('.percentage-it').is(':appeared') && !flag){
                flag = true;
                teslaThemes.barPercentage();
              }
          };
              
      });
    })(jQuery);
  },

  izotopeList: function() {
    "use strict";
    jQuery(document).ready(function() {
      
      var box = jQuery('.filter-items');
      
      if ( box.length ){
        box.imagesLoaded( function(){
          box.isotope({
            itemSelector: jQuery('#gallery_view').length ? '.gallery-item' : 'li',
            layoutMode: 'fitRows'
          });
        });
      }

      jQuery('#filters_view').on( 'click', 'a', function(evt) {
        evt.preventDefault();
        jQuery('#filters_view a').removeClass('active');
        var filterValue = jQuery(this).addClass('active').attr('data-filter');

        box.isotope({
          filter: filterValue
        });

      });
    });
  },

  contactForm: function() {
    "use strict";

    jQuery('.contact-form').each(function() {
      var t = jQuery(this);
      var t_result = jQuery('#submit');
      var t_result_init_val = t_result.val();
      var validate_email = function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      };
      var t_timeout;
      jQuery(this).submit(function(event) {

        event.preventDefault();
        var t_values = {};
        var t_values_items = t.find('input[name],textarea[name]');

        t_values_items.each(function() {
          t_values[this.name] = jQuery(this).val();
        });


        if (t_values['name'] === '' || t_values['e-mail'] === '' || t_values['message'] === '') {
          t_result.val('Please fill in all the required fields.');
        } else
        if (!validate_email(t_values['e-mail']))
          t_result.val('Please provide a valid e-mail.');
        else
          jQuery.post("php/contacts.php", t.serialize(), function(result) {
            t_result.val(result);
          });
        clearTimeout(t_timeout);
        t_timeout = setTimeout(function() {
          t_result.val(t_result_init_val);
        }, 3000);
      });
    });
  }
};

teslaThemes.init();