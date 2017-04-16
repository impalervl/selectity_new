/**
 * Created by Асус on 15.04.2017.
 */
$(document).ready(function() {
    $('#carousel-header').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        variableWidth: true

    });
    $("#product1").click(function() {
        $('html, body').animate({
            scrollTop: $("#abb").offset().top
        }, 2000);
    });
    $("#product2").click(function() {
        $('html, body').animate({
            scrollTop: $("#abb").offset().top
        }, 2000);
    });
    $("#product3").click(function() {
        $('html, body').animate({
            scrollTop: $("#abb").offset().top
        }, 2000);
    });
    $("#product4").click(function() {
        $('html, body').animate({
            scrollTop: $("#eaton").offset().top
        }, 2000);
    });
    $("#product5").click(function() {
        $('html, body').animate({
            scrollTop: $("#eaton").offset().top
        }, 2000);
    });
    $("#product6").click(function() {
        $('html, body').animate({
            scrollTop: $("#hager").offset().top
        }, 2000);
    });
    $("#product7").click(function() {
        $('html, body').animate({
            scrollTop: $("#promfaktor").offset().top
        }, 2000);
    });
    $("#product8").click(function() {
        $('html, body').animate({
            scrollTop: $("#snider").offset().top
        }, 2000);
    });
    $("#product9").click(function() {
        $('html, body').animate({
            scrollTop: $("#iek").offset().top
        }, 2000);
    });

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    $('#carousel-info').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true
    });
/*
    $('#refer0').click(function(){
        var carouselInfo = $('#carousel-info');

        $('#carousel-info .slick-slide').removeClass('slick-current slick-active').attr('aria-hidden', 'true');
        $('#carousel-info .slick-slide[data-slick-index=0]').addClass('slick-current slick-active slick-center').attr('aria-hidden', 'false');

        console.log($('#carousel-info .slick-slide'));

       //
    });*/


});