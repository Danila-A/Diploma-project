<!-- header -->
<?php include ROOT.'/views/layouts/header.php'; ?>

        <div class="content__form">
            <div class="form__inner" data-open="false">
                <form action="" class="sign__upinform" method="post" id="signUp">
                    <div class="form__title">
                        <p class="title__text">
                            регистрация
                        </p>
                    </div>
                    <?php if ($result): ?>
						<p class="message">Вы зарегистрированы!</p>
					<?php else: ?>
						<?php if (isset($errors) && is_array($errors)): ?>
							<ul>
								<?php  foreach($errors as $error): ?>
									<li>
									    <span class="error">- <?php echo $error; ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
					    <?php endif; ?>
                    
                        <p class="form__text">Имя (На русском)</p>
                        <input type="text" class="form__imput" name="name" id="name">
                        <span id="nameError">Неправильный формат имени</span>

                        <p class="form__text">Email</p>
                        <input type="text" class="form__imput" name="email" id="email">
                        <span id="emailError">Неправильный формат email</span>

                        <p class="form__text">Телефон</p>
                        <input type="text" class="form__imput" name="phone" id="phone">
                        <span id="phoneError">Неправильный формат телефона</span>

                        <p class="form__text">Пароль <br>(Не менее 3-х символов)</p>
                        <input type="password" class="form__imput" name="password" id="password">
                        <span id="passwordError">Неправильный формат пароля</span>

                        <p class="form__text">Повтор пароля</p>
                        <input type="password" class="form__imput" name="repeatPassword" id="secondPassword">
                        <span id="secondPasswordError">Пароли должны совподать</span>

                        <button class="form__button nav__button menu__button" name="submit_value" type="submit">Зарегистироваться</button>
                    <?php endif; ?>	
                </form>
            </div>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>