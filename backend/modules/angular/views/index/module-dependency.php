<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularModuleDependencyAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'module dependency';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularModuleDependencyAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        файл с модулем, от которого зависит модуль studyModule следует
        поключить до создания этого модуля, иначе будет ошибка
    </pre>
    <div ng-controller="studyCtrl">
        <div class="well">
            <div class="btn-group" tri-button counter="data.totalClicks" source="data.cities">
                <button class="btn btn-default" ng-repeat="city in data.cities">
                    {{city}}
                </button>
            </div>
            <h5>Total clicks: {{data.totalClicks}}</h5>
        </div>
    </div>
</div>