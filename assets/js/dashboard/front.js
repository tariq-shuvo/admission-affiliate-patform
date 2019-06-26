$(document).ready(function () {

    // ------------------------------------------------------- //
    // Side Navbar Functionality
    // ------------------------------------------------------ //


    $('#toggle-btn').on('click', function (e) {

        e.preventDefault();

        if ($(window).outerWidth() > 991) {
            $('nav.side-navbar').toggleClass('shrink');
            $('.page').toggleClass('active');
        } else {
            $('nav.side-navbar').toggleClass('show-sm');
            $('.page').toggleClass('active-sm');
        }
    });


});