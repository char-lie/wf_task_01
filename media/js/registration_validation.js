$(document).ready(function() {
    $('#form-registration').validate({
        rules: {
            'password-confirm': {
                minlength: 8,
                equalTo: '#password-input'
            },
            'password-input': {
                minlength: 8
            }
        }
    });
});
