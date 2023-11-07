<?php
class Controller_Scriptos extends Controller{
    public $model;
    public $scripts = ['script' => 'js/parser.js'];
    function __construct(){
        $this->view = new View;
    }
    public function action_index(){
        $scripts = ['HEAD_scripts' => []];
        array_push($scripts['HEAD_scripts'], $this->scripts);
        $this->view->generate('view_scriptos.php', 'view_template.php', $scripts);
    }
}