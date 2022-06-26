<?php

class UserController
{
    public function actionRegister()
    {

        $header = 'register';
        
        $result ='';

        $name = '';
        $email = '';
        $password = '';
        $phone = '';

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];

            $errors = false;

            if (!User::checkName($name)){
                $errors[] = 'Неправильный формат имени';
            }

            if (!User::checkEmail($email)){
                $errors[] = 'Неправильный Email';
            }
            if (!User::checkPhone($phone)){
                $errors[] = 'Неправильный формат телефона';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 3-х символов';
            }

            if ($password != $repeatPassword) {
                $errors[] = 'Пароли должны повторяться';
            }

            if (User::checkEmailExists($email)){
                $errors[] = 'Данный Email уже используется';
            }

            if ($errors == false){
                $result = User::register($name, $email, $phone, $password);    
            }
        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {

        $header = 'login';

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный Email';

            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 3-х символов';

            }

            // Проверяем существует ли пользоваетль
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                header("Location: /cabinet/");
            }
        }

        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }
}