<?php

class Fieldset {

    protected $parameters;
    protected $fields = array();

    function __construct($parameters) {
        $this->parameters = $parameters;
    }

    function addField($field) {
        array_push($this->fields, $field);
    }

    function addFields($fields) {
        $this->fields = array_merge($this->fields, $fields);
    }

    function getFieldsRenderer() {
        return function($renderedFields, $field) {
            return sprintf("
                %s
                <div class=\"form-group\">
                  <label class=\"sr-only control-label\" for=\"%s\">
                    %s
                  </label>
                  <div class=\"controls\">
                    %s
                  </div>
                </div>",
                $renderedFields,
                $field->getID(), $field->getLabel(), $field->render());
        };
    }

    function getFieldsValidator() {
        return function($valid, $field) {
            return $valid and $field.validate();
        };
    }

    function getFieldsErrorsGatherer() {
        return function($errors, $field) {
            return array_merge($errors, $field->errors());
        };
    }

    function render() {
        return sprintf("
              <fieldset>
                <legend>%s</legend>
                %s
              </fieldset>",
            $this->parameters['legend'],
            array_reduce($this->fields, $this->getFieldsRenderer(), ''));
    }

    function validate() {
        return array_reduce($this->fields, $this->getFieldsValidator());
    }

    function errors() {
        return array_map($this->getFieldsErrorsGatherer(), $this->fields);
    }
}

?>
