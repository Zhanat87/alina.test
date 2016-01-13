<?php

use yii\widgets\ActiveForm;
use backend\assets\Select2Asset;
use backend\widgets\OnOffSwitch;
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
    <?php $form = ActiveForm::begin([
        'id' => 'user-form',
    ]); ?>
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
            <div class="hide">
                <?php
                $model->status = $model->isNewRecord ? 1 : $model->status;
                echo $form->field($model, 'status')->hiddenInput()->label('');
                ?>
            </div>
            <p>
                <b>
                    <?php echo $model->getAttributeLabel('status'); ?>:
                </b>
            </p>
            <?php if ($adminClass == 'hide') : ?>
                <p>
                    <?php echo $statuses[$model->status]; ?>
                </p>
            <?php else : ?>
                <?php
                echo OnOffSwitch::widget([
                    'value' => $model->status,
                    'className' => $model->className(),
                ]);
                ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <?php if ($model->created_at) : ?>
            <div class="col-md-4">
                <p>
                    <b>
                        <?php echo $model->getAttributeLabel('created_at'); ?>:
                    </b>
                </p>
                <p>
                    <?php echo $model->created_at; ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if ($model->updated_at) : ?>
            <div class="col-md-4">
                <p>
                    <b>
                        <?php echo $model->getAttributeLabel('updated_at'); ?>:
                    </b>
                </p>
                <p>
                    <?php echo $model->updated_at; ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>