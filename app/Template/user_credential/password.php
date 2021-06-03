<div class="page-header">
    <h2><?= t('Password modification') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('UserCredentialController', 'savePassword', array('user_id' => $user['id'])) ?>" autocomplete="off">
            <?= $this->form->hidden('id', $values) ?>
            <?= $this->form->csrf() ?>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <?= $this->form->label(t('Current password for the user "%s"', $this->user->getFullname()), 'current_password') ?>
                    <?= $this->form->password('current_password', $values, $errors, array('autofocus')) ?>

                    <?= $this->form->label(t('New password for the user "%s"', $this->user->getFullname($user)), 'password') ?>
                    <?= $this->form->password('password', $values, $errors) ?>

                    <?= $this->form->label(t('Confirmation'), 'confirmation') ?>
                    <?= $this->form->password('confirmation', $values, $errors) ?>
                </div>
            </div>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>