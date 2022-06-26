<?php

// FRONT CONTROLLER

// 1. Общие настройки
// Настройка отображений ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов системы
// Указываем полный путь к папке нашего сайта и заключаем в переменную ROOT
define('ROOT', dirname(__FILE__));
//Использование функции автозагрузки файлов
require_once (ROOT.'/components/Autoload.php');
// require_once (ROOT.'/components/Router.php');
// require_once (ROOT.'/components/Db.php');

// 3. Установка соединения с БД

// 4. Вывоз Router
$router = new Router();
$router->run();
