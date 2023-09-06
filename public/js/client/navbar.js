$(function () {

    'use strict';

    $('.js-menu-toggle').click(function (e) {

        var $this = $(this);
        if ($('body').hasClass('show-sidebar')) {
            $('body').removeClass('show-sidebar');
            $this.removeClass('active');
        } else {
            $('body').addClass('show-sidebar');
            $this.addClass('active');
        }

        e.preventDefault();

    });

    // click outisde offcanvas
    $(document).mouseup(function (e) {
        var container = $(".sidebar");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($('body').hasClass('show-sidebar')) {
                $('body').removeClass('show-sidebar');
                $('body').find('.js-menu-toggle').removeClass('active');
            }
        }
    });
});

const hamburgerButton = document.getElementById('hamburgerButton');
const screen = document.querySelector('body');
console.log(screen);
console.log(hamburgerButton);
let click = 0;
hamburgerButton.addEventListener('click', () => {
    if (click == 0) {
        screen.classList.add('disable-scroll');
        click = 1;
    } else {
        screen.classList.remove('disable-scroll');
        click = 0;
    }
});


