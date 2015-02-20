<?php

require_once('db_connection/DBConnector.class.php');

class RGConnector extends DBConnector {
    protected $password     = '12345';
    protected $username     = 'task_001_rg';
    protected $signInQuery  = "
        SELECT `user_account`.`iduser_account`
          FROM `user_account`, `user_login`
            WHERE email='%s'
              AND password='%s'
              AND user_account.iduser_login = user_login.iduser_login";
    protected $signUpQuery  = array(
        "INSERT INTO `user_login` (`email`, `password`) VALUES('%s', '%s');",
        "INSERT INTO `user_account` (`iduser_login`) VALUES(LAST_INSERT_ID());");

    function __construct() {
        parent::__construct($this->username, $this->password);
    }

    function query($query) {
        return $this->mysqli->query($query);
    }

    function transaction($queries) {
        $this->mysqli->autocommit(false);
        foreach ($queries as $query) {
            $this->mysqli->query($query);
        }
        $result = $this->mysqli->commit();
        $this->mysqli->autocommit(true);
        return $result;
    }

    function signIn($email, $password) {
        $query = sprintf($this->signInQuery, $email, $password);
        return $this->query($query);
    }

    function signUp($email, $password) {
        $query = sprintf($this->signUpQuery[0], $email, $password);
        return $this->transaction(array($query, $this->signUpQuery[1]));
    }

    function error() {
        return $this->mysqli->error;
    }
}

?>
