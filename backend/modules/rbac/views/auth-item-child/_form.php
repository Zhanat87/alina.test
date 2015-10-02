<?php

use yii\widgets\ActiveForm;
use backend\assets\Select2Asset;

/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthItemChild $model
 * @var yii\widgets\ActiveForm $form
 */
Select2Asset::register($this);
?>
<div class="auth-item-child-form">
    <?php $form = ActiveForm::begin([
        'id' => 'auth-item-child-form',
    ]); ?>
    <div class="row">
        <div class="col-md-6">    
            <?= $form->field($model, 'parent')->dropDownList($authItems, ['class' => 'select2 width100']); ?>
        </div>
        <div class="col-md-6">    
            <?= $form->field($model, 'child')->dropDownList($authItems, ['class' => 'select2 width100']); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>