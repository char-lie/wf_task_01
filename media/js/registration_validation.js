$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
        $(element).closest('.form-group').addClass('has-success');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

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
    $('#form-registration').validate().form();
});
