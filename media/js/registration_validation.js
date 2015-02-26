$(document).ready(function() {
    $('#form-registration').validate({
        rules: {
            'input-email': {
                remote: {url: 'check_email.php', method: 'POST'}
            },
            'password-confirm': {
                //minlength: 8,
                equalTo: '#password-input'
            },
            'password-input': {
                //minlength: 8
            }
        }
    });
    //$('#form-registration').validate().form();
});
