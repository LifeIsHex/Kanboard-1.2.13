<div class="form-login">

    <?= $this->hook->render('template:auth:login-form:before') ?>

    <?php if (isset($errors['login'])): ?>
        <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
    <?php endif ?>

    <?php if (! HIDE_LOGIN_FORM): ?>
    <div class="login-logo">  <!-- new by mahdi hezaveh # -->
        <h2>
            <span class="logo">
                <?php if ($this->app->jsLang() == 'fa'): ?>
                    <?= $this->url->link('صفحه <span>کارِ </span>من', 'AuthController', 'login', array(), false, '', t('Dashboard')) ?>
                <?php else: ?>
                    <?= $this->url->link('My<span>Task</span>Board', 'AuthController', 'login', array(), false, '', t('Dashboard')) ?>
                <?php endif ?>
            </span>
        </h2>
    </div>
    <div class="form-column"> <!-- new by mahdi hezaveh # -->
        <section class="login-reset">
            <form method="post" action="<?= $this->url->href('AuthController', 'check') ?>">
                <?= $this->form->csrf() ?>

                <?= $this->form->label(t('Username'), 'username') ?>
                <?= $this->form->text('username', $values, $errors, array('autofocus', 'required')) ?>

                <?= $this->form->label(t('Password'), 'password') ?>
                <?= $this->form->password('password', $values, $errors, array('required')) ?>

                <?php if (isset($captcha) && $captcha): ?>
                    <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                    <div class="margin-top image-center">
                        <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
                    </div>
                    <?= $this->form->text('captcha', array(), $errors, array('required')) ?>
                <?php endif ?>

                <?php if (REMEMBER_ME_AUTH): ?>
                    <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br>
                <?php endif ?>

                <div class="form-actions">
                    <button type="submit" class="btn btn-blue btn-max"><?= t('Sign in') ?></button>  <!-- new by mahdi hezaveh # -->
                </div>
                <?php if ($this->app->config('password_reset') == 1): ?>
                    <div class="reset-password ShabnamMedium" style="font-size: small"> <!-- new by mahdi hezaveh # -->
                        <?= $this->url->link(t('Forgot password?'), 'PasswordResetController', 'create') ?>
                    </div>
                <?php endif ?>
            </form>
        </section>
    </div>
    <?php endif ?>

    <?= $this->hook->render('template:auth:login-form:after') ?>
<!--    <footer class="footer navbar-fixed-bottom footer-light navbar-border">  new by mahdi hezaveh # -->
<!--        <p class="blue-grey lighten-2 ShabnamThin" style="font-size: small; padding-left: 10px; padding-right: 10px">-->
<!--            <span style="float: left">.Copyright  © 2020 <a href="http://mytaskboard.ir" target="_blank">mytaskboard</a>, All rights reserved</span>-->
<!--            <span class="blue-grey.lighten-2"> کليه حقوق اين سیستم متعلق به <a href="http://www.mytaskboard.ir" target="_blank"> mytaskboard</a> می&zwnj;باشد. (نسخه ۱,۰.۰)</span>-->
<!--        </p>-->
<!--    </footer>-->
</div>
