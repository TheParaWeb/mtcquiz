$(document).ready(function () {
    $('.educational-path a.arrow').click(function () {

        // Handles the sliding functionality of the educational paths module.
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');

            if ($('.careers').is(':visible')) {
                $('.careers').slideUp();
            }


        } else {
            if ($('.careers').is(':visible')) {
                $('.careers').slideUp();
            }
            $('.educational-path a.arrow').removeClass('active');
            $(this).addClass('active');
            $(this).parent().next().stop().slideDown();
        }
        return false;
    });
})
