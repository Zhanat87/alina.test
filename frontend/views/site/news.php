<?php

/** @var \backend\modules\news\models\News $news */
/** @var View $this */
/** @var yii\widgets\ActiveForm $form */

use yii\helpers\Html;
use yii\web\View;
use frontend\assets\NewsAsset;
use yii\widgets\ActiveForm;

NewsAsset::register($this);
?>
<h1>
    <?php echo Html::encode($news->title); ?>
</h1>
<p>
    <?php echo $news->text; ?>
    <br/>
    Дата создания:
    <?php echo $news->created_at; ?>
</p>
<?php if ($news->comments) : ?>
    <?php foreach ($news->comments as $comment) : ?>
        <p>
            <?php echo $comment->email; ?>
            <br/>
            <?php echo $comment->text; ?>
        </p>
    <?php endforeach; ?>
<?php endif; ?>
<?php
$form = ActiveForm::begin([
    'id' => 'comment-form',
]);
echo $form->field($comment, 'news_id')->hiddenInput(['value' => $news->id])->label(false);
?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($comment, 'email')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <?= $form->field($comment, 'text')->textarea(['maxlength' => true]) ?>
    </div>
</div>
<?php
echo Html::submitButton('Комментировать', ['class' => 'btn btn-success']);
?>
<?php ActiveForm::end(); ?>
