<?php

require_once(SITE_CLASSES_DIR.'Site.class.php');
require_once(FORM_CLASS_DIR.'Form.class.php');
require_once(FORM_CLASS_DIR.'Fieldset.class.php');
require_once(FORM_CLASS_DIR.'InputText.class.php');
require_once(FORM_CLASS_DIR.'InputEmail.class.php');
require_once(FORM_CLASS_DIR.'InputPassword.class.php');
require_once(FORM_CLASS_DIR.'InputButton.class.php');

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
        return $this->translate($titles);
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

        $form = new Form(array(
                'id'            =>  'form-login',
                'method'        =>  'post'));
        $fieldset = new Fieldset(array(
                'legend'        =>  $this->translate('Log in')));
        $fieldset->addField(new InputEmail(array(
                'id'            => 'input-email',
                'required'      => true,
                'placeholder'   => $this->translate('Email'),
                'label'         => $this->translate('Email'))));
        $fieldset->addField(new InputPassword(array(
                'id'            => 'password-input',
                'required'      => true,
                'placeholder'   => $this->translate('Password'),
                'label'         => $this->translate('Password'))));
        $fieldset->addField(new InputButton(array(
                'id'            => 'login-button',
                'value'         => $this->translate('Log in'))));
        $form->addFieldset($fieldset);

        $email      = $form->getFieldValue('input-email');
        $password   = $form->getFieldValue('password-input');
        $user       = new User($email, $password);

        if (is_null($email) or is_null($password)) {
        }
        else if (!$this->signIn($email, $password)) {
            $error  = $this->translate("Incorrect email or password");
        }

        $this->page->assign('form', $form->render());
        return $error;
    }

    function loadRegistrationPage() {
        $error      = NULL;

        $form = new Form(array(
            'id'            =>  'form-registration',
            'method'        =>  'post'));
        $fieldset = new Fieldset(array(
            'legend'        =>  $this->translate('Registration')));
        $fieldset->addField(new InputEmail(array(
            'id'            => 'input-email',
            'required'      => true,
            'placeholder'   => $this->translate('Email'),
            'label'         => $this->translate('Email'))));
        $fieldset->addField(new InputPassword(array(
            'id'            => 'password-input',
            'required'      => true,
            'placeholder'   => $this->translate('Password'),
            'label'         => $this->translate('Password'))));
        $fieldset->addField(new InputPassword(array(
            'id'            => 'password-confirm',
            'required'      => true,
            'placeholder'   => $this->translate('Confirm the password'),
            'label'         => $this->translate('Confirm the password'))));
        $fieldset->addField(new InputButton(array(
            'id'            => 'registration-button',
            'value'         => $this->translate('Register'))));
        $form->addFieldset($fieldset);

        $email              = $form->getFieldValue('input-email');
        $password           = $form->getFieldValue('password-input');
        $passwordConfirm    = $form->getFieldValue('password-confirm');

        if (is_null($email) or is_null($password)) {
        }
        else if ($password !== $passwordConfirm) {
            $error  = $this->translate("Passwords don't match");
        }
        else if (!$this->signUp($email, $password)) {
            $error  = $this->translate("This email is already in use");
        }
        $this->page->assign('emailValue', $email);

        $this->page->assign('form', $form->render());
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
    }
}

?>
