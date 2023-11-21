<?php
/**
 * @package Controllers
 * @subpackage Controller
 * @author Me
 */
class Controller{
    public $model;
    public $view;
    public $accept;
    public function __construct(){
        $this->view = new View;
        $this->accept = isset($_SERVER['HTTP_ACCEPT'])? $_SERVER['HTTP_ACCEPT']: '';
    }
    /**
     * Showing a view and creating a model
     */
    public function action_index(){}
}
?>