<body>
    <?php if(isset($err)): ?>
        <?= $err; ?>
    <?php endif; ?>
    <form method="POST" action="">
        <p>Напишите почту, к которой привязан аккаунт</p>
        <input type="email" name="email"></input>
        <input type="submit" value="Отправить"></input>
    </form>
</body>
