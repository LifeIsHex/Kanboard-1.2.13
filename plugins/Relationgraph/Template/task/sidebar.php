<?php
    $routerController = $this->app->getRouterController();
    $routerPlugin = $this->app->getPluginName();

    $active = $routerController == 'Relationgraph' && $routerPlugin == 'Relationgraph';
?>
<li class="<?= $active ? 'active' : '' ?>">
    <i class="fa fa-rotate-left fa-fw"></i>
    <?= $this->url->link(
        t('Relation graph'), //new by mahdi hezaveh #
        'relationgraph',
        'show',
        ['plugin' => 'relationgraph', 'task_id' => $task['id']]
    ) ?>
</li>

