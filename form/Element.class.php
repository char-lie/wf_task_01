<?php

abstract class Element {

    protected $parameters;

    function __construct($parameters) {
        $this->parameters           = $this->parseParameters($parameters,
                                                   array('id'));
        $this->parameters['name']   = array_value('name', $parameters,
                                                  $this->parameters['id']);
    }

    function parseParameters($parameters, $keywords) {
        $result = array();
        foreach($keywords as $keyword) {
            $result[$keyword] = array_value($keyword, $parameters);
        }
        return $result;
    }

    function addParameters($parameters, $keywords) {
        $this->parameters = array_merge($this->parameters,
                            $this->parseParameters($parameters, $keywords));
    }

    function getID() {
        return $this->parameters['id'];
    }

    function getName() {
        return $this->parameters['name'];
    }

    function getAttributesNames() {
        return array('id', 'name');
    }

    function getAttributesString() {
        $result = '';
        foreach($this->getAttributesNames() as $key) {
            $result .= isset($this->parameters[$key])?
                       sprintf(' %s="%s"', $key, $this->parameters[$key]):'';
        }
        return trim($result);
    }

    abstract function render();

}

?>
