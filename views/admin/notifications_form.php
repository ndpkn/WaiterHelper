<main class="my-main">                   
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title'] ?></h3>
            <form method="POST" action="">
                <label for="#new_reg">Отправлять это уведомление новым пользователям?</label>
                <input type="radio" name="new_reg" id="new_reg" value='1'>Да</input>
                <input type="radio" name="new_reg" id="new_reg" value='0'>Нет</input>
                <label for="#to">Выберите, кому отправить уведомление</label>
                <select name="to[]" id="to" multiple='true' size='4'>
                    <option value="All">Всем пользователям</option>
                    <?php for($i = 0; $i < count($arr_users); $i++): ?>
                        <option value="<?= $arr_users[$i]['users_id'] ?>"><?= $arr_users[$i]['users_name'].' '.$arr_users[$i]['users_last_name']; ?></option>    
                    <?php endfor;?>
                </select>
                <label for="#subject">Введите тему уведомления</label>
                <input type="text"  name="subject" id="subject"></input>
                <label for="#text">Введите текст уведомления</label>
                <textarea name="text" id = "text"></textarea>
                <input type="submit" name="sub" value="Создать"></input>
            <form>
        </div>                  
    </div>
</main>