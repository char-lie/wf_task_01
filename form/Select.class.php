<?php

require_once(FORM_CLASS_DIR.'Input.class.php');

class Select extends Field {

    function __construct($parameters) {
        parent::__construct($parameters);
        $this->addParameters($parameters, array('options', 'addBlank',
                                                'multiple'));
    }

    function render() {
        $options = $this->parameters['addBlank']?
                   '<option selected disabled hidden value=""></option>' : '';
        foreach($this->parameters['options'] as $key => $value) {
            $options .= sprintf('<option value="%s">%s</option>',
                                $key, $value);
        }
        return sprintf('
            %s
            <div class="col-sm-8">
              <select %s class="form-control" %s>
                %s
              </select>
            </div>',
            $this->getLabelCode(),
            $this->parameters['multiple']? 'multiple':'',
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
