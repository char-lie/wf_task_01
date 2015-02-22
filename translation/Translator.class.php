<?php

require_once(TRANSLATOR_DIR.'translation.php');

class Translator {

    protected $defaultLanguage  = 'en';
    protected $translation;
    protected $languageCodes;
    protected $languageNames;

    function __construct($defaultLanguage = 'en') {
        $this->setDefaultLanguage($defaultLanguage);
        global $Translation;
        $this->loadTranslation($Translation);
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
        $language = $language ?: $this->defaultLanguage;
        return $this->translation[$language][$keyword];
    }

    function isLanguageCodeAvailable($languageCode) {
        return in_array($languageCode, $this->languageCodes);
    }

    function getTranslationClosure($language = NULL) {
        $language   = $language ?: $this->defaultLanguage;
        $closure    = function($word) use ($language) {
            return $this->translate($word, $language);
        };
        return $closure;
    }

    function getAvailableLanguages($language = NULL) {
        $language       = $language ?: $this->defaultLanguage;
        $translate      = $this->getTranslationClosure($language)
        $languagesNames = array_map($translate, $this->languageNames);
        $result         = array_combine($this->languageCodes, $languagesNames);
        return $result;
    }
}

?>
