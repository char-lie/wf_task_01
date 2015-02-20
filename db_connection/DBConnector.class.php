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
        return $this->mysqli->real_connect($this->host, $this->username, $this->password, $this->scheme);
    }

    function close() {
        return $this->mysqli->close();
    }
}

?>
