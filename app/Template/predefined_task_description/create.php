<div class="page-header">
    <h2><?= t('Predefined Task Description') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('PredefinedTaskDescriptionController', 'save', array('project_id' => $project['id'])) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <?= $this->form->label(t('Title'), 'title') ?>
            <?= $this->form->text('title', $values, $errors, array('autofocus', 'required', 'tabindex="1"')) ?>

            <?= $this->form->label(t('Description'), 'description') ?>
            <?= $this->form->textEditor('description', $values, $errors, array('tabindex' => 2)) ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
