<?php

abstract class Field {

    protected $parameters;

    function __construct($parameters) {
        $this->parameters = $parameters;
    }

    abstract function render();
    abstract function validate();
    abstract function errors();
    abstract function getID();
    abstract function getLabel();

}

?>
