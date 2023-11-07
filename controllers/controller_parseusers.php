<?php
class Controller_Parseusers extends Controller{
    
    function action_index(){
        if (isset($_POST)) {
            echo 'Все классно';
            $accept = file_get_contents('php://input');
            echo "<font style='color:red;'>" . $_SERVER['HTTP_ACCEPT'] . "</font>";
        } else {
            header('Location: main');
        }
    }
}
?>