<?php
include_once 'dblogin.php';

$lipdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
if (isset($_POST['email']) && isset($_POST['password'])) {
    $e = htmlspecialchars($_POST['email']);
    $p = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM users WHERE email='" . $e . "'";
    $r = $lipdo->query($query);
    $result = $r->fetch();
    if (!empty($result)){
        $pwhash = $result['password'];
        if (password_verify($p, $pwhash)){
            session_set_cookie_params(['SameSite' => 'Strict']);
            session_start();
            $_SESSION['loggedin'] = (bool) 1;
            $_SESSION['username'] = $result['first_name'];
            $_SESSION['userid'] = $result['id'];
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            
            include_once 'index.php';
        } else{
            $info = "<span class='span-error-text'>Неправильный пароль</span>";
            show_login_form($info);
        }
    } else{
        $info = "<span class='span-error-text'>Такой пользователь не зарегистрирован</span>";
        show_login_form($info);
    }
} else{
    show_login_form();
}
function show_login_form($additional_info = ''){
    $login_form = <<<_lf
    <div class="wide-content">
        <div class="m-col-el">
            <div id="div-form-login">
                $additional_info
                <form class='form-login' action="login.php" method="post">
                    <label for="email">Почта</label>
                    <input type="text" name="email">
                    <label for="'password">Пароль</label>
                    <input type="text" name="password">
                    <button class="button-regular" id="button-submit" type="submit">Войти</button>
                </form>
            </div>
        </div>
    </div>
_lf;
    echo $login_form;
}

?>