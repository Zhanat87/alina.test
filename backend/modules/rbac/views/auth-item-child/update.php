<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthItemChild $model
 */
?>
<div class="auth-item-child-update">
    <?= $this->render('_form', [
        'model' => $model,
        'authItems' => $authItems,
    ]) ?>
</div>