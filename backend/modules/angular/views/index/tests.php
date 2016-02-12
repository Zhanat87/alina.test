<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularTestsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'tests';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularTestsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div class="panel panel-default" ng-controller="testsCtrl">
        <div class="panel-body">
            <p>Counter: {{counter}}</p>
            <p>
                <button class="btn btn-primary"
                        ng-click="incrementCounter()">
                    Increment
                </button>
            </p>
        </div>
    </div>
</div>