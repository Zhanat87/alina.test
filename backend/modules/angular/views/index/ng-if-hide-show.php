<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularNgIfHideShowAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-if-hide-show';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularNgIfHideShowAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        директивы ng-show и ng-hide используются для управления видимостью элемента в зависимости от условия,
        добавляя или удаляя css класс. Этот класс применяет dispaly:none
        Основное различие между ng-show и ng-hide состоит в том, что ng-show прячет элемент
        когда выражение равно false, а ng-hide когда выражение равно true.
        ng-show(true) - отображает
        ng-show(false) - прячет
        ng-hide(true) - прячет
        ng-hide(false) - отображает
        директива ng-if применяется для отображения элемента в зависимости от условия,
        при этом эта директива удаляет или добавляет элементы DOM
        директивы ng-show, ng-hide и ng-if имеют проблемы когда их применяют для задания стилей таблицам
    </pre>
    <style>
        td > *:first-child {
            font-weight: bold;
            /*обратите внимание что этот стиль применяется только к элементам с надписью Incomplete,
            проблема состоит в том что ng-hide и ng-show оставляют в DOM элементы которые они прячут,
            пользователь не видит эти элементы но они видны браузеру и поэтому к ним применяется стиль
            в этой ситуации лучше удалять элементы с DOM  используя директиву ng-if*/
        }
    </style>
    <div id="tasksPanel" class="panel" ng-controller="ngIfHideShowCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="checkbox well">
            <label>
                <input type="checkbox" ng-model="tasks[3].complete" />
                Task 4 is complete
            </label>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Done</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tr ng-repeat="task in tasks">
                <td>{{$index + 1}}</td>
                <td ng-repeat="property in task">{{property}}</td>
                <td>
                    <span ng-hide="task.complete">(Incomplete)</span>
                    <span ng-show="task.complete">(Done)</span>
                </td>
            </tr>
        </table>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="ngIfHideShowCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="checkbox well">
            <label>
                <input type="checkbox" ng-model="tasks[3].complete" />
                Task 4 is complete
            </label>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Done</th>
                <th>Status</th>
            </tr>
            </thead>
            <tr ng-repeat="task in tasks">
                <td>{{$index + 1}}</td>
                <td ng-repeat="property in task">{{property}}</td>
                <td>
                    <span ng-if="!task.complete">(Incomplete)</span>
                    <span ng-if="task.complete">(Done)</span>
                </td>
            </tr>
        </table>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="ngIfHideShowCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="checkbox well">
            <label>
                <input type="checkbox" ng-model="tasks[3].complete" />
                Task 4 is complete
            </label>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Done</th>
                </tr>
            </thead>
            <tr style="background-color:beige" ng-repeat="task in tasks" ng-hide="task.complete">
                <!--AngularJS обработал директивы и так как элементы спрятаны,
                а не удалены, то результат - это неправльное применение стиля для выделения строк таблицы-->
                <td>{{$index + 1}}</td>
                <td>{{task.action}}</td>
                <td>{{task.complete}}</td>
            </tr>
            <tr style ="background-color:#baf8f8" ng-repeat="task in tasks" ng-if="!task.complete">
                <!--когда мы используем директиву ng-if то элементы удаляются с DOM,
                то в этом случае стили отображаются корректно-->
                <td>{{$index + 1}}</td>
                <td>{{task.action}}</td>
                <td>{{task.complete}}</td>
            </tr>
        </table>
    </div>
</div>