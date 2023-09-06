<?php
class Model_Medtests extends Model{
    private $pdo;
    function __construct(){
        include 'dblogin.php';
        $this->pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
        //Код юзера
    }
    public function get_data(){

    }
}
?>