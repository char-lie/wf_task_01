<?php

require_once('db_connection/DBConnector.class.php');

class PopulatorConnector extends DBConnector {
    protected $password     = '12345';
    protected $username     = 'task_001_rg';
    protected $selectQuery  =
        "SELECT `id_tablename` AS `id`, `name_tablename` AS `name`
           FROM `tablename`";

    function __construct() {
        parent::__construct($this->username, $this->password);
    }

    function getOptions($table, $titleProcessor = NULL) {
        $titleProcessor = $titleProcessor ?: function ($title) {return $title;};
        $query   = str_replace('tablename', $table, $this->selectQuery);
        $cur     = array();
        $result  = $this->query($query);
        $options = array();
        while ($cur = $result->fetch_array(MYSQLI_ASSOC)) {
            $options[$cur['id']] = $titleProcessor($cur['name']);
        }
        $result->free();
        return $options;
    }
}

?>

