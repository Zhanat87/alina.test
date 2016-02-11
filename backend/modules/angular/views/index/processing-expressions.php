<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularProcessingExpressionsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'processing expressions';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularProcessingExpressionsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        сервис $parse позволяет превращать angularjs выражения в функции,
        которые могут обрабатывать данные
    </pre>
    <div ng-controller="processingExpressionsCtrl">
        <div class="well">
            <p><input class="form-control" ng-model="expr" /></p>
            <div>
                Result: <span eval-expression="expr"></span>
            </div>
        </div>
    </div>
    <br />
    <pre>
        сервис $interpolate по своей работе очень похож на $parse основная разница
        состоит в том, что $interpolate работает со строками,
        которые содержат выражения angularjs
    </pre>
    <div ng-controller="processingExpressionsCtrl2">
        <div class="well">
            <p><input class="form-control" ng-model="dataValue" /></p>
            <div>
                <span eval-expression2 amount="dataValue" tax="10"></span>
            </div>
        </div>
    </div>
    <br />
    <div ng-controller="processingExpressionsCtrl3">
        <div class="well">
            <span eval-expression3></span>
        </div>
    </div>
</div>