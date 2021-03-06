<?php

require_once(SITE_CLASSES_DIR.'Site.class.php');
require_once(FORM_CLASS_DIR.'Form.class.php');
require_once(FORM_CLASS_DIR.'Fieldset.class.php');
require_once(FORM_CLASS_DIR.'InputText.class.php');
require_once(FORM_CLASS_DIR.'InputEmail.class.php');
require_once(FORM_CLASS_DIR.'InputPassword.class.php');
require_once(FORM_CLASS_DIR.'InputRadio.class.php');
require_once(FORM_CLASS_DIR.'InputDate.class.php');
require_once(FORM_CLASS_DIR.'Select.class.php');

require_once('db_connection/PopulatorConnector.class.php');

class SiteUser extends Site {

    function __construct($templateName = 'main') {
        parent::__construct($templateName);
    }

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

    function loadLogoutPage() {
        $user = new User($_SESSION['user_id']);
        $user->signOut();
        header(sprintf("Location: %s",
                        $this->generateURL(array('page' => 'home'))));
        return NULL;
    }

    function loadPage() {
        parent::loadPage();

        $pc = new PopulatorConnector();
        $pc->connect();

        $form = new Form(array(
                'id'            =>  'form-personal',
                'method'        =>  'post'));
        $fieldset = new Fieldset(array(
                'legend'        =>  $this->translate('Personal information')));
        $fieldset->addField(new InputText(array(
                'id'            => 'input-first-name',
                'required'      => true,
                'placeholder'   => $this->translate('First name'),
                'label'         => $this->translate('First name'))));
        $fieldset->addField(new InputText(array(
                'id'            => 'input-last-name',
                'required'      => true,
                'placeholder'   => $this->translate('Last name'),
                'label'         => $this->translate('Last name'))));
        $fieldset->addField(new Select(array(
                'id'            => 'select-gender',
                'label'         => $this->translate('Gender'),
                'addBlank'      => true,
                'options'       => $pc->getOptions('gender',
                                   $this->translator->getTranslationClosure())
            )));
        $iPrefer = function ($gender) {
            return $this->translate(
                            sprintf("I prefer %s", strtolower($gender)));
        };
        $fieldset->addField(new Select(array(
                'id'            => 'select-preferences',
                'label'         => $this->translate('Preferences'),
                'multiple'      => true,
                'options'       => $pc->getOptions('gender', $iPrefer)
            )));
        $fieldset->addField(new InputDate(array(
                'id'            => 'input-birth-date',
                'label'         => $this->translate('Birth date'),
                'max'           => date('Y-m-d', strtotime('-14 years', time()))
        )));
        $fieldset->addField(new InputButton(array(
                'id'            => 'submit-personal',
                'value'         => $this->translate('Submit'))));
        $form->addFieldset($fieldset);

        $pc->close();

        if ($this->getCurrentPageCode()    === 'logout') {
            $error = $this->loadLogoutPage();
        }
        else if ($this->getCurrentPageCode() === 'account') {
        }
        $this->page->assign('form', $form->render());
    }
}

?>
