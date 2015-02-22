<?php

require_once(SMARTY_DIR.'Smarty.class.php');
require_once(TRANSLATOR_DIR.'Translator.class.php');

class Page extends Smarty {

    protected $template;

    function __construct($template, $templateName = 'main') {
        parent::__construct();

        $this->setTemplateDir('./templates/'.$templateName.'/');
        $this->setCompileDir('./c_templates/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;

        $this->template = $template;
    }

    function readLanguage() {
        if (isset($_GET['select-language'])) {
            $language = $_GET['select-language'];
        }
        else if (isset($_SESSION['languageCode'])) {
            $language = $_SESSION['languageCode'];
        }
        else {
            $language = $this->language;
        }
        $_SESSION['languageCode'] = $language;
        return $language;
    }

    function display($template = NULL, $cache_id = NULL, $compile_id = NULL, $parent = NULL) {
        if (is_null($template)) {
            $template = $this->template;
        }
        parent::display($template, $cache_id, $compile_id, $parent);
    }
}

?>
