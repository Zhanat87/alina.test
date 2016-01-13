<?php
/**
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$this->title = 'Главная страница';
$js = <<< 'JS'
$('.breadcrumb, #nav-col').remove();
JS;
$this->registerjs($js);
?>
<div class="col-md-12">
    <div class="row">
        <?php echo Html::encode($this->title); ?>
    </div>
</div>