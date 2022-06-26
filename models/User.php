<?php

class User
{
    public static function register($name, $email, $phone, $password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name_user, email_user, phone_user, password_user) VALUES (:name, :email, :phone, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id_user = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit($id, $name, $phone, $email)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user set name_user = :name, email_user = :email,  phone_user = :phone WHERE id_user = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        return $result->execute();
    }

    // Проверяет валидацию имени: не меньше, чем 2 символа
    public static function checkName($name)
    {
        $chr_en = "a-zA-Z0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]";

        // mb_strlen() - работает правильно и с русским текстом в отличии от strlen()
        if (mb_strlen($name) >= 2 && !preg_match("/[a-zA-Z]+/", $name)) {
            return true;
        } 
        

        return false;
    }
    // Проверка телефона по его длине номера
    public static function checkPhone($phone)
    {
        if (mb_strlen($phone) >= 11 && mb_strlen($phone) <= 12){
            return true;
        }
        return false;
    }

    // Проверяет валидацию пароля: не меньше, чем 6 символов
    public static function checkPassword($password)
    {
        if (strlen($password) >= 3){
            return true;
        }
        return false;
    }

    // Проверяет валидацию email
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    // Проверяем существование Email в нашей БД
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        // Подготовленный запрос
        // Он отличается от обычного запроса тем, что мы не передаём прямо в запрос наш параметр
        // а используем специальный placeholder
        // Позже он будет заменён нашим параметром
        // Это делается для обеспечения безопасности нашей БД
        $sql = 'SELECT COUNT(*) FROM user WHERE email_user = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()){
            return true;
        }
        return false;
    }


    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email_user = :email AND password_user = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id_user'];
        }

        return false;
    }

    

}