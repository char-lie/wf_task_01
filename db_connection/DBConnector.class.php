<?php

class DBConnector {
    protected $mysqli   = NULL;
    protected $host     = 'localhost';
    protected $scheme   = 'task_001';
    protected $password = '12345';
    protected $username = 'task_001_rg';

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->mysqli = mysqli_init();
    }

    function connect() {
        return $this->mysqli->real_connect($this->host, $this->username,
                                           $this->password, $this->scheme);
    }

    function close() {
        return $this->mysqli->close();
    }

    function query($query) {
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

    function error() {
        return $this->mysqli->error;
    }

}

?>
