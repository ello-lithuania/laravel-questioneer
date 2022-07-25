$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    
    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);

    /* */
    
    $(".btn-add-more-hints").on('click', function(event) {
        event.preventDefault();
        $('#question-hint-group').clone().insertBefore(".btn-add-more-hints");
    });
    $(".btn-add-more-wrong-answers").on('click', function(event) {
        event.preventDefault();
        $('#question_wrong_answers').clone().insertBefore(".btn-add-more-wrong-answers");
    });
    $(".btn-add-more-correct-answers").on('click', function(event) {
        event.preventDefault();
        $('#question_correct_answers').clone().insertBefore(".btn-add-more-correct-answers");
    });
    $(document).on('click', '.btn-delete-input-group', function (event) {
        event.preventDefault();
        $(this).closest('.input-group').remove();
    });

    $(document).on('click', '.tr-linked', function () {
        var attribute = $(this).attr('href');
        window.location.replace(attribute);
    });
    
    /* */
    var attr = $('.questioneer_input_array').attr('value');
    var id_array;
    // For some browsers, `attr` is undefined; for others,
    // `attr` is false.  Check for both.
    if (typeof attr !== 'undefined' && attr !== false) {
        id_array =  $('.questioneer_input_array').attr('value').split(',');
    } else {
        id_array =  [];
    }
    
    $(".btn-selector-questioneer").on('click', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        if($(this).hasClass('active')) {
            $(this).removeClass('active');

            for( var i = 0; i < id_array.length; i++){ 
                if ( id_array[i] === id) { 
                    id_array.splice(i, 1); 
                }
            }
            
        } else {
            $(this).addClass('active');
            id_array.push(id);
        }
        $('.questioneer_input_array').val(id_array);
    });
    $('.btn-form-status-change').on('click', function(event) {
        event.preventDefault();
        const status = $('.status-input').val('');
        if($(this).hasClass( "btn-success" )) {
            $(this).removeClass('btn-success').removeClass('btn-secondary');
            $(this).addClass('btn-secondary').html('išjungtas');
            $('.status-input').val('false');
        } else {
            $(this).removeClass('btn-success').removeClass('btn-secondary');
            $(this).addClass('btn-success').html('įjungtas');
            $('.status-input').val('active');
        }
    });
});