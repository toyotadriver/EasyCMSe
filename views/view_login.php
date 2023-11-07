<div class="wide-content">
        <div class="m-col-el">
            <div id="div-form-login">
                <?php echo "<span class='span-error-text'>" . $data . "</span>"; ?>
                <form class='form-login' action='login' method="post">
                    <label for="email">Почта</label>
                    <input type="text" name="email">
                    <label for="'password">Пароль</label>
                    <input type="text" name="password">
                    <button class="button-regular" id="button-submit" type="submit">Войти</button>
                </form>
            </div>
        </div>
    </div>