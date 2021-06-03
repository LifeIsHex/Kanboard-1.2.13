<h1>
    <span class="logo">
        <?php if ($this->app->jsLang() == 'fa'): ?> <!-- new by mahdi hezaveh # -->
            <?= $this->url->link('صفحه <span>کارِ </span>من', 'DashboardController', 'show', array(), false, '', t('Dashboard')) ?>
        <?php else: ?>
            <?= $this->url->link('My<span>Task</span>Board', 'DashboardController', 'show', array(), false, '', t('Dashboard')) ?>
        <?php endif ?>
    </span>
    <span class="title ShabnamThin"> <!-- new by mahdi hezaveh # -->
        <?php if (! empty($project) && ! empty($task)): ?>
            <?= $this->url->link($this->text->e($project['name']), 'BoardViewController', 'show', array('project_id' => $project['id'])) ?>
        <?php else: ?>
            <?= $this->text->e($title) ?>
        <?php endif ?>
    </span>
    <?php if (! empty($description)): ?>
        <?= $this->app->tooltipHTML($description) ?>
    <?php endif ?>
</h1>
