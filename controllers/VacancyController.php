<?php

class VacancyController
{

    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        $header = 'vacancy';

        require_once(ROOT.'/views/vacancy/index.php');
        return true;
    }

    public function actionSendApp($id) 
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        $userData = User::getUserById($userId);

        $vacancyData = Vacancy::getVacancyById($id);

        $header = 'vacancyForm';

        $result = false;
        $errors = [];

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
                



            if (!User::checkName($name)){
                $errors[] = 'Неправильный формат имени';
            }

            if (!User::checkEmail($email)){
                $errors[] = 'Неправильный Email';
            }
            if (!User::checkPhone($phone)){
                $errors[] = 'Неправильный формат телефона';
            }
            if (is_uploaded_file($_FILES['file']['tmp_name'])){
                if (Vacancy::checkFile($_FILES['file']['name'])) {
                    move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. "/upload/applications/{$_FILES['file']['name']}");
                }
                else {
                    $errors[] = 'Неправильный формат резюме';
                }
            }

            if ($errors == false){
                $result = Application::saveApp($name, $email, $phone, $_FILES['file']['name'], $id, $userId);
            }
        }


        require_once(ROOT.'/views/vacancy/form.php');
        return true;
    }
}