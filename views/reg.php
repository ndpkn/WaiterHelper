<main class="reg-main">
    <div class="block-form-reg">
        <form class="form-reg"  method="POST" action>
            <div class="form-reg-input">

                <h3 class="my-block__header">Регистрация</h3>

                <div class="input-block">
                    <input type="login" name="login" id="login" placeholder="Логин">
                </div>
                <div class="input-block">
                    <input type="password" name="password" id="password" placeholder="Пароль">
                </div>
                <div class="input-block">
                    <input type="password" name="password_repeat" id="password_repeat" placeholder="Повторите пароль">
                </div>
                <div class="input-block">
                    <input type="text" name="name" id="name" placeholder="Имя">
                </div>
                <div class="input-block">
                    <input type="text" name="last_name" id="last_name" placeholder="Фамилия">
                </div>
                <div class="input-block" name="places_list">
                    <label for="position">Выберите должность</label> 
                    <select name = "position" id="position">
                        <option value = "0"></option>
                        <option value = "waiter">Официант</option>
                        <option value = "bartender">Бармен</option>
                    </select>
                </div>
                <div class="input-block" name="places_list">    
                    <label for="work_place">
                        Выберите место работы из предложенного
                    </label>
                    <select name="work_place" id="work_place">
                        <?php for($i = 0; $i < count($places); $i++): ?>
                            <option name="<?= $places[$i]['place'] ?>"><?= $places[$i]['place']; ?></option>
                        <?php endfor; ?>
                        </select>
                </div>
                <div class="input-block" name="adress_block">    
                    
                </div>
                <div>
                    <input type="checkbox" name="check_place" value="0">Указать новое место работы</input>
                </div>
                <?php if(isset($val) && ($val !== true)): for ($i = 0; $i < count($val); $i++): ?> 
                            <?= $val[$i] ?><br>
                <?php endfor; endif; ?>

                <input class="reg-enter" type="submit" value="Зарегистрироваться"> 
                <a href="/">Авторизация</a>
            </div>
        </form>
    </div>
</main>
