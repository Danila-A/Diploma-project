<!-- header -->
<?php include ROOT.'/views/layouts/header.php'; ?>

        <div class="content__form">
            <div class="form__inner">
                <form action="" class="sign__upinform"  method="post">
                    <div class="form__title">
                        <p class="title__text">
                            авторизация
                        </p>
                    </div>
                    
                        <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php  foreach($errors as $error): ?>
                                        <li>
                                            <p class="error__message"> - <?php echo $error; ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
						<?php endif; ?>
                    <p class="form__text">Email</p>
                    <input type="text" class="form__imput" name="email">
                    <p class="form__text">Пароль</p>
                    <input type="password" class="form__imput" name="password">

                    <button class="form__button nav__button menu__button" name="submit">Войти</button>
                </form>
            </div>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>