<?php
/**
 * @package Controllers
 * @subpackage Controller
 * @author Me
 */
class Controller{
    public $model;
    public $view;
    public function __construct(){
        $this->view = new View;
    }
    /**
     * Showing a view and creating a model
     */
    public function action_index(){}
}
?>