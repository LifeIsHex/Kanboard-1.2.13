<div class="page-header">
    <h2><?= t('Edit user') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('UserModificationController', 'save', array('user_id' => $user['id'])) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>
            <?= $this->form->hidden('id', $values) ?>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Profile') ?></legend>
                    <?= $this->form->label(t('Username'), 'username') ?>
                    <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', isset($values['is_ldap_user']) && $values['is_ldap_user'] == 1 && !$this->user->isAdmin() ? 'readonly' : '', 'maxlength="191"')) ?>

                    <?= $this->form->label(t('Name'), 'name') ?>
                    <?= $this->form->text('name', $values, $errors, array($this->user->hasAccess('UserModificationController', 'show/edit_name') ? '' : 'readonly')) ?>

                    <?= $this->form->label(t('Email'), 'email') ?>
                    <?= $this->form->email('email', $values, $errors, array($this->user->hasAccess('UserModificationController', 'show/edit_email') ? '' : 'readonly')) ?>
                </div>
            </div>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Preferences') ?></legend>
                    <?= $this->form->label(t('Timezone'), 'timezone') ?>
                    <?= $this->form->select('timezone', $timezones, $values, $errors, array($this->user->hasAccess('UserModificationController', 'show/edit_timezone') ? '' : 'disabled')) ?>

                    <?= $this->form->label(t('Language'), 'language') ?>
                    <?= $this->form->select('language', $languages, $values, $errors, array($this->user->hasAccess('UserModificationController', 'show/edit_language') ? '' : 'disabled')) ?>

                    <?= $this->form->label(t('Filter'), 'filter') ?>
                    <?= $this->form->text('filter', $values, $errors, array($this->user->hasAccess('UserModificationController', 'show/edit_filter') ? '' : 'readonly')) ?>
                </div>
            </div>

            <?php if ($this->user->isAdmin()): ?>
            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Security') ?></legend>
                    <?= $this->form->label(t('Application role'), 'role') ?>
                    <?= $this->form->select('role', $roles, $values, $errors) ?>
                </div>
            </div>
            <?php endif ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>