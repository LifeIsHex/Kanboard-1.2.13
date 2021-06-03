<div class="filter-box margin-bottom">
    <div class="form-columns"> <!-- new by mahdi hezaveh # -->
        <div class="form-column" style="width: 100% !important;">
            <form method="get" action="<?= $this->url->dir() ?>" class="search">
                <?= $this->form->hidden('controller', array('controller' => 'SearchController')) ?>
                <?= $this->form->hidden('action', array('action' => 'index')) ?>

                <div class="input-addon">
                    <?= $this->form->text('search', array(), array(), array('placeholder="'.t('Search').'"'), 'input-addon-field') ?>
                    <div class="input-addon-item">
                        <?= $this->render('app/filters_helper') ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (! $project_paginator->isEmpty()): ?>
    <div class="table-list">
        <?= $this->render('project_list/header', array('paginator' => $project_paginator)) ?>
        <?php foreach ($project_paginator->getCollection() as $project): ?>
            <div class="table-list-row table-border-left">
                <div>
                    <?php
                          $file = $this->task->projectCoverimageModel->getCoverimage($project['id']);
                          if(isset($file)) {
                              if ($file['size'] <= 2560) { /*new by mahdi hezaveh # */
                                  ?>
                                  <span class="avatar avatar-inline">
                              <!--<img src="<?//= $this->url->href('FileViewerController', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $project['id'])) ?>"-->
                                   <!--title="<?//= $this->text->e($file['name']) ?>"-->
                                   <!--alt="<?//= $this->text->e($file['name']) ?>" vspace="5" hspace="3" height="25">-->
                                      <img src="<?= $this->url->href('FileViewerController', 'image', array('file_id' => $file['id'], 'project_id' => $project['id'])) ?>"
                                           alt="<?= $this->text->e($file['name']) ?>" width="20px" height="20px">
                                  </span>
                                  <?php
                              }
                          }
                    ?>
                    <?php if ($this->user->hasProjectAccess('ProjectViewController', 'show', $project['id'])): ?>
                        <?= $this->render('project/dropdown', array('project' => $project)) ?>
                    <?php else: ?>
                        <strong><?= '#'.$project['id'] ?></strong>
                    <?php endif ?>
                    
                    <span class="table-list-title <?= $project['is_active'] == 0 ? 'status-closed' : '' ?>">
                        <?= $this->url->link($this->text->e($project['name']), 'BoardViewController', 'show', array('project_id' => $project['id'])) ?>
                    </span>

                    <?php if ($project['is_private']): ?>
                        <i class="fa fa-lock fa-fw" title="<?= t('Private project') ?>"></i>
                    <?php endif ?>
                </div>
                <div class="table-list-details">
                    <?php foreach ($project['columns'] as $column): ?>
                        <strong title="<?= t('Task count') ?>"><?= $column['nb_open_tasks'] ?></strong>
                        <small><?= $this->text->e($column['title']) ?></small>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <?= $project_paginator ?>
<?php endif ?>

<?php if (empty($overview_paginator)): ?>
    <p class="alert"><?= t('There is nothing assigned to you.') ?></p>
<?php else: ?>
    <?php foreach ($overview_paginator as $result): ?>
        <?php if (! $result['paginator']->isEmpty()): ?>
            <div class="page-header">
                <h2 id="project-tasks-<?= $result['project_id'] ?>"><?= $this->url->link($this->text->e($result['project_name']), 'BoardViewController', 'show', array('project_id' => $result['project_id'])) ?></h2>
            </div>

            <div class="table-list">
                <?= $this->render('task_list/header', array(
                    'paginator' => $result['paginator'],
                )) ?>

                <?php foreach ($result['paginator']->getCollection() as $task): ?>
                    <div class="table-list-row color-<?= $task['color_id'] ?>">
                        <?= $this->render('task_list/task_title', array(
                            'task' => $task,
                            'redirect' => 'dashboard',
                        )) ?>

                        <?= $this->render('task_list/task_details', array(
                            'task' => $task,
                        )) ?>

                        <?= $this->render('task_list/task_avatars', array(
                            'task' => $task,
                        )) ?>

                        <?= $this->render('task_list/task_icons', array(
                            'task' => $task,
                        )) ?>

                        <?= $this->render('task_list/task_subtasks', array(
                            'task'    => $task,
                            'user_id' => $user['id'],
                        )) ?>

                        <?= $this->hook->render('template:dashboard:task:footer', array('task' => $task)) ?>
                    </div>
                <?php endforeach ?>
            </div>

            <?= $result['paginator'] ?>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>

<?= $this->hook->render('template:dashboard:show', array('user' => $user)) ?>
