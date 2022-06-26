<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/template/img/favicon/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="/template/css/adaptive.css">
    <?php if($header == 'main'): ?>
        <title>ТЕМП-АВИА</title>
    <?php elseif($header == 'register'): ?>
        <title>Регистрация</title>
    <?php elseif($header == 'login'): ?>
        <title>Вход</title>
    <?php elseif($header == 'cabinet'): ?>
        <title>Личный кабинет: <?php echo $user['name_user']; ?></title>
    <?php elseif($header == 'vacancy'): ?>
        <title>Вакансии</title>
    <?php elseif($header == 'vacancyForm'): ?>
        <title>Отправка заявки</title>
    <?php endif; ?>
</head>
<body>
    <a href="#header" class="up__link">
        <div class="content__linkup element__animation">
            
                <img src="/template/img/4fa4cc89c8dac44e7d6c8c41b1c9599e.png" alt="">
            
        </div>
    </a>
    <div class="wrapper">
        <header class="header" id="header"> 
            <div class="header__inner">
                <div class="header__logo">
                    <a href="/">
                        <img src="/template/img/logo/logo.png"  class="logo__img">
                    </a>
                </div>
                <div class="header__button">
                   <img src="/template/img/menu-4-32.ico" alt="" class="button__icon">
                </div>
            </div>
            <div class="header__menu">
                <nav class="menu__nav">
                    <?php if($header == 'main'): ?>
                        <ul>
                            <li>
                                <a href="#aboutus" class="nav__button menu__button">О нас</a>
                            </li>
                            <li>
                                <a href="#reviews" class="nav__button menu__button">Отзывы рабочих</a>
                            </li>
                            <li>
                                <a href="#contacts" class="nav__button menu__button">Контакты</a>
                            </li>
                            <li>
                                <a href="#products" class="nav__button menu__button">Продукция</a>
                            </li>
                            <li>
                                <a href="user/register" class="nav__button menu__button">Присоединиться к нам</a>
                            </li>
                            <li>
                                <a href="user/login" class="nav__button menu__button">Войти</a>
                            </li>
                        </ul>
                    <?php elseif($header == 'register'): ?>
                        <ul>
                            <li>
                                <a href="/" class="nav__button menu__button">Глваная</a>
                            </li>
                            <li>
                                <a href="login" class="nav__button menu__button">Войти</a>
                            </li>
                        </ul>
                    <?php elseif($header == 'login'): ?>
                        <ul>
                            <li>
                                <a href="/" class="nav__button menu__button">Глваная</a>
                            </li>
                            <li>
                                <a href="register" class="nav__button menu__button">Присоединиться к нам</a>
                            </li>
                        </ul>
                    <?php elseif($header == 'cabinet'): ?>
                        <ul>
                            <li>
                                <a href="/vacancy" class="nav__button menu__button">Вакансии</a>
                            </li>
                            <li>
                                <a href="/user/logout/" class="nav__button menu__button">Выйти из личного кабинета</a>
                            </li>
                        </ul>
                    <?php elseif($header == 'vacancy'): ?>
                        <ul>
                            <li>
                                <a href="cabinet" class="nav__button menu__button">Личный кабинет</a>
                            </li>
                            <li>
                                <a href="/user/logout/" class="nav__button menu__button">Выйти из личного кабинета</a>
                            </li>
                        </ul>
                    <?php elseif($header == 'vacancyForm'): ?>
                        <ul>
                            <li>
                                <a href="/vacancy" class="nav__button menu__button">Вакансии</a>
                            </li>
                            <li>
                                <a href="/cabinet" class="nav__button menu__button">Личный кабинет</a>
                            </li>
                            <li>
                                <a href="/user/logout/" class="nav__button menu__button">Выйти из личного кабинета</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </nav>
            </div>
        </header>