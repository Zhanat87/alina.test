<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularLogServiceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'log service';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularLogServiceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div ng-controller="logServiceCtrl" class="well">
        <button class="btn btn-primary" ng-click="log()">LOG!</button>
    </div>
</div>