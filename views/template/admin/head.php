<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../sources/css/style.css">
    <link rel="stylesheet" type="text/css" href="../sources/css/main.css">
    <title><?php echo $data['title'] ?></title>
</head>
<body>
    <header>
    <div class="header" id="header">
    <div class="logo">
            <h4>
                   Админ-панель
            </h4>
        </div>
        <nav class="navigation">
            <ul class="nav-list">
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/info">Информация о пользователях</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/info/data">Информация о внесенных данных</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/info/conducting">Информация о заведениях</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="/notifications">Уведомления</a>
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
                    <a class="nav-list__link-mob" href="/info">Информация о пользователях</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/info/data">Информация о внесенных данных</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/info/conducting">Информация о заведениях</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/notifications">Уведомления</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="/exit">Выход</a>
                </li>
            </ul>
        </nav>
    </div>
</header>