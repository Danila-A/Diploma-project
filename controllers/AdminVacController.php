<?php 

class AdminVacController extends AdminBase
{
    public function actionSave()
    {
        self::checkAdmin();

        if (isset($_POST['name'])) {
            $options['name'] = $_POST['name'];
            $options['category'] = $_POST['category'];
            $options['status'] = $_POST['status'];

            Vacancy::saveVacancy($options['name'], $options['category'], $options['status']);

            header("Location: /admin/");
        }

        require_once(ROOT.'/views/admin/vacSave.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        Vacancy::deleteVacancyById($id);

        header("Location: /admin/");
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $vac = Vacancy::getVacancyById($id);

        if (isset($_POST['name'])) {
            $options['name'] = $_POST['name'];
            $options['category'] = $_POST['category'];
            $options['status'] = $_POST['status'];

            Vacancy::updateVacById($id, $options['name'], $options['category'], $options['status']);

            header("Location: /admin/");
        }

        require_once(ROOT.'/views/admin/vacUpdate.php');
        return true;
    }
}