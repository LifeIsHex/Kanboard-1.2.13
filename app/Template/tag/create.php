<div class="page-header">
    <h2><?= t('Add new tag') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('TagController', 'save') ?>" autocomplete="off">
            <?= $this->form->csrf() ?>
            <?= $this->form->hidden('project_id', $values) ?>

            <?= $this->form->label(t('Name'), 'name') ?>
            <?= $this->form->text('name', $values, $errors, array('autofocus', 'required', 'maxlength="191"')) ?>

            <?= $this->form->label(t('Color'), 'color_id') ?>
            <?= $this->form->select('color_id', array('' => t('No color')) + $colors, $values, $errors, array(), 'color-picker') ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
