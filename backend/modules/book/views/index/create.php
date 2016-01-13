<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\book\models\Book $model
 */
?>
<div class="book-create">
    <?= $this->renderAjax('_form', [
        'model' => $model,
        'authors' => $authors,
    ]) ?>
</div>