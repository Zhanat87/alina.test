<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\book\models\Book $model
 */
?>
<div class="book-update">
    <?= $this->render('_form', [
        'model' => $model,
        'authors' => $authors,
    ]) ?>
</div>