<?php

function array_value($key, $array, $default = NULL) {
    return isset($array[$key])? $array[$key] : $default;
}

function getVar($varname) {
    return isset($_POST[$varname]) ? $_POST[$varname]:NULL;
}

function test_input($data = NULL) {
    if (is_null($data)) {
        $data = '';
    }
    else {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    return $data;
}

?>
