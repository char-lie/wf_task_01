<?php

function getVar($varname) {
    return isset($_POST[$varname]) ? $_POST[$varname]:NULL;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
