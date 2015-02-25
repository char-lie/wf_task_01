<?php

require_once(FORM_CLASS_DIR.'Element.class.php');

abstract class Field extends Element {

    protected $parameters;

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('label'));
    }

    function getLabel() {
        return $this->parameters['label'];
    }

    abstract function validate();
    abstract function errors();

}

?>
