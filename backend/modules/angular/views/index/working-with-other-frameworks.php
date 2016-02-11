<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularWorkingWithOtherFrameworksAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'working with other frameworks';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularWorkingWithOtherFrameworksAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        для взаимодействия с другимим фреймворками в AngularJS предусмотрены несколько методов,
        которые позволяют добавлять данные в scope из других фреймворков,
        а так же создавать функции обработчики для ответа на изменения в scope
        $apply(expression) - применяет изменения к scope
        $watch(expression, handler) - регистрирует обрабочик,
        который будет срабатывать при изменении выражения expression
        $watchCollection(object, handler) - регистрирует обработчик,
        который будет реагировать когда хоть какое-то свойство из коллекции свойств изменится
    </pre>
    <div class="col-xs-6">
        <div id="angularRegion" class="panel panel-success" ng-controller="workingWithOtherFrameworksCtrl">
            <div class="panel-heading"><h4>AngularJS</h4></div>
            <div class="panel-body">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" ng-model="buttonEnabled" />
                        Enable button
                    </label>
                </div>
                Click counter: {{clickCounter}}
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div id="jQueryUI" class="panel panel-primary">
            <div class="panel-heading">
                <h4>jQuery UI</h4>
            </div>
            <div class="panel-body">
                <button class="btn btn-primary">
                    <h4>Click me!</h4>
                </button>
            </div>
        </div>
    </div>
</div>