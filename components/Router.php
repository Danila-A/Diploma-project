<?php

class Router 
{
    private $routes;

    public function __construct()
    {
        // Указываем путь к роутеру
        $routesPath = ROOT.'/config/routes.php';
        // Присваеваем массив, хранящийся в файле routes.php, свойству класса
        $this->routes = include($routesPath);
    }
    // Возвращает строку запроса
    // Тип string 
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    } 
    
    public function run()
    {   
        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path){

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)){
                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);



                // Определить какой контроллер 
                // и action обрабатывают запрос
                $segments = explode('/', $internalRoute);
                // array_shift - получает значение первого элемента массива и удаляет его из массива
                $controllerName = array_shift($segments).'Controller';
                // ucfirst - Делает первую букву строки заглавной
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;

                

                // Подключить файл кдасса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                // Вызывает метод у объекта и передаёт ему массив с параметрами и будут переданы как переменные
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null){
                    break;
                }
            }
        }
    }
}