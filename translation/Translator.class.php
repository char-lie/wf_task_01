<?php

require_once(TRANSLATOR_DIR.'translation.php');

class Translator {

    protected $defaultLanguage  = 'en';
    protected $translation;
    protected $languageCodes;
    protected $languageNames;

    function __construct($defaultLanguage = 'en', $translation = NULL) {
        $this->setDefaultLanguage($defaultLanguage);
        if (is_null($translation)) {
            global $Translation;
            $this->loadTranslation($Translation);
        }
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
        $translate      =   function($languageName) use ($language) {
                              return $this->translate($languageName, $language);
                            };
        return array_combine($this->languageCodes,
                             array_map($translate, $this->languageNames));
    }
}

?>
