<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title'] ?></h3>
            <a href='/notifications'>Новые уведомления</a>
            <?php if($result): for($i = 0; $i < count($result); $i++): ?>
                <h4><?= $result[$i]['notifications_subject']; ?><h4>
                <p><?= $result[$i]['notifications_text']; ?></p>
                <hr></hr>
            <?php endfor; else: ?>
                <p>Прочитанных уведомлений пока что нет</p>
            <?php endif; ?>
        </div>
    </div>
</main>