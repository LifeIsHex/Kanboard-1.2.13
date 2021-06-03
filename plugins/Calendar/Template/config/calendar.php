<div class="page-header">
    <h2><?= t('Calendar settings') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('ConfigController', 'save', array('plugin' => 'Calendar')) ?>" autocomplete="off">

            <?= $this->form->csrf() ?>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Project calendar view') ?></legend>
                    <?= $this->form->radios('calendar_project_tasks', array(
                        'date_creation' => t('Show tasks based on the creation date'),
                        'date_started' => t('Show tasks based on the start date'),
                    ),
                        $values
                    ) ?>
                </div>
            </div>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('User calendar view') ?></legend>
                    <?= $this->form->radios('calendar_user_tasks', array(
                        'date_creation' => t('Show tasks based on the creation date'),
                        'date_started' => t('Show tasks based on the start date'),
                    ),
                        $values
                    ) ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
            </div>
        </form>
    </div>
</div>
