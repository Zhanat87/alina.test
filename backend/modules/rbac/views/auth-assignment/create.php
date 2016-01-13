<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthAssignment $model
 */
?>
<div class="auth-assignment-create">
    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'authItems' => $authItems,
    ]) ?>
</div>