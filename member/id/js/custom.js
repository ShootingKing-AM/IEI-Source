/* -------------------------------------------------------------------------------

    Custom JS

---------------------------------------------------------------------------------- */


$(window).load(function() {

    /* --------------------------------------------------------------------------- */
    /*  Flex Slider
    /* --------------------------------------------------------------------------- */
    $('.flexslider').flexslider({
        animation           : "fade",              //String: Select your animation type, "fade" or "slide"
        slideDirection      : "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow           : true,                //Boolean: Animate slider automatically
        slideshowSpeed      : 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration   : 600,         //Integer: Set the speed of animations, in milliseconds
        directionNav        : false,            //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav          : true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav         : true,              //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel          : false,              //Boolean: Allow slider navigating via mousewheel
        prevText            : "",                   //String: Set the text for the "previous" directionNav item
        nextText            : "",                   //String: Set the text for the "next" directionNav item
        pausePlay           : false,               //Boolean: Create pause/play dynamic element
        pauseText           : '',                  //String: Set the text for the "pause" pausePlay item
        playText            : 'Play',               //String: Set the text for the "play" pausePlay item
        randomize           : false,               //Boolean: Randomize slide order
        slideToStart        : 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop       : true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction       : true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover        : false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        controlsContainer   : "",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.
        manualControls      : "",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
        start               : function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
        before              : function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
        after               : function(){},            //Callback: function(slider) - Fires after each slider animation completes
        end                 : function(){}
    });

});


$(document).ready(function() { 

    /* --------------------------------------------------------------------------- */
    /*  Easytabs
    /* --------------------------------------------------------------------------- */

    var $content            = $("#content");

    $content.easytabs({
        tabs                :"> .navigation > ul > li",
        animate             : true,
        updateHash          : true,
        animationSpeed      :'normal',
    });


    /* --------------------------------------------------------------------------- */
    /*  Isotope
    /* --------------------------------------------------------------------------- */
    
    var $container          = $('#portfolio-feed');
    var $filter             = $('#portfolio-filter');
    
    // Initialize isotope 
    $container.isotope({
        filter              : '*',
        layoutMode          : 'masonry',
        animationOptions    : {
        duration            : 750,
        easing              : 'linear'
        }
    }); 
    
    // Filter items when filter link is clicked
    $filter.find('a').click(function() {
        var selector = $(this).attr('data-filter');
        $filter.find('a').removeClass('current');
        $(this).addClass('current');
        $container.isotope({ 
            filter             : selector,
            animationOptions   : {
            animationDuration  : 750,
            easing             : 'linear',
            queue              : false,
            }
        });
        return false;
    }); 
    

    /* --------------------------------------------------------------------------- */
    /*  Adipoli
    /* --------------------------------------------------------------------------- */

    $container.find('img').adipoli({
        'startEffect'       : 'overlay',
        'hoverEffect'       : 'normal',
        'imageOpacity'      : 0.15,
        'animSpeed'         : 400,
    });
    
    
    /* --------------------------------------------------------------------------- */
    /*  Fancybox
    /* --------------------------------------------------------------------------- */
    
    $container.find('.folio').fancybox({
        padding             : 56,
        prevEffect          : 'fade',
        nextEffect          : 'fade',
        prevSpeed           : 'slow',
        nextSpeed           : 'slow',
        openSpeed           : 'slow',
        closeSpeed          : 'fast',
        helpers             : {
            overlay: {
                opacity     : 0.8,
                },
            title: {
                type        : 'inside'
            }
        }
    });


    /* --------------------------------------------------------------------------- */
    /*  Google Maps
    /* --------------------------------------------------------------------------- */

    var $latlng             = new google.maps.LatLng(34.021453,-118.785027),
        $myOptions          = {
            zoom            : 16,
            center          : $latlng,
            panControl      : false,
            zoomControl     : true,
            scaleControl    : false,
            mapTypeControl  : false,
            mapTypeId       : google.maps.MapTypeId.ROADMAP
        },
        $tabContact         = ('tab-contact');

    $content.bind('easytabs:after', function(evt,tab,panel) {
        if ( tab.hasClass($tabContact) ) {
            var $map = new google.maps.Map(document.getElementById("map"), $myOptions);
            var marker = new google.maps.Marker({
                position: $latlng,
                map: $map, 
                title: ""
            });
        }
    });


    /* --------------------------------------------------------------------------- */
    /*  Contact Form
    /* --------------------------------------------------------------------------- */
    
    var $contactform        = $('#contactform'),
        $success            = 'Your message was successfully sent.';

    // Validate form on keyup and submit
    $contactform.validate({
        rules: {
            name: {
                required    : true,
                minlength   : 1
            },
            email: {
                required    : true,
                email       : true
            },
            message: {
                required    : true,
                minlength   : 1
            }
        },
        messages: {
            name: {
                required    : "Please enter your name.",
                minlength   : jQuery.format("Your name needs to be at least {0} characters")
            },
            email: {
                required    : "Please enter a valid email address.",
                minlength   : "Please enter a valid email address"
            },
            message: {
                required    : "You need to enter a message.",
                minlength   : jQuery.format("Enter at least {0} characters")
            }
        },
    });

    // Send the email
    $contactform.submit(function(){
        if ($contactform.valid()){
            $.ajax({
                type: "POST",
                url: "php/contact.php",
                data: $(this).serialize(),
                success: function(msg) {
                    if (msg == 'SEND') {
                        response = '<div class="success">'+ $success +'</div>';
                    }
                    else {
                        response = '<div class="error">'+ msg +'</div>';
                    }
                    $(".error,.success").remove();
                    $contactform.prepend(response);
                }
             });
            return false;
        }
        return false;
    });


    /* --------------------------------------------------------------------------- */
    /*  In-Field Labels
    /* --------------------------------------------------------------------------- */

    $(function(){
        $(".flabel").inFieldLabels();
    });

    
});