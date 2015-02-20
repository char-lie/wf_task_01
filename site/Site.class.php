<?php

require_once(SMARTY_DIR.'Smarty.class.php');
require_once(TRANSLATOR_DIR.'Translator.class.php');

class Smarty_Site extends Smarty {

    public $templateName = 'main';
    public $language = 'en';
    public $translator = NULL;

    function __construct($translator, $templateName = 'main') {
        parent::__construct();

        $this->setTemplateDir('./templates/'.$templateName.'/');
        $this->setCompileDir('./c_templates/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Meetings site');

        $this->templateName = $templateName;

        $this->assign('media', '/media');

        $this->setTranslator($translator);
    }

    function readLanguage() {
        $language = $this->language;
        if (isset($_GET['select-language'])) {
            if (isset($_COOKIE['languageCode'])) {
                if ($_COOKIE['languageCode'] !== $_GET['select-language']) {
                    setcookie('languageCode', $_GET['select-language']);
                    $this->clearAllCache();
                }
            }
            else {
                setcookie('languageCode', $_GET['select-language']);
                $this->clearAllCache();
            }
            $language = $_GET['select-language'];
        }
        else if (isset($_COOKIE['languageCode'])) {
            $language = $_COOKIE['languageCode'];
        }
        return $language;
    }

    function getLanguage() {
        return $this->language;
    }

    function setTranslator($translator) {
        $this->translator = $translator;
        $this->language = $this->readLanguage();
        if (!array_key_exists($this->language, $this->translator->getAvailableLanguages())) {
            $this->language = $this->translator->getDefaultLanguage();
        }
        $this->translator->setDefaultLanguage($this->language);
    }

    function tAssign($tpl_var, $tr_keyword = NULL, $nocache = false) {
        if (is_null($tr_keyword)) {
            $tr_keyword = $tpl_var;
        }
        return $this->assign($tpl_var,
            $this->translator->translate($tr_keyword), $nocache);
    }
}

?>
