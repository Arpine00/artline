$(".home .owl-carousel").owlCarousel({
    autoplay : true,
    autoplayTimeout: 4000,
    navigation : true,
    items : 1,
    loop: true,
    mouseDrag : true,
    nav: true,
    dots: false,
    margin: 25,
    navText : ["<img src='../images/prev_grey.png'>","<img src='../images/next_blue.png'>"],
});

$(".sliders .owl-carousel").owlCarousel({
    autoplay : true,
    autoplayTimeout: 4000,
    navigation : true,
    items : 4,
    slideBy: 4,
    loop: true,
    mouseDrag : true,
    nav: true,
    dots: false,
    navText : ["<img src='../images/prev_grey.png'>","<img src='../images/next_grey.png'>"],
});

var href = location.href;
$('nav .nav-link').each(function () {
    var data = $(this).attr('href');
    if(data == "/" || href == data){
        $('nav li').removeClass('active');
        $(this).parent().addClass('active');
    }
});

$('nav .dropdown-item').each(function () {
    var data1 = $(this).attr('href');
    if(href == data1){
        $('nav li').removeClass('active');
        $(this).parents('.nav-item').addClass('active');
    }
});

$(".postcode").on("keypress keyup blur",function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(".age").on("keypress keyup blur",function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$('.title').click(function () {
    $('.title_dropdown').css({
        'display': 'flex'
    })
});

var z = false;
$('.title').click( function(event){
    event.stopPropagation();
    if(z){
        $('.title_dropdown').css({
            'display':'none'
        });
        z = false;
    }else{
        $('.title_dropdown').css({
            'display':'flex'
        });
        z = true;
    }
});

$('.title_dropdown').click( function(event){
    event.stopPropagation();
});

$(document).click( function(){
    if(z){
        $('.title_dropdown').css({
            'display':'none'
        })
    }
    z = false;
});

$('.title_dropdown ul > li > p').click(function () {
    var title = $(this).text();
    $('.title').val(title);
    $('.title_dropdown').css({
        'display':'none'
    })
});

$('.state').click(function () {
    $('.state_dropdown').css({
        'display': 'flex'
    })
});

var l = false;
$('.state').click( function(event){
    event.stopPropagation();
    if(l){
        $('.state_dropdown').css({
            'display':'none'
        });
        l = false;
    }else{
        $('.state_dropdown').css({
            'display':'flex'
        });
        l = true;
    }
});

$('.state_dropdown').click( function(event){
    event.stopPropagation();
});

$(document).click( function(){
    if(l){
        $('.state_dropdown').css({
            'display':'none'
        })
    }
    l = false;
});

$('.state_dropdown ul > li > p').click(function () {
    var state = $(this).text();
    $('.state').val(state);
    $('.state_dropdown').css({
        'display':'none'
    })
});

$('.country').click(function () {
    $('.country_dropdown').css({
        'display': 'flex'
    })
});

var v = false;
$('.country').click( function(event){
    event.stopPropagation();
    if(v){
        $('.country_dropdown').css({
            'display':'none'
        });
        v = false;
    }else{
        $('.country_dropdown').css({
            'display':'flex'
        });
        v = true;
    }
});

$('.country_dropdown').click( function(event){
    event.stopPropagation();
});

$(document).click( function(){
    if(v){
        $('.country_dropdown').css({
            'display':'none'
        })
    }
    v = false;
});

$('.country_dropdown ul > li > p').click(function () {
    var country = $(this).text();
    $('.country').val(country);
    $('.country_dropdown').css({
        'display':'none'
    })
});

$('.full1').click(function () {
    $('.full1_dropdown').css({
        'display': 'flex'
    })
});

var b = false;
$('.full1').click( function(event){
    event.stopPropagation();
    if(b){
        $('.full1_dropdown').css({
            'display':'none'
        });
        b = false;
    }else{
        $('.full1_dropdown').css({
            'display':'flex'
        });
        b = true;
    }
});

$('.full1_dropdown').click( function(event){
    event.stopPropagation();
});

$(document).click( function(){
    if(b){
        $('.full1_dropdown').css({
            'display':'none'
        })
    }
    b = false;
});

$('.full1_dropdown ul > li > p').click(function () {
    var full1 = $(this).text();
    $('.full1').val(full1);
    $('.full1_dropdown').css({
        'display':'none'
    })
});

var n = false;
$('.full2').click( function(event){
    event.stopPropagation();
    if(n){
        $('.full2_dropdown').css({
            'display':'none'
        });
        n = false;
    }else{
        $('.full2_dropdown').css({
            'display':'flex'
        });
        n = true;
    }
});

$('.full2_dropdown').click( function(event){
    event.stopPropagation();
});

$(document).click( function(){
    if(n){
        $('.full2_dropdown').css({
            'display':'none'
        })
    }
    n = false;
});

$('.full2_dropdown ul > li > p').click(function () {
    var full2 = $(this).text();
    $('.full2').val(full2);
    $('.full2_dropdown').css({
        'display':'none'
    })
});

var m = false;
$('.full3').click( function(event){
    event.stopPropagation();
    if(m){
        $('.full3_dropdown').css({
            'display':'none'
        });
        m = false;
    }else{
        $('.full3_dropdown').css({
            'display':'flex'
        });
        m = true;
    }
});

$('.full3_dropdown').click( function(event){
    event.stopPropagation();
});

$(document).click( function(){
    if(m){
        $('.full3_dropdown').css({
            'display':'none'
        })
    }
    m = false;
});

$('.full3_dropdown ul > li > p').click(function () {
    var full2 = $(this).text();
    $('.full3').val(full2);
    $('.full3_dropdown').css({
        'display':'none'
    })
});

$('.load_more').click(function () {
    $('.the_flow_blocks').removeClass('hidden_block');
    var pagination_count = parseInt($(this).parent().find('.pagination_count').val()) + 3;
    var count = $(this).parent().find('.the_flow_blocks').length;
    $(this).parent().find('.the_flow_blocks').each(function (key,value) {
        if(key >= pagination_count){
            $(this).addClass('hidden_block');
        }else{
            $(this).removeClass('hidden_block');
        }
        if(pagination_count >= count){
            $('.load_more').css({
                'display' : 'none'
            })
        }
    });
    $('.pagination_count').val(pagination_count);
});

$('.checkmark').click(function () {
    $(this).parent().find('input').click();
});