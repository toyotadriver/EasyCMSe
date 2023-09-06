<?php
class Controller_Login extends Controller
{
    public $model;
    public $view;
    function __construct()
    {


        $this->view = new View();
    }
    public function action_index()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $e = htmlspecialchars($_POST['email']);
            $p = htmlspecialchars($_POST['password']);
            $this->model = new Model_Login($e, $p);
            $data = $this->model->get_data();
            if ($data) {
                session_set_cookie_params(['SameSite' => 'Strict']);
                session_start();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $data['first_name'];
                $_SESSION['userid'] = $data['id'];
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                $addr = $_SERVER['SERVER_ADDR'];
                header("Location: $addr");
            } else {
                $error = 'Неправильные логин или пароль';
                $this->view->generate('view_login.php', 'view_template.php', $error);
            }
        } else {
            $this->view->generate('view_login.php', 'view_template.php');
        }
    }

}
?>