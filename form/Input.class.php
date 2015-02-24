<?php

require_once(FORM_CLASS_DIR.'Field.class.php');

class Input extends Field {

    function __construct($parameters) {
        $this->parameters = $parameters;
    }

    function render() {
        return sprintf("
            <input type=\"text\" placeholder=\"%s\" value=\"%s\"
            class=\"form-control input-mini\">",
            $this->parameters['placeholder'], $this->parameters['value']);
    }
    function validate() {
        return true;
    }
    function errors() {
        return array();
    }
    function getLabel() {
        return NULL;
    }
    function getID() {
        return NULL;
    }

}

?>
