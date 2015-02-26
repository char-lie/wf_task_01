<?php

require_once(FORM_CLASS_DIR.'Field.class.php');

abstract class Input extends Field {

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('placeholder', 'value'));
    }

    function render() {
        $field = sprintf('
            <input class="%s" type="%s" %s>',
            $this->getClasses(), $this->getType(),
            $this->getAttributesString());
        $field = $this->decorate($field);
        return sprintf('%s%s', $this->getLabelCode(), $field);
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
