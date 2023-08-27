<?php
include_once 'dblogin.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $e = htmlspecialchars($_POST['email']);
    $p = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM users WHERE email='" . $e . "'";
    $r = $pdo->query($query);
    $result = $r->fetch();
    if (!empty($result)){
        $pwhash = $result['password'];
        if (password_verify($p, $pwhash)){
            session_set_cookie_params(['SameSite' => 'Strict']);
            session_start();
            $_SESSION['username'] = $result['first_name'];
            $_SESSION['id'] = $result['id'];
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site template</title>
    <link href="styles/main_style.css" rel="stylesheet">
</head>
<body>
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
    </body>
</body>
_lf;
    echo $login_form;
}

?>