<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class Select extends Field {

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('options'));
    }

    function render() {
        $options = '';
        foreach($this->parameters['options'] as $key => $value) {
            $options .= sprintf('<option value="%s">%s</option>',
                                $key, $value);
        }
        return sprintf('
            %s
            <div class="col-sm-8">
              <select class="form-control" %s>
                %s
              </select>
            </div>',
            $this->getLabelCode(),
            $this->getAttributesString(),
            $options);
    }

    function validate() {
        return true;
    }

    function errors() {
        return array();
    }

}

?>
