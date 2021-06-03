<div class="page-header">
    <h2><?= t('Application settings') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'application')) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                <?= $this->form->label(t('Application URL'), 'application_url') ?>
                <?= $this->form->text('application_url', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
                <p class="form-help"><?= t('Example: https://example.kanboard.org/ (used to generate absolute URLs)') ?></p>

                <?= $this->form->label(t('Language'), 'application_language') ?>
                <?= $this->form->select('application_language', $languages, $values, $errors) ?>

                <?= $this->form->checkbox('password_reset', t('Enable "Forget Password"'), 1, $values['password_reset'] == 1) ?>
                </div>
            </div>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                <?= $this->form->label(t('Timezone'), 'application_timezone') ?>
                <?= $this->form->select('application_timezone', $timezones, $values, $errors) ?>

                <?= $this->form->label(t('Date format'), 'application_date_format') ?>
                <?= $this->form->select('application_date_format', $date_formats, $values, $errors) ?>
                <p class="form-help"><?= t('ISO format is always accepted, example: "%s" and "%s"', date('Y-m-d'), date('Y_m_d')) ?></p>

                <?= $this->form->label(t('Time format'), 'application_time_format') ?>
                <?= $this->form->select('application_time_format', $time_formats, $values, $errors) ?>
                </div>
            </div>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                <?= $this->form->label(t('Custom Stylesheet'), 'application_stylesheet') ?>
                <?= $this->form->textarea('application_stylesheet', $values, $errors) ?>
                </div>
            </div>

            <?= $this->hook->render('template:config:application', array('values' => $values, 'errors' => $errors)) ?>

            <div class="form-actions">
                <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
            </div>
        </form>
    </div>
</div>