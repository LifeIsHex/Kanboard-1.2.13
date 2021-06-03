<div class="page-header">
    <h2><?= t('Notifications') ?></h2>
</div>
<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <form method="post" action="<?= $this->url->href('UserViewController', 'notifications', array('user_id' => $user['id'])) ?>" autocomplete="off">
            <div class="form-columns"> <!-- new by mahdi hezaveh # -->
                <div class="form-column">
                    <?= $this->form->csrf() ?>

                    <h4><?= t('Notification methods:') ?></h4>
                    <?= $this->form->checkboxes('notification_types', $types, $notifications) ?>

                    <hr>
                    <h4><?= t('I want to receive notifications for:') ?></h4>
                    <?= $this->form->radios('notifications_filter', $filters, $notifications) ?>

                    <hr>
                    <?php if (! empty($projects)): ?>
                        <h4><?= t('I want to receive notifications only for those projects:') ?></h4>
                        <?= $this->form->checkboxes('notification_projects', $projects, $notifications) ?>
                    <?php endif ?>
                </div>
            </div>
            <?= $this->modal->submitButtons() ?>
        </form>
    </div>
</div>
