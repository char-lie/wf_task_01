<?php

require_once('db_connection/DBConnector.class.php');

class PopulatorConnector extends DBConnector {
    protected $password     = '12345';
    protected $username     = 'task_001_rg';
    protected $selectQuery  = '';

    function __construct() {
        parent::__construct($this->username, $this->password);
    }

    function getPersonalInfo($userID) {
        $cur     = array();
        $result  = $this->query($selectQuery);
        $result->free();
        return NULL;
    }
}

?>
