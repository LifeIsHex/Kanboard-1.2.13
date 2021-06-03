<div class="page-header">
    <h2><?= t('New group') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('GroupCreationController', 'save') ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <?= $this->form->label(t('Name'), 'name') ?>
            <?= $this->form->text('name', $values, $errors, array('autofocus', 'required', 'maxlength="191"')) ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
