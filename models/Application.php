<?php

class Application 
{
    public static function getAppsByUserId($id) 
    {
        $db = Db::getConnection();
        $sql = 'SELECT vacancy.name_vacancy, `id_appclication`, `date_application`, `status_app` FROM `appclication`  
        INNER JOIN `vacancy` ON appclication.id_vacancy = vacancy.id_vacancy WHERE `id_user` = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        
        $apps = [];
        $i = 0; 
        while ($row = $result->fetch()){
            $apps[$i]['id_appclication'] = $row['id_appclication'];
            $apps[$i]['name_vacancy'] = $row['name_vacancy'];
            $apps[$i]['date_application'] = $row['date_application'];
            $apps[$i]['status_app'] = $row['status_app'];
            $i++;
        }

        return $apps;
    }


    public static function getAppById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM `appclication` WHERE `id_appclication` = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch();
    }

    public static function getStatusText($num)
    {
        switch ($num) {
            case '1':
                return 'На рассмотрении';
                break;
            case '2':
                return 'Одобрено';
                break;
            case '0':
                return 'Отказано';
                break;
        }
    }

    public static function saveApp($name, $email, $phone, $file, $id_vacancy, $idUser)
    {   
        $db = Db::getConnection();

        $sql = 'INSERT INTO `appclication`( `id_vacancy`, `name_user`, `id_user`, `email_appclication`, `phone_appclication`, `file_appclication`) 
        VALUES (:id_vacancy, :name, :id_user, :email, :phone, :file)';

        $result = $db->prepare($sql);
        $result->bindParam(':id_vacancy', $id_vacancy, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':file', $file, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function deleteAppById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM `appclication` WHERE `id_appclication` = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getApps()
    {
        $db = Db::getConnection();
        $sql = 'SELECT `id_appclication`, `name_user`,`phone_appclication`,`date_application`,`status_app` FROM `appclication`';

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        
        $i = 0; 
        while ($row = $result->fetch()){
            $apps[$i]['id_appclication'] = $row['id_appclication'];
            $apps[$i]['name_user'] = $row['name_user'];
            $apps[$i]['phone_appclication'] = $row['phone_appclication'];
            $apps[$i]['date_application'] = $row['date_application'];
            $apps[$i]['status_app'] = $row['status_app'];
            $i++;
        }

        return $apps;
    }

    public static function updateAppById($id, $name, $phone, $date, $status)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE `appclication` SET `date_application`= :date, `name_user`= :name, `phone_appclication`= :phone,
        `status_app`= :status WHERE `id_appclication`= :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);

        return $result->execute();
    }
}