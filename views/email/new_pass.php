<form method="POST" action="">
    <?php if(isset($err)): ?>
        <?= $err ?>
    <?php endif; ?>
    <p>Введите новый пароль</p>
    <input type="hidden" name="user_id" value="<?php echo $result['users_id']; ?>"></input>
    <input type="password" name="pass"></input>
    <input type="password" name="repeat_pass"></input>
    <input type="submit" value="Отправить"></input>
</form>