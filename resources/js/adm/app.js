$(function () {
    // Menu 
    const aside = $('#menu-aside');
    $('#btn-menu').on('click', function () {
        aside.addClass('active');

        aside.one('mouseleave', function () {
            aside.removeClass('active');
        });
    });
});