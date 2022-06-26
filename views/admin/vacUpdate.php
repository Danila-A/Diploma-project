<!-- header -->
<?php include ROOT.'/views/layouts/admin_header.php'; ?>

        <div class="admin__content container">
            <div class="content__inner">
                <div class="content__title">
                    <p>Изменить данные о Вакансии №<?php echo $vac['id_vacancy']; ?></p>
                </div>
                <div class="content__updateform">
                    <form action="" method="post" class="update__form">
                        <span>Название</span>
                        <input type="text" name="name" placeholder="название" value="<?php echo $vac['name_vacancy']; ?>">
                        <span>Категория</span>
                        <select name="category" id="">
                            <option value="1" <?php if ($vac['id_category'] == 1) echo ' selected="selected"'; ?>>Специалисты</option>
                            <option value="2" <?php if ($vac['id_category'] == 2) echo ' selected="selected"'; ?>>Руководители</option>
                            <option value="3" <?php if ($vac['id_category'] == 3) echo ' selected="selected"'; ?>>Рабочие</option>
                        </select>
                        <span>Статус</span>
                        <select name="status" id="">
                            <option value="1" <?php if ($vac['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($vac['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                        </select>
                        <button href="" class="table__button">Изменить</button>
                    </form>
                </div>
            </div>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/admin_footer.php'; ?>