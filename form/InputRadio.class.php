<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class InputRadio extends Input {

    function __construct($parameters) {
        parent::__construct($parameters);
    }

    function getType() {
        return 'radio';
    }

    function validate() {
        return true;
    }

    function errors() {
        return array();
    }

}

?>
