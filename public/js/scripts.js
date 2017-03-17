/**
 * Created by vnilov on 3/15/17.
 */
$('.vn-image-popup').magnificPopup({
    type: 'image'
    // other options
});

$(document).ready(function() {
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#phone',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#phone';
                }
            }
        }
    });
});

var validator = new FormValidator('feedback_form', [{
    name: 'phone',
    display: 'required',
    rules: 'required'
}], function(errors, event) {
    if (errors.length > 0) {
        $('form #phone').addClass('vn-error');
    } else {
        $('form #phone').removeClass('vn-error');
    }
});
    