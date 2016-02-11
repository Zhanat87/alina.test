<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAnchorScrollServiceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'anchor scroll service';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAnchorScrollServiceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        $anchorScroll сервис выполняет прокрутку документа до того элемента id,
        которого возвращается $location.hash() методом
    </pre>
    <div ng-controller="studyCtrl">
        <div class="panel panel-default">
            <h4 class="panel-heading">URL</h4>
            <div class="panel-body">
                <p id="top">This is the top</p>
                <button class="btn btn-primary" ng-click="show('bottom')">Go to bottom</button>
                <p>
                <ul>
                    <li ng-repeat="item in items">{{item}}</li>
                </ul>
                </p>
                <p id="bottom">This is the bottom</p>
                <button class="btn btn-primary" ng-click="show('top')">Go to TOP</button>
            </div>
        </div>
    </div>
</div>