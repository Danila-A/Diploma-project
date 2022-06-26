<!-- header -->
<?php include ROOT.'/views/layouts/admin_header.php'; ?>
    <div class="admin__content container">
            <div class="content__inner">
                <div class="content__header">
                    <nav class="content__nav">
                        <ul>
                            <li class="nav__btn" id="adminApplication" onclick="adminToDoActive('#adminApplication', showApplicationTable);">Управление заявками</li>
                            
                            <li class="nav__btn" id="amdinVacancy" onclick="adminToDoActive('#amdinVacancy', showVacancyTable);">Управление вакансиями</li>
                        </ul>
                    </nav>
                </div>
                <div class="content__tables">
                    <div class="tables__application">
                        
                    </div>
                    <div class="tables__vacancy">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/admin_footer.php'; ?>