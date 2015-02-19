<?php

class Translator {

    protected $translation = array();
    protected $defaultLanguage = 'en';

    function __construct($defaultLanguage = 'en', $translation = array()) {
        $this->setDefaultLanguage($defaultLanguage);
        $this->loadTranslation($translation);
    }

    function setDefaultLanguage($defaultLanguage) {
        $this->defaultLanguage = $defaultLanguage;
    }

    function loadTranslation($translation) {
        $this->translation = $translation;
    }

    function translate($keyword, $language = NULL) {
        if (is_null($language)) {
            $language = $this->defaultLanguage;
        }
        return $this->translation[$language][$keyword];
    }
}

?>
