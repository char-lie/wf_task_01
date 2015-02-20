<?php

require_once('db_connection/RGConnector.class.php');

class User {
    public $email           = NULL;
    private $password       = NULL;
    private $passHash       = NULL;
    public $id              = NULL;
    private $dbConnector    = NULL;

    function __construct($id, $password = NULL) {
        $this->dbConnector = new RGConnector();

        if (is_null($password)) {
            $this->id           = test_input($id);
        }
        else {
            $this->email    = test_input($id);
            $this->password = $password;
            $this->passHash = $this->getPasswordHash($password);
        }
    }

    function isEmailCorrect() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== '';
    }

    function isPasswordCorrect() {
        return true;
    }

    function getPasswordHash($password = NULL) {
        if (is_null($password)) {
            $password = $this->password;
        }
        return crypt($password, 'Standard seed');
    }

    function signUp() {
        $success = NULL;

        $this->dbConnector->connect();
        $success = $this->dbConnector->signUp($this->email, $this->passHash);
        $this->dbConnector->close();

        return $success;
    }

    function signIn() {
        $success = NULL;

        $success = $this->dbConnector->connect();

        if ($success) {
            $result  = $this->dbConnector->signIn($this->email, $this->passHash);
            $success = $result->num_rows == 1;
        }

        if ($success) {
            $row            = $result->fetch_array();
            $this->id       = $row['iduser_account'];
            $success        = true;
        }

        $result->close();
        $this->dbConnector->close();
        return $success;
    }
}

?>
