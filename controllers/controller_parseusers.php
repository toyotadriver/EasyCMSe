<?php
class Controller_Parseusers extends Controller{
    function __construct() {
        $this->model = new Model_Parseusers;
        $this->view = new View;
    }
    function action_index(){
        $data = $this->model->get_data();
        $this->view->text($data); 
    }
}
?>