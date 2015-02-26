<?php

require_once(FORM_CLASS_DIR.'Field.class.php');

abstract class Input extends Field {

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->parameters =
            array_merge($this->parameters,
                        $this->parseParameters($parameters,
                        array('placeholder', 'value')));
    }

    function render() {
        $field = sprintf('
            <input class="%s" type="%s" %s>',
            $this->getClasses(), $this->getType(),
            $this->getAttributesString());
        return $this->decorate($field);
    }

    function getAttributesNames() {
        return array_merge(parent::getAttributesNames(),
                           array('placeholder', 'value'));
    }

    function getClasses() {
        return 'form-control input-mini';
    }

    abstract function getType();

}

?>
