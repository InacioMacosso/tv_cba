

$(document).ready(function() {
    if ($(window).width() > 992) {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 40) {
                $('.cabecalho2').addClass("fixed-top bg-primary");
                $('.item-nav').addClass("text-white");
                $('#cabecalho1').removeClass("d-block");
                // add padding top to show content behind navbar
            }else{
                $('.cabecalho2').removeClass("fixed-top bg-primary ");
                $('.item-nav').removeClass("text-white");
                $('#cabecalho1').addClass("d-block");
                // remove padding top from body
                $('body').css('padding-top', '0');
            }
        });
    }
    let nav = $('.item-nav');
    nav.mouseenter(function(){
        $(this).addClass("text-danger");
        if ($(window).scrollTop() > 40){
            $(this).removeClass("text-white");
        }
    });

    nav.mouseleave(function(){
        $(this).removeClass("text-danger");
        if ($(window).scrollTop() > 40){
            $(this).addClass("text-white");
        }
    })
    $("[painel]").addClass("active");

    let footer2Item = $('.footer2-item')

    footer2Item.mouseenter(function(){
        $(this).addClass("bg-primary")})
    footer2Item.mouseleave(function(){
        $(this).removeClass("bg-primary")})

});