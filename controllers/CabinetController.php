<?php

class CabinetController
{
    public function actionEdit()
    {   
        header("Content-Type: application/json");
        
        $arr = json_decode(file_get_contents("php://input"));
        $arr = (array) $arr;
        
        $name = $arr['name'];
        $phone = $arr['phone'];
        $email = $arr['email'];

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем инфу о пользователе из БД
        $user = User::getUserById($userId);

        if (!empty($name) && !empty($phone) && !empty($email)) {
            $result = User::edit($userId, $name, $phone, $email);
        }
        
        return true;
    }
    public function actionIndex()
    {   

        $header = 'cabinet';

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем инфу о пользователе из БД
        $user = User::getUserById($userId);

        $apps = Application::getAppsByUserId($userId);

        require_once(ROOT.'/views/cabinet/index.php');

        return true;
    }

    public function actionDelete($id)
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        Application::deleteAppById($id);

        header("Location: /cabinet");
    }
    
}