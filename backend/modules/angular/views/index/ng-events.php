<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularNgEventsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-events';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularNgEventsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        ng-click используется для обработки события - нажатия на сгенерированной кнопке,
        устанавливая значение стиля равное названию кнопки
    </pre>
    <style>
        .Red {
            background-color: lightcoral;
        }
        .Green {
            background-color: lightgreen;
        }
        .Blue {
            background-color: lightblue;
        }
    </style>
    <div id="tasksPanel" class="panel" ng-controller="ngEventsCtrl">
        <table class="table table-striped table-hover" >
            <thead>
            <tr class="h4">
                <td>Директива</td>
                <td>Как применяется</td>
                <td>Описание</td>
            </tr>
            </thead>
            <tbody ng-repeat="item in items">
            <tr>
                <td>{{item.name}}</td>
                <td>{{item.apply}}</td>
                <td>{{item.description}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="ngEventsCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="row well">
            <span ng-repeat="button in buttonNames">
                <button class="btn btn-info" ng-click="data.rowColor = button">
                    {{button}}
                </button>
            </span>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Done</th>
            </tr>
            </thead>
            <tr ng-repeat="task in tasks" ng-class="data.rowColor" ng-mouseenter="handleEvent($event)"
                ng-mouseleave="handleEvent($event)">
                <td>{{$index + 1}}</td>
                <td>{{task.action}}</td>
                <td ng-class="data.columnColor">{{task.complete}}</td>
            </tr>
        </table>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="ngEventsCtrl">
        <div class="well" tap="message = 'Hovered!'" focusout="message='focus out'">
            {{message}}
        </div>
    </div>
</div>