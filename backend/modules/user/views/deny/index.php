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
        <?php echo Html::img('@web/images/Golden-fox-in-the-winter-snow_1440x900.jpg'); ?>
    </div>
</div>