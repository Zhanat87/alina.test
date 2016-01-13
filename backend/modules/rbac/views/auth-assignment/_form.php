<?php

use yii\widgets\ActiveForm;
use backend\assets\Select2Asset;

/**
 * @var yii\web\View $this
 * @var backend\modules\rbac\models\AuthAssignment $model
 * @var yii\widgets\ActiveForm $form
 */
Select2Asset::register($this);
?>
<div class="auth-assignment-form">
    <?php $form = ActiveForm::begin([
        'id' => 'auth-assignment-form',
    ]); ?>
    <div class="row">
        <div class="col-md-6">    
            <?= $form->field($model, 'item_name')->dropDownList($authItems, ['class' => 'select2 width100']); ?>
        </div>
        <div class="col-md-6">      
            <?= $form->field($model, 'user_id')->dropDownList($users, ['class' => 'select2 width100']); ?>
         </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>