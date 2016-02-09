<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularBindingAsset;

/**
 * @var yii\web\View $this
 */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularBindingAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>

    </pre>

</div>