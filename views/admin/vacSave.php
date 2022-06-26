<!-- header -->
<?php include ROOT.'/views/layouts/admin_header.php'; ?>

        <div class="admin__content container">
            <div class="content__inner">
                <div class="content__title">
                    <p>Добавить вакансию</p>
                </div>
                <div class="content__updateform">
                    <form action="" method="post" class="update__form">
                        <span>Название</span>
                        <input type="text" name="name" placeholder="название">
                        <span>Категория</span>
                        <select name="category" >
                            <option value="1">Специалисты</option>
                            <option value="2">Руководители</option>
                            <option value="3">Рабочие</option>
                        </select>
                        <span>Статус</span>
                        <select name="status" >
                            <option value="1">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <button href="" class="table__button">Добавить вакансию</button>
                    </form>
                </div>
            </div>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/admin_footer.php'; ?>