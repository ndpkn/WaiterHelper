<?php 

    $type = user_type();

    if($type == 'admin'){
        //Страницы администратора
        $path['info'] = 'admin/info'; //информация о пользователях
        $path['info/data'] = 'admin/info/data'; //информация о внесенных данных
        $path['info/conducting'] = 'admin/info/conducting'; //информация о заведениях
        $path['notifications'] = 'admin/notifications'; //Уведомления
        $path['notifications/add'] = 'admin/notifications/add'; //Добавление уведомления
        $path['notifications/delete'] = 'admin/notifications/delete'; //Удаление уведомления
        $path['notifications/editing'] = 'admin/notifications/editing'; //Редактирование уведомления

        $path['message'] = 'admin/message'; //сообщения в тех.поддержку
        
 
        $path['ip'] = 'admin/ip'; //ip надо будет убрать

        $path['exit'] = 'close'; //Разавторизация

        $path['default'] = 'admin/info'; //Страница по умолчанию
    }
    elseif($type == 'waiter'){
        //Страницы обычного пользователя 
        $path['info'] = 'waiter/day'; //Внесение данных
        $path['my'] = 'waiter/my'; //Личная статистика
        $path['all'] = 'waiter/all'; //Общая статистика
        $path['settings'] = 'waiter/settings'; //Настройки
        $path['settings/place'] = 'waiter/settings/place'; //Настройки получение адресов заведения

        $path['conducting'] = 'waiter/conducting'; //Оценка заведения
        $path['conducting/info'] = 'waiter/conducting/info'; //Информация о заведениях

        $path['notifications'] = 'waiter/notifications'; //Уведомления
        $path['notifications/read'] = 'waiter/notifications/read'; //прочитать
        $path['notifications/readAll'] = 'waiter/notifications/readAll'; //прочитать все
        $path['notifications/last'] = 'waiter/notifications/last'; //прочитанные уведомления

        $path['support'] = 'waiter/support';// тех.поддержка
        $path['support/new'] = 'waiter/support/new';// тех.поддержка

        $path['schedule'] = 'waiter/schedule'; //рабочий график
        
        $path['email/mail'] = 'email/mail'; //Поддтверждение пароля

        $path['exit'] = 'close'; //Разавторизация
        
        $path['default'] = 'waiter/day'; //мтраница по умолчанию

        

        //$path['sorces/charts'] = 'user/sources/charts';
        //$path['sorces/date'] = 'user/sources/date';
        //$path['sorces/modal'] = 'user/sources/modal';
        //$path['sorces/percent'] = 'user/sources/percent';
    }
    elseif($type == 'bartender'){
        //Страницы обычного пользователя 
        $path['info'] = 'bartender/day'; //Внесение данных
        $path['my'] = 'bartender/my'; //Личная статистика
        $path['settings'] = 'bartender/settings'; //Настройки
        $path['settings/place'] = 'bartender/settings/place'; //Настройки получение адресов заведения

        $path['email/mail'] = 'email/mail'; //Поддтверждение пароля

        $path['exit'] = 'close'; //Разавторизация
        
        $path['default'] = 'waiter/day'; //мтраница по умолчанию
        
    }
    elseif($type == 'not_type'){
        //Страницы не авторизованного пользователя
        $path['reg'] = 'registration'; //Регистрация
        $path['reg/place'] = 'registration/place'; //Подгрузка мест работы
        $path['auto'] = 'autorization'; //Авторизация

        $path['email'] = 'email'; //восствновление пароля по почте
        $path['email/hash'] = 'email/hash'; //получения хеша

        $path['default'] = 'autorization'; //Страница по умолчанию
    }

    //Страницы, доступные всем пользователям
    $path['email/confirmation'] = 'email/confirmation'; //поддтверждение почты
    
    $path['error'] = 'err'; //Страница ошибки
    

