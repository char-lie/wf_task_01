<?php

function getVar($varname) {
    return isset($_POST[$varname]) ? $_POST[$varname]:NULL;
}

//echo json_encode("Lol");
echo filter_var(getVar('email'), FILTER_VALIDATE_EMAIL) === '' ? 'false':'true';

?>
