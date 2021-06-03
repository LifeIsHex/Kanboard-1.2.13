<?php if (! empty($files)): ?>
    <table class="table-striped table-scrolling">
        <tr>
            <th><?= t('Filename') ?></th>
            <th class="column-15"><?= t('Size') ?></th>
            <th class="column-15"><?= t('Creator') ?></th>
            <th class="column-10"><?= t('Date') ?></th>
        </tr>
        <?php foreach ($files as $file): ?>
            <tr>
                <td>
                    <i class="fa <?= $this->file->icon($file['name']) ?> fa-fw"></i>
                    <div class="dropdown">
                        <a href="#" class="dropdown-menu dropdown-menu-link-text"><?= $this->text->e($file['name']) ?> <i class="fa fa-caret-down"></i></a>
                        <ul>
                            <?php if ($this->file->getPreviewType($file['name']) !== null): ?>
                                <li>
                                    <?= $this->modal->large('eye', t('View file'), 'FileViewerController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id'])) ?>
                                </li>
                            <?php elseif ($this->file->getBrowserViewType($file['name']) !== null): ?>
                                <li>
                                    <i class="fa fa-eye fa-fw"></i>
                                    <?= $this->url->link(t('View file'), 'FileViewerController', 'browser', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id']), false, '', '', true) ?>
                                </li>
                            <?php endif ?>
                            <li>
                                <?= $this->url->icon('download', t('Download'), 'FileViewerController', 'download', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id'])) ?>
                            </li>
                            <?php if ($this->user->hasProjectAccess('TaskFileController', 'remove', $task['project_id'])): ?>
                                <li>
                                    <?= $this->modal->confirm('trash-o', t('Remove'), 'TaskFileController', 'confirm', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id'])) ?>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </td>
                <td>
                    <?= $this->text->bytes($file['size']) ?>
                </td>
                <td>
                    <?= $this->text->e($file['user_name'] ?: $file['username']) ?>
                </td>
                <td>
                    <?= $this->dt->date($file['date']) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>
