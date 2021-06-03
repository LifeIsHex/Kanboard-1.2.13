<div class="page-header">
    <h2><?= t('Change reference currency') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('CurrencyController', 'update') ?>" autocomplete="off">
            <?= $this->form->csrf() ?>
            <?= $this->form->label(t('Reference currency'), 'application_currency') ?>
            <?= $this->form->select('application_currency', $currencies, $values, $errors) ?>
            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
