<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularControllerInheritanceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'controller-inheritance';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularControllerInheritanceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Для избегания дублирования кода в AngularJS существует такая техника как наследование контроллеров.
        Достигается это предельно просто, к родительскому элементу разметки применяется базовый контроллер,
        а к дочерним элементам - контроллеры-наследники, которые могут использовать функционал базового контроллера
    </pre>
    <p>
        каждый из представленных контроллеров обладает своим scope,
        но в этих scope так же есть и унаследованные данные и поведение от родительского scope
    </p>
    <div ng-controller="parentCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Parent controller</h4>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" ng-click="reverseText()">Reverse</button>
                        <button class="btn btn-default" type="button" ng-click="changeCase()">Case</button>
                    </span>
                    <input class="form-control" ng-model="value" />
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading" ng-controller="firstChildCtrl">
                <h4>First child ctrl</h4>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" ng-click="reverseText()">Reverse</button>
                        <button class="btn btn-default" type="button" ng-click="changeCase()">Case</button>
                    </span>
                    <input class="form-control" ng-model="value" />
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" ng-controller="secondChildCtrl">
                <h4>Second child ctrl</h4>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" ng-click="reverseText()">Reverse</button>
                        <button class="btn btn-default" type="button" ng-click="changeCase()">Case</button>
                        <button class="btn btn-default" type="button" ng-click="shiftFour()">Shift</button>
                    </span>
                    <input class="form-control" ng-model="value" />
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <p>
        в предыдущем примере была обнаружена ошибка, когда пользователь вводил значение
        в один из контролов и потом нажимал на кнопку Reverse, то
        на измененные данные работа метода не распространялась
    </p>
    <p>
        Для того, чтобы быть уверенными, что вы работаете с одним и тем же свойством
        когда используетет ng-model, создавайте свойство в объекте,
        если же вы хотите, чтобы при изменении текущего свойства создавалось новое,
        то определяйте свойство непосредственно в scope
    </p>
    <div ng-controller="parentCtrl2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Parent controller</h4>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" ng-click="reverseText()">Reverse</button>
                        <button class="btn btn-default" type="button" ng-click="changeCase()">Case</button>
                    </span>
                    <input class="form-control" ng-model="dataObject.value" />
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading" ng-controller="firstChildCtrl2">
                <h4>First child ctrl</h4>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" ng-click="reverseText()">Reverse</button>
                        <button class="btn btn-default" type="button" ng-click="changeCase()">Case</button>
                    </span>
                    <input class="form-control" ng-model="dataObject.value" />
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" ng-controller="secondChildCtrl2">
                <h4>Second child ctrl</h4>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" ng-click="reverseText()">Reverse</button>
                        <button class="btn btn-default" type="button" ng-click="changeCase()">Case</button>
                        <button class="btn btn-default" type="button" ng-click="shiftFour()">Shift</button>
                    </span>
                    <input class="form-control" ng-model="dataObject.value" />
                </div>
            </div>
        </div>
    </div>
</div>