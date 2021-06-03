<div class="page-header">
    <h2><?= t('Invite people') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('UserInviteController', 'save') ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <?= $this->form->label(t('Emails'), 'emails') ?>
            <?= $this->form->textarea('emails', $values, $errors, array('required', 'autofocus')) ?>
            <p class="form-help"><?= t('Enter one email address by line.') ?></p>

            <?= $this->form->label(t('Add these people to this project'), 'project_id') ?>
            <?= $this->form->select('project_id', $projects, $values, $errors) ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>