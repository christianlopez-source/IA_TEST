
// Start Window Load Function
$(window).on('load', function() {

    'use strict';


    //*********************************************
    //  REVOLUTION SLIDER FOR HOME
    //*********************************************

        var tpj=jQuery;
        var revapi2;
        if(tpj("#home_slider").revolution == undefined){
            revslider_showDoubleJqueryError("#home_slider");
        }else{
            revapi2 = tpj("#home_slider").show().revolution({
                sliderType:"standard",
                jsFileLocation:"js/revolutionslider/",
                sliderLayout:"fullscreen",
                delay:9000,
                navigation: {
                    arrows: {
                        style: "hermes",
                        enable: true,
                        hide_onmobile: true,
                        hide_onleave: true,
                        tmp: '<div class="tp-arr-allwrapper"><div class="tp-arr-imgholder"></div><div class="tp-arr-titleholder">{{title}}</div></div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 0,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 0,
                            v_offset: 0
                        }
                    },
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },
                responsiveLevels:[1240,1240,778,480],
                visibilityLevels:[1240,1240,778,480],
                gridwidth:[1240,1240,778,480],
                gridheight:[868,768,480,380],
                parallax: {
                    type:"scroll",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,8,10,12,16,30],
                },
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:0,
                stopAtSlide:0,
                disableProgressBar:"on",
                shuffle:"off",
            });
        }

    //*********************************************
    //  PORTFOLIO SECTION
    //*********************************************

        $('#works #items').cubeportfolio({
            filters: '#works #filters',
            loadMore: '#loadmore',
            loadMoreAction: 'click',
            layoutMode: 'grid',
            mediaQueries: [{
                width: 1500,
                cols: 4
            }, {
                width: 900,
                cols: 3
            }, {
                width: 800,
                cols: 2
            }, {
                width: 640,
                cols: 2
            }, {
                width: 480,
                cols: 1,
                gapHorizontal: 0,
                gapVertical: 0
            }],
            defaultFilter: '*',
            animationType: 'quicksand',
            gapHorizontal: 15,
            gapVertical: 15,
            gridAdjustment: 'responsive',
            caption: 'zoom',
            displayType: 'sequentially',
            displayTypeSpeed: 100,
        });

    //*********************************************
    //  VIDEO SECTION
    //*********************************************

        var revapi42;
        if(tpj("#background-video").revolution == undefined){
            revslider_showDoubleJqueryError("#background-video");
        }else{
            revapi42 = tpj("#background-video").show().revolution({
                sliderType:"hero",
                jsFileLocation:"../../revolution/js/",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                responsiveLevels:[1240,1024,778,480],
                visibilityLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[660,450,400,350],
                lazyType:"none",
                parallax: {
                    type:"scroll",
                    origo:"enterpoint",
                    speed:400,
                    levels:[5,10,15,20,25,30,35,40,45,50],
                },
                shadow:0,
                spinner:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false

            });
        }


    //*********************************************
    //  FAQ OPTIONS ON QUADRA MODAL
    //*********************************************
        // init cubeportfolio
        $('#js-grid-faq').cubeportfolio({
            filters: '#js-filters-faq',
            defaultFilter: '*',
            animationType: 'sequentially',
            gridAdjustment: 'default',
            displayType: 'default',
            caption: 'expand',
            gapHorizontal: 0,
            gapVertical: 0,
        });

    //*********************************************
    //  TEAM TYPE 2 SCRIPTS
    //*********************************************

        // Team type 2 scripts
        $.fn.team2Function = function() {
            $('.team-type-2 .member').each(function(){
                var descBody = $(this).find('.member-description'),
                    $this = $(this),
                    descBodyHeight = $(descBody).height() / 2,
                    bodyHeight = $(this).find('.member-body').height() / 2;
                if(!!('ontouchstart' in window)){//check for touch device
                    $('div').not($this).on('touchstart touchmove', function (e) {
                         $(descBody).css({'top': 0});
                    });
                    $('body').on('touchstart touchmove', function (e) {
                         $(descBody).css({'top': 0});
                    });
                    $this.on('touchstart touchend touchmove', function (e) {
                        $(descBody).css({'top': - bodyHeight - descBodyHeight - 20});
                    });
                }else{
                    $(this).on('mouseover', function(){
                        var descBody = $(this).find('.member-description'),
                        descBodyHeight = $(descBody).height() / 2,
                        bodyHeight = $(this).find('.member-body').height() / 2;
                        $(descBody).css({'top': - bodyHeight - descBodyHeight - 20});
                    });
                    $(this).on('mouseout', function(){
                        $(descBody).css({'top': 0});
                    });
                }
            });
        }
        $('.team-type-2').team2Function();
        $(window).resize(function(){ $('.team-type-2').team2Function(); });

// End Function
});



//logo


const logoAnimation = anime.timeline({ 
  autoplay: true,
  delay: 200
});

logoAnimation.add({
  targets: '#neon',
  translateY: [-100, 0],
  opacity: [0, 1],
  elasticity: 600,
  duration: 1600
}).add({
  targets: '#logo-hexagon',
  rotate: [-90, 0],
  duration: 1200,
  elasticity: 600,
  offset: 100
}).add({
  targets: '#logo-circle',
  scale: [0, 1],
  duration: 1200,
  elasticity: 600,
  offset: 500
}).add({
  targets: '#logo-mask',
  scale: [0, 1],
  duration: 1000,
  elasticity: 600,
  offset: 550
}).add({
  targets: '#logo-text',
  translateX: ['-100%', 0],
  opacity: [0, 1],
  duration: 1000,
  easing: 'easeOutExpo',
  offset: 1000
})
