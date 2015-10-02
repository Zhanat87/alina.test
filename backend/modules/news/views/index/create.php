<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\news\models\News $model
 */
?>
<div class="news-create">
    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>
</div>