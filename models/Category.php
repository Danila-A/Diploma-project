<?php

class Category
{
    public static function getCategorys()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `category`';

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        
        $i = 0; 
        while ($row = $result->fetch()){
            $categorys[$i]['id_category'] = $row['id_category'];
            $categorys[$i]['name_category'] = $row['name_category'];
            $categorys[$i]['sort_order'] = $row['sort_order'];
            $categorys[$i]['status'] = $row['status'];
            $i++;
        }

        return $categorys;
    }
}