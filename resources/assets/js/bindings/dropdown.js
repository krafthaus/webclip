$(document).on('click', 'body', () => {
    $('.dropdown__toggle--open')
        .removeClass('dropdown__toggle--open');
});

$(document).on('click', '.dropdown__toggle', function (e) {
    e.stopPropagation();

    // Close all other opened dropdowns.
    $('.dropdown__toggle--open')
        .not(this)
        .removeClass('dropdown__toggle--open');

    $(this).toggleClass('dropdown__toggle--open');
});
