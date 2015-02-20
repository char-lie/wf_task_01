<?php

class User {
    public $email       = NULL;
    private $password   = NULL;
    public $id          = NULL;
    function __construct($email, $password = NULL) {
        if (is_null($password)) {
            $this->id       = test_input($email);
        }
        else {
            $this->email    = test_input($email);
            $this->password = $password;
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

    function save() {
        $success = NULL;
        $mysqli = new mysqli('localhost', 'task_001_rg', '12345', 'task_001');
        if ($mysqli->connect_error) {
            die('Ошибка подключения (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
        }
        if ($mysqli->query(sprintf("INSERT  INTO `user_login` (`email`, `password`) VALUES('%s', '%s')", $this->email, $this->getPasswordHash())) === true) {
            $success = true;
        }
        else {
            $success = false;
            printf("Error: %s\n", $mysqli->error);
        }
        $mysqli->close();
        return $success;
    }

    function load() {
        $mysqli = new mysqli('localhost', 'task_001_rg', '12345', 'task_001');
        if (is_null($this->id)) {
            $query = sprintf("SELECT * FROM `user_login` WHERE email='%s' AND password='%s';",
                         $this->email, $this->getPasswordHash());
        }
        else {
            $query = sprintf("SELECT * FROM `user_login` WHERE iduser_login='%s'",
                         $this->id);
        }
        $result         = $mysqli->query($query);
        //die(var_dump($result));
        if ($result->num_rows != 1) {
            $result->close();
            $mysqli->close();
            return false;
        }
        $row            = $result->fetch_array();
        $this->id       = $row['iduser_login'];
        $this->email    = $row['email'];
        $result->close();
        $mysqli->close();
        return true;
    }
}

?>
