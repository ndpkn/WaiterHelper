<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../sources/css/style.css">
    <link rel="stylesheet" type="text/css" href="../sources/css/main.css">
    <link rel="shortcut icon" href="../views/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../views/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="../views/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="../views/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="../views/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="../views/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="../views/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="../views/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="../views/img/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="../views/img/apple-touch-icon-180x180.png" />
    <title><?php echo $data['title'] ?></title>
</head>
<body>
    <?php
        if (!$page):
    ?>
    <header>
    <div class="header" id="header">
        <div class="logo">
            <h4>
                    <?php 
                        if (date('H') < 11 && date('H') >= 4){
                            echo 'Доброе утро,';
                        }
                        elseif(date('H') < 17 && date('H') >= 11){
                            echo 'Добрый день,';
                        }
                        elseif(date('H') < 23 && date('H') >= 17){
                            echo 'Добрый вечер,';
                        }
                        else {
                            echo 'Доброй ночи,';
                        }
                    ?>
                <br> <?php echo $this->get_name().' '.$this->get_last_name();?>
            </h4>
        </div>
        <nav class="navigation">
            <ul class="nav-list">
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/info">Внести данные</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/my">Моя статистика</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/all">Общая статистика</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/settings">Мои настройки</a>
                </li>
                <li class="nav-list__item">
                    <a href="#" data-toggle="modal" data-target="#feedback">Обратная связь</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/exit">Выход</a>
                </li>
            </ul>
        </nav>
        <div class="header-buttons">
            <button class="header-burger">
              <span></span>
            </button>
          </div>
    </div>
    <div class="mobile-menu">
        <nav class="navigation-mob">
            <ul class="nav-list-mob">
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/info">Внести данные</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/my">Моя статистика</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/all">Общая статистика</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/settings">Мои настройки</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="#" data-toggle="modal" data-target="#feedback">Обратная связь</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/exit">Выход</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
    <?php endif; ?>