<div class="page-header">
    <h2><?= t('Webhook settings') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'webhook')) ?>" autocomplete="off">
            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <?= $this->form->csrf() ?>

                    <?= $this->form->label(t('Webhook URL'), 'webhook_url') ?>
                    <?= $this->form->text('webhook_url', $values, $errors) ?>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="page-header margin-top">
    <h2><?= t('Webhook token') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <div class="panel">
            <?= t('Webhook token:') ?>
            <strong><?= $this->text->e($values['webhook_token']) ?></strong>
        </div>

        <?= $this->url->link(t('Reset token'), 'ConfigController', 'token', array('type' => 'webhook'), true, 'btn btn-red') ?>
    </div>
</div>
