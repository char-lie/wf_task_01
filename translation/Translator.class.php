<?php

class Translator {

    protected $translation      = array();
    protected $defaultLanguage  = 'en';
    protected $languageCodes    = NULL;
    protected $languageNames    = NULL;

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
        $this->translation      = $translation;
        $this->languageCodes    = array('en', 'ru');
        $this->languageNames    = array('English', 'Russian');
    }

    function translate($keyword, $language = NULL) {
        if (is_null($language)) {
            $language = $this->defaultLanguage;
        }
        return $this->translation[$language][$keyword];
    }

    function isLanguageCodeAvailable($languageCode) {
        return in_array($languageCode, $this->languageCodes);
    }

    function getAvailableLanguages($language = NULL) {
        if (is_null($language)) {
            $language   = $this->defaultLanguage;
        }
        $translate      =   function($languageName) use (&$language) {
                              return $this->translate($languageName, $language);
                            };
        return array_combine($this->languageCodes,
                             array_map($translate, $this->languageNames));
    }
}

?>
