<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title'] ?></h3>
            <a href='notifications/last'>Прочитанные уведомления</a>
            <a href='notifications/readAll'>Отметить все уведомления прочитанными</a>
            <?php if($result): for($i = 0; $i < count($result); $i++): ?>
                <h4><?= $result[$i]['notifications_subject']; ?><h4>
                <p><?= $result[$i]['notifications_text']; ?><a href='notifications/read?id=<?= $result[$i]['notifications_id'] ?>'>Отметить прочитаным</a></p>
                <hr></hr>
            <?php endfor; else: ?>
                <p>Новых Уведомлений пока что нет</p>
            <?php endif; ?>
        </div>
    </div>
</main>