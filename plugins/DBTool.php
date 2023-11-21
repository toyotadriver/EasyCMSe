<?php
namespace plugins\DBTool;
class DBTool {
    private $pdo;
    
    public function __construct() {
        require 'dblogin.php';
        $this->pdo = new \PDO($db_attr, $db_user, $db_pass, $db_opts);
    }
    /**
     * Create several united tables from the array
     */
    function tables_from_array($table_array) {

    }
}
?>