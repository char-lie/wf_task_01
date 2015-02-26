<?php

require_once(FORM_CLASS_DIR.'Element.class.php');

abstract class Field extends Element {

    protected $parameters;

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('label', 'required'));
    }

    function getLabel() {
        return $this->parameters['label'];
    }

    function getAttributesString() {
        $required = $this->isRequired()? 'required' : '';
        return trim(sprintf('%s %s', parent::getAttributesString(), $required));
    }

    function isRequired() {
        return $this->parameters['required']? true : false;
    }

    function renderOptionalIcon($icon) {
        return sprintf('<span class="input-group-addon">%s</span>', $icon);
    }

    function decorate($renderedField) {
        if ($this->isRequired()) {
            $optionalIcon =  $this->renderOptionalIcon('*');
            return sprintf('<div class="input-group">
                      %s
                      %s
                  </div>', $renderedField, $optionalIcon);
        }
        else {
            return $renderedField;
        }
    }

    abstract function validate();
    abstract function errors();

}

?>
