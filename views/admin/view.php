<!-- header -->
<?php include ROOT.'/views/layouts/admin_header.php'; ?>

        <div class="admin__content container">
            <div class="content__inner">
                <div class="content__title">
                    <p>Просмотр заявки №<?php echo $app['id_appclication']; ?></p>
                </div>
                <div class="content__data">
                    <table class="admin__table">
                        <tr>
                            <td>Номер заявки</td>
                            <td><?php echo $app['id_appclication']; ?></td>
                        </tr>
                        <tr>
                            <td>Номер пользователя</td>
                            <td><?php echo $app['id_user']; ?></td>
                        </tr>
                        <tr>
                            <td>Имя пользователя</td>
                            <td><?php echo $app['name_user']; ?></td>
                        </tr>
                        <tr>
                            <td>Телефон пользователя</td>
                            <td><?php echo $app['phone_appclication']; ?></td>
                        </tr>
                        <tr>
                            <td>Вакансия</td>
                            <td><?php echo $vacancy['name_vacancy']; ?></td>
                        </tr>
                        <tr>
                            <td>Дата</td>
                            <td><?php echo $app['date_application']; ?></td>
                        </tr>
                        <tr>
                            <td>Резюме</td>
                            <td>
                                <a href="/upload/applications/<?php echo $app['file_appclication']; ?>" target="_blank">
                                    <?php echo $app['file_appclication']; ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td><?php echo Application::getStatusText($app['status_app']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    

<!-- footer -->
<?php include ROOT.'/views/layouts/admin_footer.php'; ?>