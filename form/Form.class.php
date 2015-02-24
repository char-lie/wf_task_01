<?php

class Form {

    protected $parameters;
    protected $fieldsets = array();

    function __construct($parameters) {
        $this->parameters = $parameters;
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
            <form id=\"%s\" name=\"%s\" method=\"%s\" action=\"%s\" novalidate>
                %s
            </form>",
            $this->parameters['id'], $this->parameters['id'],
            $this->parameters['method'], $this->parameters['action'],
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
