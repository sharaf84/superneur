// JavaScript Document
$('.sideMenuLink').click(function() {
    if ($(this).hasClass("open")) {
        $(this).removeClass('open');
        $('.all').animate({left: '0'}).css({position: 'relative'});
        $('.menuHolder,.side').animate({left: '-265px'}, {queue: false});
    }
    else {

        $(this).addClass('open');
        $('.all').animate({left: '265px'}).css({position: 'fixed'});
        $('.menuHolder').animate({left: '0'}, {queue: false});
    }
});
$('#slider').nivoSlider();
$('.loginSide').click(function() {
    $('.login').addClass('loginmob');
    $('.all').css({position: 'fixed'});
});
/*
 $('.login').click(function(){
 if($(this).hasClass('loginmob')){
 $(this).removeClass('loginmob');	
 }
 });
 */

$(".videoScroll").mCustomScrollbar({theme: "dark"});
$(".audioScroll").mCustomScrollbar({theme: "dark"});




$(".media .controls div").click(function() {
    $(this).addClass("active").siblings().removeClass("active");
    $(".media .listing").eq($(this).index()).addClass("active").siblings().removeClass("active");
});

$("nav > ul > li").click(function() {
    $(this).addClass("currentMenu").siblings().removeClass("currentMenu");
});




