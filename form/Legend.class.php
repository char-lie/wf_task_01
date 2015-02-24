<?php

require_once(FORM_CLASS_DIR.'Field.class.php');

class Legend extends Field {

    function __construct($parameters) {
        $this->parameters = $parameters;
    }

    function render() {
        return sprintf("<legend>%s</legend>", $this->parameters['text']);
    }
    function validate() {
        return true;
    }
    function getErrors() {
        return array();
    }
    function getID() {
        return $this->parameters['id'];
    }
    function getLabel() {
        return NULL;
    }

}

?>
