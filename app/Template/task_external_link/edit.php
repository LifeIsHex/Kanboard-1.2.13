<div class="page-header">
    <h2><?= t('Edit external link') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form action="<?= $this->url->href('TaskExternalLinkController', 'update', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'link_id' => $link['id'])) ?>" method="post" autocomplete="off">
            <?= $this->render('task_external_link/form', array('task' => $task, 'dependencies' => $dependencies, 'values' => $values, 'errors' => $errors)) ?>
            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
