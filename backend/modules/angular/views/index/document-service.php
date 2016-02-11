<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularDocumentServiceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'document service';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularDocumentServiceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div ng-controller="documentServiceCtrl" class="well">
        <button class="btn btn-primary">Click me!</button>
    </div>
</div>