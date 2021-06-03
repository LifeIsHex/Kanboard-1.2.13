<div class="form-login">
    <h2><?= t('Password Reset') ?></h2>
    <div class="form-column"> <!-- new by mahdi hezaveh # -->
        <section class="login-reset">
            <form method="post" action="<?= $this->url->href('PasswordResetController', 'save') ?>">
                <?= $this->form->csrf() ?>

                <?= $this->form->label(t('Username'), 'username') ?>
                <?= $this->form->text('username', $values, $errors, array('autofocus', 'required')) ?>
                <p class="form-help"><?= t('Your profile must have a valid email address.') ?></p>

                <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                <div class="margin-top image-center">
                    <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
                </div>
                <?= $this->form->text('captcha', array(), $errors, array('required')) ?>

                <div class="form-actions"> <!-- new by mahdi hezaveh # -->
                    <button type="submit" class="btn btn-blue btn-max"><?= t('Change Password') ?></button>
                </div>

                <?php if ($this->app->jsLang() == 'fa'): ?> <!-- new by mahdi hezaveh # -->
                    <div class="reset-password ShabnamMedium" style="font-size: small">
                        <?= $this->url->link('بازگشت', 'AuthController', 'login') ?>
                    </div>
                <?php else: ?>
                    <div class="reset-password ShabnamMedium" style="font-size: small">
                        <?= $this->url->link(t('Back To Login Page'), 'AuthController', 'login') ?>
                    </div>
                <?php endif ?>
            </form>
        </section>
    </div>
</div>
<!--<footer class="footer navbar-fixed-bottom footer-light navbar-border">  new by mahdi hezaveh # -->
<!--    <p class="blue-grey lighten-2 ShabnamThin" style="font-size: small; padding-left: 10px; padding-right: 10px">-->
<!--        <span style="float: left">.Copyright  © 2020 <a href="http://mytaskboard.ir" target="_blank">mytaskboard</a>, All rights reserved</span>-->
<!--        <span class="blue-grey.lighten-2"> کليه حقوق اين سیستم متعلق به <a href="http://www.mytaskboard.ir" target="_blank"> mytaskboard</a> می&zwnj;باشد. (نسخه ۱,۰.۰)</span>-->
<!--    </p>-->
<!--</footer>-->