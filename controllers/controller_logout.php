<?php
class Controller_Logout extends Controller{
    public $view;
    public function action_index(){
        setcookie(session_name(), '', time() -259000, '/');
        $_SESSION = array();
        session_destroy();
        header('Location: main');
    }
}
?>