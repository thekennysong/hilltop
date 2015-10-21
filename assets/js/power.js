
$(function() {

    if ($('#accordion').length > 0) {
        if (window.location.hash) {
            var elem = window.location.hash;

            $('html, body').animate({
                scrollTop: $( elem ).offset().top - 52
            }, 500);

            $(elem).addClass('active');
        }
    }

    if ($('.page-template-page-services').length > 0) {
        if (window.location.hash) {
            var elem1 = window.location.hash;

            $('html, body').animate({
                scrollTop: $( elem1 ).offset().top - 75
            }, 500);
        }
    }




    if ($('#accordion').length > 0) {
        $('#accordion .city').click(function() {

            $('#accordion .city').removeClass('active');
            $(this).addClass('active');
            $('html,body').animate({
                scrollTop: $(this).offset().top - 125
            },500);

        });

        $('#accordion .close-me').click(function() {
            $('#accordion .city').removeClass('active');
            return false;
        });
    }


    $('.toggle-nav').click(function() {
        $('body').toggleClass('show-nav');
        return false;
    });

    matchCities();

});

$(window).resize(function() {

    if ($(window).width() > 768) {
        $('body').removeClass('toggle-class');
    }

    matchCities();

});


function matchCities() {
    $('.home .grid li').css('height', $('.home .grid li').width());
}


$(document).ready(function(){
// Bxslider
    if ($('.bxslider.bxslider-1').length > 0) {
        $('.bxslider.bxslider-1').bxSlider({
            adaptiveHeight: false,
            pager: false,
            mode: 'fade',
            touchEnabled: false,
            speed: 500,
            auto: true,
            pause: 9000,
            autoHover: true,
            'prevText': '<i class="icon-slide-arrow-left"></i>',
            'nextText': '<i class="icon-slide-arrow-right"></i>',
            onSlideBefore: function(slideElement, oldIndex, newIndex) {
                var type = $(slideElement).data('type');
                $('#callout, #site-header-wrap').attr('class', '');
                $('#callout, #site-header-wrap').addClass(type);
            }
        });
    }
    if ($('.bxslider.bxslider-2').length > 0) {
        $('.bxslider.bxslider-2').bxSlider({
            adaptiveHeight: false,
            pager: false,
            touchEnabled: false,
            speed: 800,
            'prevText': '<i class="icon-slide-arrow-left"></i>',
            'nextText': '<i class="icon-slide-arrow-right"></i>'
        });
    }

});


$(window).load(function() {
    //Resizing Call to Action based on Viewport
    //
    var heightHeader;
    var heightWindow;
    function resizer() {
        heightHeader = $('#site-header').outerHeight();
        heightWindow = $(window).outerHeight();
        var height = heightWindow - heightHeader+1;
        var resize = height;
        resize = parseInt(resize) + 'px';
        $("#call-to-action").css('height',resize);


    }



    $(document).ready(function() {

    function loader(){
        $('.wrapper').css({'opacity':'1.0'});
        //$('section').css({'opacity':'1.0'});
    }
        resizer();
        loader();
        $(window).bind('resize', resizer);


    $('#services-top .btn-small-services').click(function(){
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top - 75
        }, 500);
        return false;
    });

    $('.btn-hollow-blueTop').click(function(){
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top - 52
        }, 500);
        return false;
    });

    });



});

