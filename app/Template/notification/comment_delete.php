<html>
<body>
<h2><?= $this->text->e($task['title']) ?> (#<?= $task['id'] ?>)</h2>

<h3><?= t('Comment removed') ?></h3>

<?= $this->text->markdown($comment['comment'], true) ?>

<?= $this->render('notification/footer', array('task' => $task)) ?>
</body>
</html>