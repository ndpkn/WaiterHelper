<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title'] ?></h3>
            <a href="support/new">Создать вопрос</a>
            <h4>Ваши открытые вопросы<h4>
                <?php if($result_tickets): for($i = 0; $i < count($result_tickets); $i++): ?>
                    <a href="/support/ticket?<?= $result_tickets[$i]['tickets_id'] ?>"><?= $result_tickets[$i]['tickets_name'] ?> </a> создан <?= $result_tickets[$i]['tickets_date_create'] ?> 
                <?php endfor; else: ?>
                    <p>Сейчас у вас нет открытых вопросов в тех.поддержку</p>
                <?php endif; ?>
            <h4>Ваши закрытые вопросы<h4>
            <?php if($result_tickets_close): for($i = 0; $i < count($result_tickets_close); $i++): ?>

            <?php endfor; else: ?>
                <p>Сейчас у вас нет закрытых вопросов в тех.поддержку</p>
            <?php endif; ?>
        </div>
    </div>
</main>