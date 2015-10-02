<?php

use yii\widgets\ActiveForm;
use backend\widgets\OnOffSwitch;

/**
 * @var yii\web\View $this
 * @var backend\modules\news\models\News $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="news-form">
    <?php $form = ActiveForm::begin([
        'id' => 'news-form',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
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
    <?php
    echo OnOffSwitch::widget([
        'value' => $model->status,
        'className' => $model->className(),
    ]);
    ?>
    <?php ActiveForm::end(); ?>
</div>