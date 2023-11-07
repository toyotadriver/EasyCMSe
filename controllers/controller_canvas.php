<?php
class Controller_Canvas extends Controller{
    public $model;
    public $view;
    function __construct(){
        $this->view = new View;
        $this->model = new Model_Canvas;
    }
    public function action_index(){
        $data = $this->model->get_data();
        $this->view->generate('view_canvas.php', 'view_template.php', $data);
    }
}
?>