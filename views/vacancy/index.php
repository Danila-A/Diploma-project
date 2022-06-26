<!-- header -->
<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="content">
            <section class="vacancy__content container">
                <div class="vacancy__inner">
                    <div class="vacancy__category">
                        <div class="category__inner">
                            <div class="category__choice">
                                <p>Выбрать категорию</p>
                                <img src="/template/img/svg/arrow.svg" alt="" class="arrow__icon">
                            </div>
                            <div class="category__conteiner">
                                <ul class="category__list">
                                    <li>
                                        <p class="active" onclick="toDoActive('#all', allVacancy);" id="all">
                                            Все
                                        </p>
                                    </li>
                                    <li>
                                        <p onclick="toDoActive('#spetz', getVacacysById, 1);" id="spetz">
                                            Специалисты
                                        </p>
                                    </li>
                                    <li>
                                        <p onclick="toDoActive('#managers', getVacacysById, 2);" id="managers">
                                            Руководители
                                        </p>
                                    </li>
                                    <li>
                                        <p onclick="toDoActive('#worker', getVacacysById, 3);" id="worker">
                                            Рабочие
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="vacancy__list">
                        <div class="list__inner">

                            
                            

                        </div>
                    </div>
                </div>
            </section>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>