<?php

require_once('db_connection/DBConnector.class.php');

class RGConnector extends DBConnector {
    protected $password     = '12345';
    protected $username     = 'task_001_rg';
    protected $signInQuery  = "SELECT iduser_login, email
                                    FROM `user_login`
                                    WHERE email='%s' AND password='%s'";
    protected $signUpQuery  = "INSERT INTO `user_login` (`email`, `password`)
                                    VALUES('%s', '%s');";

    function __construct() {
        parent::__construct($this->username, $this->password);
    }

    function query($query) {
        return $this->mysqli->query($query);
    }

    function signIn($email, $password) {
        $query = sprintf($this->signInQuery, $email, $password);
        return $this->query($query);
    }

    function signUp($email, $password) {
        $query = sprintf($this->signUpQuery, $email, $password);
        return $this->query($query);
    }
}

?>
