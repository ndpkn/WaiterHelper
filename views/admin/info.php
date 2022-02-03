<main class="my-main">                   
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header">Информация о пользователях</h3>
                <p> На сайте зарегистрировано <?= count($this->info_users); ?> пользователей. </p>
                <?php for($i = 0; $i < count($this->info_users); $i++): ?>
                    <p>Пользватель <?php echo $this->info_users[$i]['name'].' '.$this->info_users[$i]['last_name']; ?> зарегистрировался на сайте <?= date('d-m-Y', strtotime($this->info_users[$i]['date_reg'])); ?>. Работает в заведение <?php echo $this->info_users[$i]['work_place'] != '' ? $this->info_users[$i]['work_place'] : "<i>'место работы не указано'</i>"; ?> по адресу <?php echo $this->info_users[$i]['work_adress'] != '' ? $this->info_users[$i]['work_adress']: "<i>'адрес не указан'</i>" ; ?></p>
                <?php endfor; ?>
        </div>                  
    </div>
</main>