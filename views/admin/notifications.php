<main class="my-main">                   
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title']?></h3>
                <a href='/notifications/add'>Создать уведомление</a>
                <?php if($notifications): for($i = 0; $i < count($notifications); $i++): ?>
                    <p>Уведомление <?php echo $notifications[$i]['notifications_reg'] == 1 ? 'будет появлятся у новых пользователей' : 'не будет создаваться для новых пользователей'; ?> . Создал <?php echo $notifications[$i]['users_id'] = '24' ? 'администратор' : $notifications[$i]['users_id']; ?> для пользователей с id: <?= $notifications[$i]['notifications_to'] ?> . Тема уведомления-"<?= $notifications[$i]['notifications_subject']?>". Текст уведомления-"<?= $notifications[$i]['notifications_text']?>". <?echo $notifications[$i]['notifications_read'] == '' ? 'Уведомление еще никто не прочитал. ' : "Уведомление прочитали пользователи с id: ".$notifications[$i]['notifications_read']."."; ?> - <a href="/notifications/delete?id=<?= $notifications[$i]['notifications_id']?>">Удалить уведомление</a> - <a href="/notifications/editing?id=<?= $notifications[$i]['notifications_id']?>">Редактировать уведомление</a></p>
                <?php endfor; else: ?>
                    <p>Уведомлений пока что нет</p>
                <?php endif; ?>
        </div>                  
    </div>
</main>