<?php

use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthRule $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="auth-rule-form">
    <?php $form = ActiveForm::begin([
        'id' => 'auth-rule-form',
    ]); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'data')->textInput() ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>