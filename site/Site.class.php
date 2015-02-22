<?php

require_once(SMARTY_DIR.'Smarty.class.php');
require_once(TRANSLATOR_DIR.'Translator.class.php');
require_once('site/Page.class.php');

class Site {

    protected $templateName;
    protected $language = 'en';
    protected $translator;
    protected $page;

    function __construct($templateName = 'main') {
        $this->templateName = $templateName;

        $this->setTranslator(new Translator());

        $this->page = new Page($this->getPageTemplate(), $this->templateName);
        $this->page->registerPlugin("block", "translate",
                                    array($this, 'translation_plugin'));
        $this->page->clearAllCache();
    }

    // TRANSLATION
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

    function getLanguage() {
        return $this->language;
    }

    function setTranslator($translator) {
        $this->translator = $translator;
        $this->language = $this->readLanguage();
        if (!$this->translator->isLanguageCodeAvailable($this->language)) {
            $this->language = $this->translator->getDefaultLanguage();
        }
        $this->translator->setDefaultLanguage($this->language);
    }

    function translation_plugin($params, $content, $smarty) {
        if (isset($content)) {
            return $this->translator->translate($content);
        }
    }
    // TRANSLATION

    // HIGH-LEVEL PAGES PROCESSING
    function getPagesCodes() {
        return array('home', 'registration', 'login');
    }

    function getPagesTitles() {
        return array(
            $this->translator->translate('Home'),
            $this->translator->translate('Registration'),
            $this->translator->translate('Log in')
        );
    }

    function isPageCodeAvailable($pageCode) {
        return in_array($pageCode, $this->getPagesCodes());
    }

    function getCurrentPageNameCode() {
        $page = 'home';
        if (isset($_GET['page']) && $this->isPageCodeAvailable($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $page;
    }

    function getPageTemplate() {
        return $this->getCurrentPageNameCode().'.tpl';
    }
    // HIGH-LEVEL PAGES PROCESSING

    // SITE URL
    function getSiteURL() {
        return (empty($_SERVER['HTTPS'])? "http://":"https://") .
                $_SERVER['HTTP_HOST'];
    }

    function getCurrentPageURL() {
        return $this->getSiteURL() . strtok($_SERVER["REQUEST_URI"],'?');
    }

    function generateURL($parameters) {
        if (is_array($parameters)) {
            return $this->getCurrentPageURL() . "?" .
                http_build_query(array_merge($_GET, $parameters));
        }
        else {
            return $this->getSiteURL() . "/" . $parameters;
        }
    }
    // SITE URL

    // PAGES NAVIGATION
    function getPagesURLs() {
        $callback = function($page) {
            return $this->generateURL(array('page' => $page));
        };
        return array_map($callback, $this->getPagesCodes());
    }

    function getNavigationElements() {
        return array_combine($this->getPagesURLs(), $this->getPagesTitles());
    }
    // PAGES NAVIGATION


    function getLanguagesNavigation() {
        $result = array();
        foreach($this->translator->getAvailableLanguages() as $key => $value) {
            $result[$this->generateURL(array('select-language' => $key))]
                = array('short' => $key, 'long' => $value);
        }
        return $result;
    }

    function loadPage() {
        $this->page->assign(array(
            'app_name'              => 'Meetings site',
            'media'                 => $this->generateURL('media'),
            'currentPage'           => $this->getCurrentPageNameCode(),
            'languageCode'          => $this->getLanguage(),
            'languages'             => $this->getLanguagesNavigation(),
            'navigationElements'    => $this->getNavigationElements()
        ));
    }

    function displayPage() {
        $this->page->display();
    }
}

?>
