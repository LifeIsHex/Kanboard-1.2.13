<div class="page-header">
    <h2><?= t('Edit a comment') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('CommentController', 'update', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'comment_id' => $comment['id'])) ?>" autocomplete="off">
            <?= $this->form->csrf() ?>

            <?= $this->form->textEditor('comment', $values, $errors, array('autofocus' => true, 'required' => true)) ?>

            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>