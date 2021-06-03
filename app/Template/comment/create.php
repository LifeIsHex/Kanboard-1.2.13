<div class="page-header">
    <h2><?= t('Add a comment') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('paper-plane', t('Send by email'), 'CommentMailController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
        </li>
    </ul>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('CommentController', 'save', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <?= $this->form->textEditor('comment', $values, $errors, array('autofocus' => true, 'required' => true)) ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
