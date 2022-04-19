$(document).ready(function(){
    $('.dark_bg').hide();

    $('button.button').click(function() {
        $('.dark_bg').fadeIn(300);
    });
    $('#container input[type="submit"]').click(function() {
        $('.dark_bg').fadeOut(300);
    });
});