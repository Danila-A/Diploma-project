<?php

class AjaxController
{
    public function actionVacancys() 
    {
        header("Content-Type: application/json");

        $vacancy = Vacancy::getVacancys();

        echo json_encode($vacancy);
        return true;
    }

    public function actionVaccategory($id) {
        header("Content-Type: application/json");

        $vacancy = Vacancy::getVacancyByCategoryId($id);

        echo json_encode($vacancy);
        return true;
    }

    public function actionAdminApp()
    {
        header("Content-Type: application/json");

        $apps = Application::getApps();

        echo json_encode($apps);
        return true;
    }

    public function actionAdminCat()
    {
        header("Content-Type: application/json");

        $categorys = Category::getCategorys();

        echo json_encode($categorys);
        return true;
    }

    public function actionAdminVac()
    {
        header("Content-Type: application/json");

        $vacancys = Vacancy::getAdminVacancys();

        echo json_encode($vacancys);
        return true;
    }
}