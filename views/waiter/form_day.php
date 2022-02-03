<main class="my-main">
    <div class="my-block">
    <?php if($this->model->form->err): for($i = 0; $i < count($this->model->form->err); $i++):?>
        <p><?= $this->model->form->err[$i] ?></p>
    <?php endfor; endif; ?>
        <form class="form-info" method="POST" action>
            <div class="form-info-input">
                <input type="hidden" name="act" value="<?php echo $date_result != NULL ? 'update': 'insert';?>">
                <div class="input-block__date">
                    <p>Дата</p>
                    <input type="date" name="date" id="date" value="<?php echo $data['today_date']; ?>"/>
                </div>
                <div class="input-block">
                    <input type="number" name="percent" placeholder="Зарплата" pattern="\d*" value="<?php echo $date_result != NULL ? $date_result[0]['information_percent']: ""; ?>"/>
                </div>
                <div class="input-block">
                    <input type="number" name="kassa" placeholder="Касса" pattern="\d*" value="<?php echo $date_result != NULL ?  $date_result[0]['information_kassa']: ""; ?>"/>
                </div>
                <?php if($settings[0]['settings_tips'] == 'on'): ?>
                <div class="input-block">
                    <input type="number" name="tips" placeholder="Чаевые" pattern="\d*" value="<?php echo $date_result != NULL ?  $date_result[0]['information_tips']: ""; ?>"/>
                </div>
                <?php endif; ?>
                <?php if($settings[0]['settings_taxi'] == 'on'): ?>
                <div class="input-block">
                    <input type="number" name="taxi" placeholder="Такси" pattern="\d*" value="<?php echo $date_result != NULL ?  $date_result[0]['information_taxi']: ""; ?>"/>
                </div>
                <?php endif; ?>
                <?php if($settings[0]['settings_rub'] == 'on'): ?>
                <div class="input-block">
                    <input type="number" name="rub" placeholder="Натирка" pattern="\d*" value="<?php echo $date_result != NULL ?  $date_result[0]['information_rub']: ""; ?>"/>
                </div>
                <?php endif; ?>
                <?php if($settings[0]['settings_other'] == 'on'): ?>
                <div class="input-block">
                    <input type="number" name="other" placeholder="Прочие расходы" pattern="\d*" value="<?php echo $date_result != NULL ?  $date_result[0]['information_other']: ""; ?>"/>
                </div>
                <?php endif; ?>
                <div class="button_block" id="button_block">
                <?php if($date_result != Null): ?>
                    <input class="info-enter" type="submit" name="sub" value="Изменить данные" />
                    <input class="info-enter" type="submit" name="delete" value="Удалить данные" />
                <?php else: ?>
                    <input class="info-enter" type="submit" name="sub" value="Добавить данные" />
                <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</main>