jQuery(function() { objectFitImages() });

jQuery(document).ready(function(jQuery) {
    /*
     * MMenu Setup
     */
    /*jQuery('#the-menu').mmenu({
      offCanvas: {
        position: 'right'
      }
    });*/

    jQuery('.swipebox').swipebox({
        hideBarsDelay: 0,
    });

    jQuery("#the-menu").mmenu({
        offCanvas: {
            position: "right"
        },
        navbar: {
            add: true,
            title: ""
        }
    });
    // Quan és mobil...
    if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {}


});

jQuery(window).load(function() {


    var gutter = parseInt(jQuery('.grid-item').css('marginBottom'));
    var theGrid = jQuery('.grid');

    theGrid.imagesLoaded().progress(function() {
        theGrid.masonry({
            gutter: 0,
            itemSelector: '.grid-item',
            columnWidth: '.grid-item',
            percentPosition: true
        });
    });

    jQuery('body').on('click', '#navigation-services', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            var compensate = 0;
            var canAnimate = true;
            var screenWidth = jQuery(window).width();

            switch (this.hash) {
                default: compensate = jQuery('.masterHead').outerHeight(true);
                break;
            }
            if (target.length && canAnimate) {
                jQuery('html,body').animate({
                    scrollTop: target.offset().top - compensate
                }, 1000);
                return false;
            }
        }
    });

    var href = document.location.href;
    if (href.indexOf('#') != -1) {
        var hrefDesiredValue = href.substring(href.indexOf('#'), href.length);
        jQuery('a[href="' + hrefDesiredValue + '"]').trigger("click");
    }

    /*jQuery('navigation-services').click(function(){
      alert("Entra");
      jQuery('html, body').animate({
          scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
      }, 500);
      return false;
    });*/
});