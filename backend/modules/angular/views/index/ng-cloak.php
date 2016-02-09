<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularNgCloakAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-cloak';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularNgCloakAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        когда вы работаете со старыми браузерами, медленным интернетом или просто с большими приложениями,
        то ваш браузер будет отображать разметку как она есть (например привязки angular {{}})
        в то время пока angular ее компилирует, для того чтобы избежать этого существует два способа первый:
        использовать вместо выражений привязок {{}} директиву ng-bind,
        а второй использовать директиву ng-cloak
        директива ng-cloak применяет css для того чтобы спрятать элемент, а angularjs
        после того как обработала этот элемент удаляет css селектор
        и таким образом пользователь ни при каких условиях не увидит код angular
        есть два подхода к применению ng-cloak применить его к body но тогда пользователь
        ничего не увидит пока angular не обработает разметку
        второй просто применять эту директиву там где непосредственно используются привязки
    </pre>
    <div id="tasksPanel" class="panel" ng-controller="ngCloakCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="well">
            <div class="radio" ng-repeat="button in ['Default', 'Table', 'List']">
                <label ng-cloak>
                    <input type="radio" ng-model="data.mode" value="{{button}}" ng-checked="$first" />
                    {{button}}
                </label>
            </div>
        </div>
        <div ng-switch on="data.mode" ng-cloak>
            <div ng-switch-when="Table">
                <table class="table">
                    <thead>
                    <tr><th>#</th><th>Tasks</th><th>Done</th></tr>
                    </thead>
                    <tr ng-repeat="task in tasks" ng-class="$odd ? 'odd' : 'even'">
                        <td>{{$index + 1}}</td>
                        <td ng-repeat="property in task">{{property}}</td>
                    </tr>
                </table>
            </div>
            <div ng-switch-when="List">
                <ol>
                    <li ng-repeat="task in tasks">
                        {{task.action}}<span ng-if="task.complete"> (Done)</span>
                    </li>
                </ol>
            </div>
            <div ng-switch-default>
                Select another option to display a layout
            </div>
        </div>
    </div>
</div>