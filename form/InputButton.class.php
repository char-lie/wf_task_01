<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class InputButton extends Input {

    function __construct($parameters) {
        parent::__construct($parameters);
    }

    function getType() {
        return 'submit';
    }

    function getClasses() {
        return 'btn btn-primary';
    }

    function validate() {
        return true;
    }

    function errors() {
        return array();
    }

}

?>
