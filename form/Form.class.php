<?php

require_once(FORM_CLASS_DIR.'Element.class.php');

class Form extends Element {

    protected $parameters;
    protected $fieldsets = array();

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('method', 'action'));
    }

    function getAttributesNames() {
        return array_merge(parent::getAttributesNames(),
                           array('method', 'action'));
    }

    function getFieldValue($fieldName) {
        $source = strtoupper($this->parameters['method']) === 'GET'?
                  $_GET : $_POST;
        return array_value($fieldName, $source);
    }

    function addFieldset($fieldset) {
        array_push($this->fieldsets, $fieldset);
    }

    function addFieldsets($fieldsets) {
        $this->fieldsets = array_merge($this->fieldsets, $fieldsets);
    }

    function getFieldsetsRenderer() {
        return function($renderedFieldsets, $fieldset) {
            return sprintf("%s
                %s",
                $renderedFieldsets, $fieldset->render());
        };
    }

    function getFieldsetsValidator() {
        return function($valid, $fieldset) {
            return $valid and $fieldset.validate();
        };
    }

    function getFieldsetsErrorsGatherer() {
        return function($errors, $fieldset) {
            return array_merge($errors, $fieldset->errors());
        };
    }

    function render() {
        return sprintf("
            <form %s novalidate>
                %s
            </form>",
            $this->getAttributesString(),
            array_reduce($this->fieldsets, $this->getFieldsetsRenderer(), ''));
    }

    function validate() {
        return array_reduce($this->fieldsets, $this->getFieldsetsValidator());
    }

    function errors() {
        return array_map($this->getFieldsetsErrorsGatherer(), $this->fieldsets);
    }
}

?>
