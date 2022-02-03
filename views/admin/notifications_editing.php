<main class="my-main">                   
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title'] ?></h3>
            <form method="POST" action="">
                <label for="#new_reg">Отправлять это уведомление новым пользователям?</label>
                <input type="radio" name="new_reg" id="new_reg" value='1' <?php echo $notificationas[0]['notifications_reg'] == '1' ? 'checked': ''?>>Да</input>
                <input type="radio" name="new_reg" id="new_reg" value='0' <?php echo $notificationas[0]['notifications_reg'] == '0' ? 'checked': ''?>>Нет</input>
                <label for="#to">Выберите, кому отправить уведомление</label>
                <select name="to[]" id="to" multiple='true' size='4'>
                    <option value="All">Всем пользователям</option>
                    <?php for($i = 0; $i < count($arr_users); $i++): ?>
                        <option value="<?= $arr_users[$i]['users_id'] ?>" 
                            <?php for($j = 0; $j < count($arr_to); $j++): ?>
                                <?php echo $arr_to[$j] == $arr_users[$i]['users_id'] ? "selected='selected'" : ''; ?>
                            <?php endfor; ?>
                            ><?= $arr_users[$i]['users_name'].' '.$arr_users[$i]['users_last_name']; ?></option>    
                    <?php endfor; ?>
                </select>
                <label for="#subject">Введите тему уведомления</label>
                <input type="text"  name="subject" id="subject" value="<?= $notificationas[0]['notifications_subject'] ?>"></input>
                <label for="#text">Введите текст уведомления</label>
                <textarea name="text" id = "text"><?= $notificationas[0]['notifications_text'] ?></textarea>
                <input type="submit" name="editing" value="Редактировать"></input>
            <form>
        </div>                  
    </div>
</main>