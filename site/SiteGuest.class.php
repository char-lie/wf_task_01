<?php

require_once(SITE_CLASSES_DIR.'Site.class.php');
require_once(FORM_CLASS_DIR.'Form.class.php');
require_once(FORM_CLASS_DIR.'Fieldset.class.php');
require_once(FORM_CLASS_DIR.'Input.class.php');

class SiteGuest extends Site {

    function __construct($templateName = 'main') {
        parent::__construct($templateName);
    }

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
    // PAGES INFO

    function signIn($email, $password) {
        $success    = false;
        $user       = new User($email, $password);
        if ($user->signIn()) {
            $success = true;
            header(sprintf("Location: %s",
                            $this->generateURL(array('page' => 'account'))));
        }
        else {
            $success = false;
        }
        return $success;
    }

    function signUp($email, $password) {
        $success    = false;
        $user       = new User($email, $password);
        if ($user->signUp()) {
            $success = $this->signIn($email, $password);
        }
        else {
            $success = false;
        }
        return $success;
    }

    function loadLoginPage() {
        $error      = NULL;
        $email      = array_value('input-email', $_POST);
        $password   = array_value('password-input', $_POST);
        $user       = new User($email, $password);
        if (is_null($email) or is_null($password)) {
        }
        else if (!$this->signIn($email, $password)) {
            $error  = $this->translator->translate(
                                         "Incorrect email or password");
        }
        return $error;
    }

    function loadRegistrationPage() {
        $error      = NULL;
        $email      = array_value('input-email', $_POST);
        $password   = array_value('password-input', $_POST);
        if (is_null($email) or is_null($password)) {
        }
        else if ($password != array_value('password-input', $_POST)) {
            $error  = $this->translator->translate("Passwords don't match");
        }
        else if (!$this->signUp($email, $password)) {
            $error  = $this->translator->translate(
                                         "This email is already in use");
        }
        $this->page->assign('emailValue', $email);
        return $error;
    }

    function loadPage() {
        parent::loadPage();
        $error = NULL;
        if ($this->getCurrentPageCode()         === 'registration') {
            $error = $this->loadRegistrationPage();
        }
        else if ($this->getCurrentPageCode()    === 'login') {
            $error = $this->loadLoginPage();
        }
        $this->page->assign('error', $error);
        $form = new Form(array('id'=>'o','method'=>'post','action'=>'index.php'));
        $fieldset = new Fieldset(array('legend'=>'My form'));
        $fieldset->addField(new Input(array('placeholder'=>'Plh','value'=>'vl')));
        $form->addFieldset($fieldset);
        $this->page->assign('form', $form->render());
    }
}

?>
