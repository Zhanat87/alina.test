<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\user\models\User $model
 */
?>
<div class="user-create">
    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
    ]) ?>
</div>