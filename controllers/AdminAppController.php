<?php

class AdminAppController extends AdminBase
{
    public function actionView($id)
    {
        self::checkAdmin();

        $app = Application::getAppById($id);

        $vacancy = Vacancy::getVacancyById($app['id_vacancy']);

        require_once(ROOT.'/views/admin/view.php');
        return true;
    }

    public function actionUpdate($id) 
    {
        self::checkAdmin();

        $app = Application::getAppById($id);

        if (isset($_POST['name'])) {
            $options['name'] = $_POST['name'];
            $options['phone'] = $_POST['phone'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];

            Application::updateAppById($id, $options['name'],  $options['phone'], $options['date'], $options['status']);

            header("Location: /admin/");
        }

        require_once(ROOT.'/views/admin/appUpdate.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        Application::deleteAppById($id);

        header("Location: /admin/");
    }
}