<?php if ($this->app->isAjax()): ?>
    <div class="page-header">
        <h2><?= $this->text->e($project['name']) ?> &gt; <?= t('Edit project') ?></h2>
    </div>
<?php else: ?>
    <div class="page-header">
        <h2><?= t('Edit project') ?></h2>
    </div>
<?php endif ?>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('ProjectEditController', 'update', array('project_id' => $project['id'], 'redirect' => 'edit')) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('General') ?></legend>

                    <?= $this->form->label(t('Name'), 'name') ?>
                    <?= $this->form->text('name', $values, $errors, array('required', 'autofocus', 'tabindex="1"')) ?>

                    <?= $this->form->label(t('Email'), 'email') ?>
                    <?= $this->form->email('email', $values, $errors, array('tabindex="2"')) ?>
                    <p class="form-help"><?= t('The project email is optional and could be used by several plugins.') ?></p>

                    <?= $this->form->label(t('Identifier'), 'identifier') ?>
                    <?= $this->form->text('identifier', $values, $errors, array('maxlength="50"', 'tabindex="3"')) ?>
                    <p class="form-help"><?= t('The project identifier is optional and must be alphanumeric, example: MYPROJECT.') ?></p>

                    <?= $this->form->label(t('Description'), 'description') ?>
                    <?= $this->form->textEditor('description', $values, $errors, array('tabindex' => 4)) ?>
                </div>
            </div>


            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Permissions and ownership') ?></legend>

                    <?php if ($this->app->config('disable_private_project') != 1): ?>
                        <?php if ($this->user->hasProjectAccess('ProjectCreationController', 'create', $project['id'])): ?>
                            <?= $this->form->checkbox('is_private', t('Private project'), 1, $project['is_private'] == 1) ?>
                            <p class="form-help"><?= t('Private projects do not have users and groups management.') ?></p>
                        <?php endif ?>
                    <?php endif ?>

                    <div class="form-inline">
                        <?= $this->form->label(t('Project owner'), 'owner_id') ?>
                        <?= $this->form->select('owner_id', $owners, $values, $errors, array('tabindex="5"')) ?>
                    </div>
                </div>
            </div>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Dates') ?></legend>

                    <?= $this->form->date(t('Start date'), 'start_date', $values, $errors, array('tabindex="6"')) ?>
                    <?= $this->form->date(t('End date'), 'end_date', $values, $errors, array('tabindex="7"')) ?>
                </div>
            </div>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Priorities') ?></legend>

                    <?= $this->form->label(t('Default priority'), 'priority_default') ?>
                    <?= $this->form->number('priority_default', $values, $errors, array('tabindex="8"')) ?>

                    <?= $this->form->label(t('Lowest priority'), 'priority_start') ?>
                    <?= $this->form->number('priority_start', $values, $errors, array('tabindex="9"')) ?>

                    <?= $this->form->label(t('Highest priority'), 'priority_end') ?>
                    <?= $this->form->number('priority_end', $values, $errors, array('tabindex="10"')) ?>
                </div>
            </div>

            <?= $this->modal->submitButtons(array('tabindex' => 11)) ?>
        </form>
    </div>
</div>