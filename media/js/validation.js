$(document).ready(function() {
    $('#form-registration').validate({
        rules: {
            confirmPassword: {
                equalTo: '#inputPassword'
            }
        }
    });
});
