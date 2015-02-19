<?php

require_once(SMARTY_DIR.'Smarty.class.php');
require_once(TRANSLATOR_DIR.'Translator.class.php');

class Smarty_Site extends Smarty {

    public $templateName = 'main';
    public $language = 'en';
    public $translator = NULL;

    function __construct($language = 'en', $templateName = 'main') {
        parent::__construct();

        $this->setTemplateDir('./templates/'.$templateName.'/');
        $this->setCompileDir('./c_templates/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Meetings site');

        $this->language = $language;
        $this->templateName = $templateName;

        $this->assign('media', '/media');
    }

    function setTranslator($translator) {
        $this->translator = $translator;
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
