<main class="autorization-main">
    <div class="block-form-autorization">
        <form class="form-autorization"  method="POST" action>
            <div class="form-autorization-input">
            <?php 
                if(isset($err)){
                    foreach($err as $key){
                        echo $key.'<br>';
                    }
                }
            ?>
                <h3 class="my-block__header">Авторизация</h3>
                <div class="input-block">
                    <input class="autorization-input" type="login" name="login" placeholder="Введите логин">
                </div>
                <div class="input-block">
                    <input class="autorization-input" type="password" name="password" placeholder="Введите пароль">
                </div>
                <input class="autorization-enter" type="submit" value="Войти">
                <a href="/email">Забыли пароль?</a>
                <a href="/reg">Зарегистрироваться</a>
            </div>
        </form>
    </div>
</main>
