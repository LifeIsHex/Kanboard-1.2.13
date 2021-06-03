<div class="page-header">
    <h2><?= t('Remove a tag') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to remove this tag: "%s"?', $tag['name']) ?>
    </p>

    <?= $this->modal->confirmButtons(
        'ProjectTagController',
        'remove',
        array('tag_id' => $tag['id'], 'project_id' => $project['id'])
    ) ?>
</div>
