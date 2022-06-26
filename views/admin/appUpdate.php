<!-- header -->
<?php include ROOT.'/views/layouts/admin_header.php'; ?>

    <div class="admin__content container">
            <div class="content__inner">
                <div class="content__title">
                    <p>Изменить данные о заявке №<?php echo $app['id_appclication'];?></p>
                </div>
                <div class="content__updateform">
                    <form action="" method="post" class="update__form">
                        <span>Имя пользователя</span>
                        <input type="text" name="name" placeholder="имя" value="<?php echo $app['name_user']; ?>">
                        <span>Телефон пользователя</span>
                        <input type="text" name="phone" placeholder="номер сортировки" value="<?php echo $app['phone_appclication']; ?>">
                        <span>Дата оформления</span>
                        <input type="text" name="date" placeholder="дата" value="<?php echo $app['date_application']; ?>">
                        <span>Статус</span>
                        <select name="status" id="">
                            <option value="1" <?php if ($app['status_app'] == 1) echo ' selected="selected"'; ?>>На рассмотрении</option>
                            <option value="2" <?php if ($app['status_app'] == 2) echo ' selected="selected"'; ?>>Одобрена</option>
                            <option value="0" <?php if ($app['status_app'] == 0) echo ' selected="selected"'; ?>>Отклонена</option>
                        </select>
                        <button href="" class="table__button">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/admin_footer.php'; ?>