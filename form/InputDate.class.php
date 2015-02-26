<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class InputDate extends Input {

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('min', 'max'));
    }

    function getType() {
        return 'date';
    }

    function getAttributesNames() {
        return array_merge(parent::getAttributesNames(), array('min', 'max'));
    }

    function validate() {
        return true;
    }

    function errors() {
        return array();
    }

}

?>
