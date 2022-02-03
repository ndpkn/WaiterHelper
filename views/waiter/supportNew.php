<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header"><?= $data['title'] ?></h3>
            <h4>Создать вопрос</h4>
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="name">Укажите название вопроса</label>
                <input type="text" name="name" id="name">
                <label for="file">Если необходимо можно загрузить изображение</label>
                <input type="file" name="image" id="file">
                <label for="text">Введите текст вопроса</label>
                <input type="text" name="text" id="text">
                <input type="submit" name="sub" value="Создать">
            </form>
        </div>
    </div>
</main>