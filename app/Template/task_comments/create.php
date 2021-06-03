<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('CommentController', 'save', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>
            <?= $this->form->hidden('task_id', $values) ?>
            <?= $this->form->hidden('user_id', $values) ?>

            <?= $this->form->textEditor('comment', $values, $errors, array('required' => true)) ?>
            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
