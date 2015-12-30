<?php

use yii\widgets\ActiveForm;
use backend\widgets\OnOffSwitch;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\book\models\Book $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="book-form">
    <?php $form = ActiveForm::begin([
        'id' => 'book-form',
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'author_id')->dropDownList($authors, ['class' => 'select2 width100']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'publish_date')->textInput(['class' => 'form-control tbDatePicker']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'image')->fileInput() ?>
            <?php if ($model->image) : ?>
                <div class="imageDiv">
                    <?php
                    echo Html::img($model->getThumbUrl(), ['alt' => 'NO IMG']);
                    ?>
                    <a href="#" class="btn btn-danger removeImage"
                       data-toggle="tooltip"
                       title="удалить изображение"
                       id="<?php echo $model->id; ?>"
                       url="<?php echo Yii::$app->urlManager->createUrl('book/index/image-remove'); ?>">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </div>
                <div class="clearfix"></div>
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