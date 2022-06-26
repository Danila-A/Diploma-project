<?php 

class Vacancy
{
    public static function getVacancys()
    {
        $db = Db::getConnection();
        $sql = 'SELECT `id_vacancy`, `name_vacancy`, category.name_category FROM `vacancy` INNER JOIN `category` 
        ON vacancy.id_category = category.id_category WHERE vacancy.status = 1';

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $vacancy[$i]['id_vacancy'] = $row['id_vacancy'];
            $vacancy[$i]['name_vacancy'] = $row['name_vacancy'];
            $vacancy[$i]['name_category'] = $row['name_category'];
            $i++;
        }

        return $vacancy;
    }

    public static function getVacancyByCategoryId($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT `id_vacancy`, `name_vacancy`, category.name_category FROM `vacancy` INNER JOIN `category` 
        ON vacancy.id_category = category.id_category WHERE vacancy.id_category = :id AND  vacancy.status = 1';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $vacancy[$i]['id_vacancy'] = $row['id_vacancy'];
            $vacancy[$i]['name_vacancy'] = $row['name_vacancy'];
            $vacancy[$i]['name_category'] = $row['name_category'];
            $i++;
        }

        return $vacancy;
    }

    public static function getVacancyById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM vacancy WHERE id_vacancy = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function checkFile($file)
    {
        $fileExpansion = explode('.', $file);
        if ($fileExpansion[count($fileExpansion) - 1] == 'pdf' || $fileExpansion[count($fileExpansion) - 1] == 'PDF' 
        || $fileExpansion[count($fileExpansion) - 1] == 'docx' || $fileExpansion[count($fileExpansion) - 1] == 'doc') {
            return true;
        }
        return false;
    }

    public static function getAdminVacancys()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `vacancy`';

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        
        $i = 0; 
        while ($row = $result->fetch()){
            $categorys[$i]['id_vacancy'] = $row['id_vacancy'];
            $categorys[$i]['name_vacancy'] = $row['name_vacancy'];
            $categorys[$i]['id_category'] = $row['id_category'];
            $categorys[$i]['status'] = $row['status'];
            $i++;
        }

        return $categorys;
    }

    public static function saveVacancy($name, $category, $status)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO `vacancy`( `name_vacancy`, `id_category`, `status`) 
        VALUES (:name, :category, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':category', $category, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);


        return $result->execute();
    }

    public static function deleteVacancyById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM `vacancy` WHERE `id_vacancy` = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateVacById($id, $name, $category, $status)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE `vacancy` SET `name_vacancy`= :name, `id_category`= :category, `status`= :status WHERE `id_vacancy`= :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':category', $category, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);


        return $result->execute();
    }
}