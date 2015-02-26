<?php

require_once(FORM_CLASS_DIR.'Element.class.php');

class Fieldset extends Element {

    protected $parameters;
    protected $fields = array();

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('legend'));
    }

    function addField($field) {
        array_push($this->fields, $field);
    }

    function addFields($fields) {
        $this->fields = array_merge($this->fields, $fields);
    }

    function getFieldsRenderer() {
        return function($renderedFields, $field) {
            $label = is_null($field->getID()) ? '' : sprintf('
                  <label class="sr-only control-label" for="%s">
                    %s
                  </label>',
                  $field->getID(), $field->getLabel());
            return sprintf('
                %s
                <div class="form-group">
                  %s
                  %s
                </div>',
                $renderedFields, $label, $field->render());
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
        $legend = isset($this->parameters['legend'])?
                sprintf('<legend>%s</legend>', $this->parameters['legend']):'';
        $fields = array_reduce($this->fields, $this->getFieldsRenderer(), '');
        return sprintf("
              <fieldset>
                %s
                %s
              </fieldset>",
              $legend, $fields);
    }

    function validate() {
        return array_reduce($this->fields, $this->getFieldsValidator());
    }

    function errors() {
        return array_map($this->getFieldsErrorsGatherer(), $this->fields);
    }
}

?>
