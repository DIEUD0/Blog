var Gotop = {
    myId: $('#go-top'),
    offset: 128,
    duration: 256,
    init: function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > this.offset) {
                this.myId.fadeIn(this.duration);

            } else {
                this.myId.fadeOut(this.duration);
            }
        }.bind(this));

        this.myId.click(function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, this.duration);
            return false;
        }.bind(this))
    }
};

$(document).ready(function ($) {
    Gotop.init();
});