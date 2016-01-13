<?php

use yii\widgets\ActiveForm;
use backend\assets\Select2Asset;

/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthItem $model
 * @var yii\widgets\ActiveForm $form
 */
Select2Asset::register($this);
?>
<div class="auth-item-form">
    <?php $form = ActiveForm::begin([
        'id' => 'auth-item-form',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type')->dropDownList($types, ['class' => 'select2 width100']); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'rule_name')->dropDownList($authRules, ['class' => 'select2 width100']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'data')->textarea(['rows' => 6]); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>