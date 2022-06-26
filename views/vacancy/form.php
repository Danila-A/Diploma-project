<!-- header -->
<?php include ROOT.'/views/layouts/header.php'; ?>

        <div class="content__form">
            <div class="form__inner">
                <form action="" class="sign__upinform" method="post" id="signUp" enctype="multipart/form-data">
                <div class="form__title">
                    <p class="subtitle__text">
                        Подача заявки на профессию: <?php echo $vacancyData['name_vacancy'] ?>
                    </p>
                </div>
                    <?php if ($result): ?>
						<p class="message">Заявка отправлена!</p>
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
                        <input type="text" class="form__imput" name="name" id="name" value="<?php echo $userData['name_user'] ?>">
                        <span id="nameError">Неправильный формат имени</span>

                        <p class="form__text">Email</p>
                        <input type="text" class="form__imput" name="email" id="email" value="<?php echo $userData['email_user'] ?>">
                        <span id="emailError">Неправильный формат email</span>

                        <p class="form__text">Телефон</p>
                        <input type="text" class="form__imput" name="phone" id="phone" value="<?php echo $userData['phone_user'] ?>">
                        <span id="phoneError">Неправильный формат телефона</span>

                        <p class="form__text">Резюме <br>(в PDF, doc, docx)</p>
                        <input type="file" class="form__imput" name="file" id="file">
                        <label for="file" class="file__view">
                            <span class="file__icon">
                                <img src="/template/img/svg/upload.svg" alt="">
                            </span>
                            <span class="file__text">Выберите файл</span>    
                        </label>
                        <span id="fileError">Неправильный формат документа</span>


                        <button class="form__button nav__button menu__button" name="submitvalue" type="submit">Отправить заявку</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>

<!-- footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>