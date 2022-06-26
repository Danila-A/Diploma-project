<!-- header -->
<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="content">
            <section class="user__content container">
                <div class="user__inner">
                    <div class="user__title">
                        <p class="title__text">
                            Здравствуйте: <?php echo $user['name_user']; ?>
                        </p>
                    </div>
                    <hr>
                    <div class="user__data">
                        <div class="data__inner">
                            <div class="data__title">
                                <p class="subtitle__text">
                                    Ваши данные:
                                </p>
                            </div>
                            <div class="data__conteiner">
                                <div class="conteiner__table">
                                    <table class="table">
                                        <tr>
                                            <td>Имя</td>
                                            <td>
                                                <span id="user__name"><?php echo $user['name_user']; ?></span>
                                                <img src="/template/img/svg/rewrite.svg" id="update__icon__name"  
                                                onclick="updateUserData('#user__name','#update__icon__name', '#no__icon__name', '#ok__icon__name');">

                                                
                                                <img src="/template/img/svg/no.svg" id="no__icon__name" 
                                                onclick="closeInput('#user__name','#update__icon__name', '#no__icon__name', '#ok__icon__name');">
                                                
                                                
                                                <img src="/template/img/svg/ok.svg" id="ok__icon__name"
                                                 onclick="saveUpdate('#user__name','#update__icon__name', '#no__icon__name', '#ok__icon__name', 
                                                 '#input__user__name', checkName);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Телефон</td>
                                            <td>
                                                <span id="user__phone"><?php echo $user['phone_user']; ?></span>
                                                <img src="/template/img/svg/rewrite.svg" id="update__icon__phone"  
                                                onclick="updateUserData('#user__phone','#update__icon__phone', '#no__icon__phone', '#ok__icon__phone');">

                                                
                                                <img src="/template/img/svg/no.svg" id="no__icon__phone" 
                                                onclick="closeInput('#user__phone','#update__icon__phone', '#no__icon__phone', '#ok__icon__phone');">
                                                
                                                
                                                <img src="/template/img/svg/ok.svg" id="ok__icon__phone" 
                                                onclick="saveUpdate('#user__phone','#update__icon__phone', '#no__icon__phone', '#ok__icon__phone', 
                                                '#input__user__phone', checkPhone);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <span id="user__email"><?php echo $user['email_user']; ?></span>
                                                <img src="/template/img/svg/rewrite.svg" id="update__icon__email"  
                                                onclick="updateUserData('#user__email','#update__icon__email', '#no__icon__email', '#ok__icon__email');">

                                                
                                                <img src="/template/img/svg/no.svg" id="no__icon__email" 
                                                onclick="closeInput('#user__email','#update__icon__email', '#no__icon__email', '#ok__icon__email');">
                                                
                                                
                                                <img src="/template/img/svg/ok.svg" id="ok__icon__email" 
                                                onclick="saveUpdate('#user__email','#update__icon__email', '#no__icon__email', '#ok__icon__email',
                                                 '#input__user__email', checkEmail);">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="user__vacancy">
                        <div class="vacancy__inner">
                            <div class="vacancy__title">
                                <p class="subtitle__text ">
                                    Ваша заявки:
                                </p>
                            </div>
                            <div class="vacancy__conteiner">
                                <div class="conteiner__vacancys">
                                    <?php if($apps): ?>
                                        <? foreach($apps as $applicaion): ?>
                                            <div class="vacancys__item">
                                                
                                                <div class="item__title">
                                                    <p class="subtitle__text title__vacancy">
                                                        <?php echo $applicaion['name_vacancy']; ?>
                                                    </p>
                                                </div>
                                                <div class="item__date">
                                                    <p class="subtitle__text date__text">
                                                        Дата подачи: <?php echo $applicaion['date_application']; ?>
                                                    </p>
                                                </div>
                                                <div class="item__status">
                                                    <p class="subtitle__text status__text">
                                                        Статус: <?php echo Application::getStatusText($applicaion['status_app']); ?>
                                                    </p>
                                                </div>
                                                <div class="item__button">
                                                    <a href="/cabinet/delete/<?php echo $applicaion['id_appclication']; ?>" class="button__text">
                                                        Удалить
                                                    </a>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    <?php else: ?>
                                        <div class="vacancys__empty">
                                            <p class="subtitle__text">
                                                Пусто
                                            </p>
                                        </div>
                                    <?php endif; ?>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>