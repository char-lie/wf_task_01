<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class InputText extends Input {

    function __construct($parameters) {
        parent::__construct($parameters);
    }

    function getType() {
        return 'text';
    }

    function validate() {
        return true;
    }

    function errors() {
        return array();
    }

}

?>
