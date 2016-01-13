<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\Select2Asset;
use backend\widgets\CancelBtn;
use backend\assets\UserAsset;

/**
 * @var yii\web\View $this
 * @var backend\modules\user\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
Select2Asset::register($this);
UserAsset::register($this);
$adminClass = Yii::$app->access->isAdmin() ? 'select2 width100' : 'hide';
?>
<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 64, 'data-indicator' => 'pwindicator']) ?>
            <div class="pwdindicator" id="pwindicator">
                <div class="bar"></div>
                <div class="pwdstrength-label"></div>
            </div>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'role')->dropDownList($roles, ['class' => $adminClass]); ?>
        </div>
        <?php if ($adminClass == 'hide' && isset($statuses[$model->status])) : ?>
            <p>
                <?php echo $model->role; ?>
            </p>
        <?php endif; ?>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList($statuses, ['class' => $adminClass]); ?>
        </div>
        <?php if ($adminClass == 'hide') : ?>
            <p>
                <?php echo $statuses[$model->status]; ?>
            </p>
        <?php endif; ?>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="pull-right">  
                    <?php
                    echo Html::submitButton('Сохранить',
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
                    echo CancelBtn::widget(
                        [
                            'url' => Yii::$app->access->isAdmin() ? '/user/user/index' : '/user/deny/index',
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>