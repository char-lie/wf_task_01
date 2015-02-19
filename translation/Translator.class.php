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

    function getDefaultLanguage() {
        return $this->defaultLanguage;
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

    function getAvailableLanguages($language = NULL) {
        if (is_null($language)) {
            $language = $this->defaultLanguage;
        }
        $availableLanguages = array(
            'ru' => $this->translate('Russian', $language),
            'en' => $this->translate('English', $language)
        );
        return $availableLanguages;
    }
}

?>
