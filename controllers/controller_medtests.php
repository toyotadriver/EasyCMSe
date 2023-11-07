<?php
class Controller_Medtests extends Controller{
    public $model;
    public $view;
    function __construct(){
        $this->model = new Model_Medtests;
        $this->view = new View;
    }
    public function action_index(){
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
            $data = $this->model->get_data();
            $this->view->generate('view_medtests.php', 'view_template.php', $data);
        } else{
            header('Location: main');
        }
    }
}
?>