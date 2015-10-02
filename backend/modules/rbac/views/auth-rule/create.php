<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthRule $model
 */
?>
<div class="auth-rule-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>