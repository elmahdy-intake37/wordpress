$=jQuery;
$(document).ready(function () {
    // scroll top pgae    
    $('.scroll-up').click(function () {
        $("html, body").animate({scrollTop: 0}, 800);
        return false;
    });

    var buttons = {previous: $('#jslidernews2 .button-previous'),
        next: $('#jslidernews2 .button-next')};
    $('#jslidernews2').lofJSidernews({interval: 5000,
        easing: 'easeInOutQuad',
        duration: 1200,
        auto: true,
        mainWidth: 640,
        mainHeight: 400,
        navigatorHeight: 100,
        navigatorWidth: 354,
        maxItemDisplay: 4,
        buttons: buttons});

    // News slider > Minimal
    $(".newslider-minimal").sliderkit({
        auto: true,
        circular: true,
        shownavitems: 1,
        panelfx: "sliding",
        panelfxspeed: 400,
        panelfxeasing: "easeOutCirc",
        mousewheel: true,
        verticalnav: true,
        verticalslide: true
    });
});

