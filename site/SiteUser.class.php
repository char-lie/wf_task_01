<?php

require_once(SITE_CLASSES_DIR.'Site.class.php');

class SiteUser extends Site {

    function __construct($templateName = 'main') {
        parent::__construct($templateName);
    }
    //
    // PAGES INFO
    function getDefaultPageCode() {
        return 'account';
    }

    function getPagesCodes() {
        return array('home', 'account', 'logout');
    }

    function getPagesTitles() {
        $titles = array('Home', 'Account', 'Log out');
        return $this->translator->translate($titles);
    }
    // PAGES INFO
    
    function getUserInfoCategoriesCodes() {
        return array('personal', 'appearance', 'photos', 'interests', 'places');
    }

    function getUserInfoCategoriesTitles() {
        $titles = array('Personal information', 'Appearance', 'Photos',
                        'Interests', 'Places');
        return $this->translator->translate($titles);
    }

    function loadPage() {
        parent::loadPage();
    }
}

?>
