<?php

class SiteController 
{   

    //Показ главной страницы сайта
    public function actionIndex(){
        // Переменная для указания, того какую панель навигации в header показывать
        $header = 'main';
        require_once(ROOT.'/views/site/index.php');
        return true;
    }
}