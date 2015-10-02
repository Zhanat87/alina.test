<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthItem $model
 */
?>
<div class="auth-item-create">
    <?= $this->render('_form', [
        'model' => $model,
        'authRules' => $authRules,
        'types' => $types,
    ]) ?>
</div>