<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class InputEmail extends Input {

    function __construct($parameters) {
        parent::__construct($parameters);
    }

    function getType() {
        return 'email';
    }

    function validate() {
        return true;
    }

    function errors() {
        return array();
    }

}

?>

