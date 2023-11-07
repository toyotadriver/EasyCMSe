<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site template</title>
    <link href="styles/main_style.css" rel="stylesheet">
    <?php
    @include_jsmodule($data['js_modules']);
    include_scripts($data['HEAD_scripts']);
    //print_r($data);
        function include_jsmodule($jsmodules){
            foreach ($jsmodules as $jsmodule)
            echo "<script type='module' src=" . $jsmodule . "></script>";
        }
        function include_scripts($scripts){
            foreach ($scripts as $pair){
                $script = $pair['script'];
                $params = '';
                if(isset($pair['params']) && count($pair['params']) > 0) {
                    $params = implode(' ', $pair['params']);
                }
                echo "<script $params src=" . $script . "></script>";
            }
        }
    ?>
</head>
<body>
<div id='fixed-header'>
    <header>
        <div id="centered-header">
            <div id='h-logo' onclick="location.href='main'">
                <img src='imgs/logo.png'>
            </div>
            <div class='h-elem'>
                <img src='svgs/placeholder.svg'>
                <div id='address'>
                    <span id='ad-city'>Ростов-на-Дону</span><br>
                    <span id='ad-street'>ул. Ленина, 2Б</span>
                </div>
            </div>
            <?php 
            //НЕт пока что
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
                echo "<div class='h-white-button'" .  'onclick="' . "location.href='medtests'" . '"><p>Ваш чек-ап</p></div>';
                echo "<div id=" . "h-login" . " onclick=" . "location.href='logout'" . "><p>Выйти</p></div>";
            } else{
                echo "<div id=" . "h-login" . " onclick=" . "location.href='login'" . "><p>Войти</p></div>";
            };
            ?>
            
        </div>
    </header>
    <div class='navbar'>
        <nav class='m-col-el'>
            <a href=''>О клинике</a>
            <a href=''>Услуги</a>
            <a href=''>Специалисты</a>
            <a href=''>Цены</a>
            <a href=''>Контакты</a>
        </nav>
    </div>
</div>
<div id='wrapper'>
<?php 
include 'views/' . $content_view; ?>
</div>
<footer id="main-footer">
    <div class="m-col-el">
        <div id='f-logo'>
            <img id='fl' src='svgs/logo.svg'>
        </div>
        <div id='f-navbar'>
            <nav class='f-nav'>
                <a href=''>О клинике</a>
                <a href=''>Услуги</a>
                <a href=''>Специалисты</a>
                <a href=''>Цены</a>
                <a href=''>Контакты</a>
            </nav>
        </div>
    </div>
</footer>
</body>
</html>