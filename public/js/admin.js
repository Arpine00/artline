// Hide submenus
$('#body-row .collapse').collapse('hide');

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left');

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }

    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}

var href = location.href;
$('.list-group > a').each(function () {
    var data = $(this).attr('href');
    if(href == data){
        $('.list-group > a').removeClass('active_menu');
        $(this).addClass('active_menu');
    }
});

var where_to_buy = "";
$('.add_where_to_buy').click(function () {
    event.preventDefault();
    var where_item = $('.select_where_to_buy').val();
    if(where_item !== ""){
        if(where_to_buy == ""){
            where_to_buy = where_to_buy + where_item;
        }else{
            where_to_buy = where_to_buy + "," + where_item;
        }
    }
    $('.where_to_buy_show').html(where_to_buy);
    $('.where_to_buy').val(where_to_buy);
});

var where_to_buy1 = "";
$('.add_where_to_buy1').click(function () {
    event.preventDefault();
    var where_item1 = $('.select_where_to_buy1').val();
    if(where_item1 !== ""){
        if(where_to_buy1 == ""){
            where_to_buy1 = where_to_buy1 + where_item1;
        }else{
            where_to_buy1 = where_to_buy1 + "," + where_item1;
        }
    }
    $('.where_to_buy_show1').html(where_to_buy1);
    $('.where_to_buy1').val(where_to_buy1);
});

var artist_uses2 = "";
$('.add_artist_uses2').click(function () {
    event.preventDefault();
    var artist_uses_item2 = $(this).parent().find('.select_artist_uses2').val();
    console.log(artist_uses_item2);
    if(artist_uses_item2 !== ""){
        if(artist_uses2 == ""){
            artist_uses2 = artist_uses2 + artist_uses_item2;
        }else{
            artist_uses2 = artist_uses2 + "," + artist_uses_item2;
        }
    }
    $('.text_artist_uses2').html(artist_uses2);
    $('.artist_uses2').val(artist_uses2);
});

var artist_uses1 = "";
$('.add_artist_uses1').click(function () {
    event.preventDefault();
    var artist_uses_item1 = $('.select_artist_uses1').val();
    if(artist_uses_item1 !== ""){
        if(artist_uses1 == ""){
            artist_uses1 = artist_uses1 + artist_uses_item1;
        }else{
            artist_uses1 = artist_uses1 + "," + artist_uses_item1;
        }
    }
    $('.text_artist_uses1').html(artist_uses1);
    $('.artist_uses1').val(artist_uses1);
});