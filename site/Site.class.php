<?php

require_once(SMARTY_DIR.'Smarty.class.php');
require_once(TRANSLATOR_DIR.'Translator.class.php');
require_once(SITE_CLASSES_DIR.'Page.class.php');
require_once(UTILS_DIR.'utils.php');
require_once(USER_CLASS_DIR.'User.class.php');

class Site {

    protected $templateName;
    protected $translator;
    protected $page;
    protected $language = 'en';

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
        $language = array_value('select-language', $_GET)   ?:
                    array_value('languageCode', $_SESSION)  ?:
                    $this->language;
        $_SESSION['languageCode'] = $language;
        return $language;
    }

    function getCurrentLanguage($language = NULL) {
        $language = $language ?: $this->language;
        return $this->translator->getAvailableLanguages($language)[$language];
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
        else {
            return '';
        }
    }

    function translate($keyword) {
        return $this->translator->translate($keyword);
    }
    // TRANSLATION

    // PAGES INFO
    function getDefaultPageCode() {
        return 'home';
    }

    function getPagesCodes() {
        return array('home', 'registration', 'login');
    }

    function getPagesTitles() {
        $titles = array('Home', 'Registration', 'Log in');
        return $this->translator->translate($titles);
    }

    function getAvailablePages() {
        return array_combine($this->getPagesCodes(), $this->getPagesTitles());
    }

    function getCurrentPageCode() {
        $default    = $this->getDefaultPageCode();
        $pageCode   = array_value('page', $_GET, $default);
        return in_array($pageCode, $this->getPagesCodes())? $pageCode:$default;
    }

    function getPageTemplate() {
        return $this->getCurrentPageCode().'.tpl';
    }
    // PAGES INFO

    function generateURL($parameters, $clearQuery = false) {
        $protocol       = sprintf("http%s", empty($_SERVER['HTTPS'])? "":"s");
        $host           = $_SERVER['HTTP_HOST'];
        $requestURL     = strtok($_SERVER["REQUEST_URI"],'?');
        $siteURL        = sprintf("%s://%s", $protocol, $host);
        $currentPageURL = sprintf("%s%s", $siteURL, $requestURL);

        if (is_array($parameters)) {
            $queryDict  = array_merge($clearQuery? array():$_GET, $parameters);
            $queryStr   = http_build_query($queryDict);
            return sprintf("%s?%s", $currentPageURL, $queryStr);
        }
        else {
            return sprintf("%s/%s", $siteURL, $parameters);
        }
    }

    function getURLGeneratorClosure($key, $clearQuery = false) {
        return function($value) use ($key, $clearQuery) {
            return $this->generateURL(array($key => $value), $clearQuery);
        };
    }

    function getNavigationElements() {
        $generatePageURL = $this->getURLGeneratorClosure('page', true);
        $pagesURLs = array_map($generatePageURL, $this->getPagesCodes());
        return array_combine($pagesURLs, $this->getPagesTitles());
    }

    function getLanguagesNavigation() {
        $generateLanguageURL = $this->getURLGeneratorClosure('select-language');
        $languagesURLs = array_map($generateLanguageURL,
                                   $this->translator->getLanguagesCodes());
        return array_combine($languagesURLs,
                             $this->translator->getLanguagesNames());
    }

    function loadPage() {
        $this->page->assign(array(
            'app_name'              => 'Meetings site',
            'media'                 => $this->generateURL('media'),
            'currentPage'           => $this->getCurrentPageCode(),
            'currentLanguageCode'   => $this->language,
            'currentLanguage'       => $this->getCurrentLanguage(),
            'languages'             => $this->getLanguagesNavigation(),
            'navigationElements'    => $this->getNavigationElements()
        ));
    }

    function displayPage() {
        $this->page->display();
    }
}

?>
