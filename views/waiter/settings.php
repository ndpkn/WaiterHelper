<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header">Мои настройки</h3>
            <?php if($this->form->err): for($i = 0; $i < count($this->form->err); $i++):?>
                <p><?= $this->form->err ?></p>
            <?php endfor; endif; ?>
            <form class="form-info" action="" method="POST">
                <div class="form-info-input">
                    <div class="input-block">
                        <label class="text-field__label" for="login">Логин:</label>
                        <input type="text" name="login" value="<?php echo $result[0]['users_login']; ?>"> 
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="name">Имя:</label>
                        <input type="text" name="name" value="<?php echo $result[0]['users_name']; ?>"> 
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="last_name">Фамилия: </label>
                        <input type="text" name="last_name" value="<?php echo $result[0]['users_last_name']; ?>"> 
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="work">Место работы: </label>
                        <div name="places_list">
                            <select name="work">
                            <option value="0">Выберите место работы</option>
                            <?php for($i = 0; $i < count($works_arr); $i++): ?>
                                <option <?php echo $works_arr[$i]['work_places_name'] == $user_work[0]['work_places_name'] ? 'selected=selected' : ''; ?>value="<?php echo $works_arr[$i]['work_places_name']; ?>"><?php echo $works_arr[$i]['work_places_name']; ?></option>
                            <?php endfor; ?>
                            </select> 
                        </div>
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="adress">Адрес работы: </label>
                        <div name="adress_list">
                            <select name="adress">
                                <option value='0'>Выберите адрес работы</option>
                                <?php for($i = 0; $i < count($works_adress); $i++): ?>
                                    <option <?php echo $works_adress[$i]['work_places_adress'] == $user_work[0]['work_places_adress'] ? 'selected=selected' : ''; ?> value="<?php echo $works_adress[$i]['work_places_adress']; ?>"><?php echo $works_adress[$i]['work_places_adress']; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="new_work" value="0">Указать новое место работы</input>
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="percent">Процент от кассы: </label>
                        <input type="number" name="percent" value="<?php echo $result_settings[0]['settings_percent']; ?>">
                    </div>
                    <div class="input-block mail">
                        <label class="text-field__label" for="email">Электронная почта: </label>
                        <input type="email" name="email" value="<?php echo $result_email[0]['email_adress']; ?>">
                        <?php if($result_email[0]['email_confirmation'] != 1): ?>
                        <div id="block_email"><input class="btn1" type="button" id="but_email" value="Подтвердить почту"></button></div>
                        <?php else: ?>
                            <div id="block_email"><p>Почта подтверждена</p></div>
                        <hr>
                        <?php endif; ?>
                    </div>
                    <div class="checkbox-block">
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="tips">Чаевые: </label>
                            <input type="checkbox" name="tips" <?php echo $result_settings[0]['settings_tips'] == 'on' ? 'checked' :"";?> >
                        </div>
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="taxi">Такси: </label>
                            <input type="checkbox" name="taxi" <?php echo $result_settings[0]['settings_taxi'] == 'on' ? 'checked' :"";?> > 
                        </div>
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="rub">Натирка: </label>
                            <input type="checkbox" name="rub" <?php echo $result_settings[0]['settings_rub'] == 'on' ? 'checked' :"";?> >
                        </div>
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="other">Прочие расходы: </label>
                            <input type="checkbox" name="other" <?php echo $result_settings[0]['settings_other'] == 'on' ? 'checked' :"";?> > 
                        </div>
                    </div>
                        <div class="button_block" id="button_block">
                            <input class="info-enter" type="submit" name="reg" value="Изменить">
                        </div>
                </div>
            </form>
        </div>
    </div>
</main>