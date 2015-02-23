<?php

require_once('db_connection/DBConnector.class.php');

class RGConnector extends DBConnector {
    protected $password     = '12345';
    protected $username     = 'task_001_rg';
    protected $signInQuery  =
        "SELECT `id_user` FROM `user` WHERE email='%s' AND password='%s'";
    protected $signUpQuery  = 
        "INSERT INTO `user` (`email`, `password`) VALUES('%s', '%s');";

    function __construct() {
        parent::__construct($this->username, $this->password);
    }

    function query($query) {
        var_dump($query);
        return $this->mysqli->query($query);
    }

    function transaction($queries) {
        $callback = function($carry, $query) {
            return $carry & $this->mysqli->query($query);
        };
        $this->mysqli->begin_transaction();
        $success  = array_reduce($queries, $callback, true);
        if ($success) {
            $success = $this->mysqli->commit();
        }
        else {
            $this->mysqli->rollback();
            $success = false;
        }
        return $success;
    }

    function signIn($email, $password) {
        $query = sprintf($this->signInQuery, $email, $password);
        return $this->query($query);
    }

    function signUp($email, $password) {
        $query = sprintf($this->signUpQuery, $email, $password);
        return $this->query($query);
    }

    function error() {
        return $this->mysqli->error;
    }
}

?>
