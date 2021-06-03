<div class="page-header">
    <h2><?= t('Gantt settings') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('ConfigController', 'save', array('plugin' => 'Gantt')) ?>" autocomplete="off">

            <?= $this->form->csrf() ?>

            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <legend><?= t('Gantt chart') ?></legend>
                    <?= $this->form->radios('gantt_task_sort', array(
                            'board' => t('Sort tasks by position'),
                            'date' => t('Sort tasks by date'),
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
