<div id='fixed-header'>
    <header>
        <div id="centered-header">
            <div id='h-logo' onclick="location.href='index.php'">
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
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
                echo "<div class='h-white-button'" .  'onclick="' . "location.href='index.php?medtable'" . '"><p>Ваш чек-ап</p></div>';
                echo "<div id=" . "h-login" . " onclick=" . "location.href='index.php?logout'" . "><p>Выйти</p></div>";
            } else{
                echo "<div id=" . "h-login" . " onclick=" . "location.href='index.php?login'" . "><p>Войти</p></div>";
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