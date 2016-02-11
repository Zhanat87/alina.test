<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularHandlingExceptionsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'handling exceptions';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularHandlingExceptionsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        для обработки ошибок следует использовать $exceptionHandler сервис,
        он работает только с теми ошибками
        которые не обрабатываются (например в конструкции try catch)
    </pre>
    <div ng-controller="handlingExceptionsCtrl">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary" ng-click="throwEx()">Throw Exception</button>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="handlingExceptionsCtrl2">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary" ng-click="throwEx()">Throw Exception</button>
            </div>
        </div>
    </div>
</div>