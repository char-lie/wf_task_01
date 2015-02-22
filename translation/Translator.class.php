<?php

require_once(TRANSLATOR_DIR.'translation.php');

class Translator {

    protected $defaultLanguage  = 'en';
    protected $translation;
    protected $languagesCodes;
    protected $languagesNames;

    function __construct($defaultLanguage = 'en') {
        $this->setDefaultLanguage($defaultLanguage);
        global $Translation;
        $this->loadTranslation($Translation);
    }

    function translate($keyword, $language = NULL) {
        $language = $language ?: $this->defaultLanguage;
        if (is_array($keyword)) {
            return array_map($this->getTranslationClosure($language),
                             $keyword);
        }
        else {
            return $this->translation[$language][$keyword];
        }
    }

    // GETTERS
    function getDefaultLanguage() {
        return $this->defaultLanguage;
    }

    function getLanguagesCodes() {
        return $this->languagesCodes;
    }

    function getLanguagesNames($language = NULL) {
        $language = $language ?: $this->getDefaultLanguage();
        $translate = $this->getTranslationClosure($language);
        return array_map($translate, $this->languagesNames);
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
        $result         = array_combine($this->languagesCodes,
                                        $this->getLanguagesNames($language));
        return $result;
    }

    function isLanguageCodeAvailable($languageCode) {
        return in_array($languageCode, $this->languagesCodes);
    }
    // GETTERS


    // SETTERS
    function loadTranslation($translation) {
        $this->translation      = $translation;
        $this->languagesCodes    = array('en', 'ru');
        $this->languagesNames    = array('English', 'Russian');
    }

    function setDefaultLanguage($defaultLanguage) {
        $this->defaultLanguage = $defaultLanguage;
    }
    // SETTERS
}

?>
