<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularFilterAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'filter';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularFilterAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <p>
        здесь используется фильтр с помощью директивы filter, он указывает на те элементы, которые помечены
        как false и с помощью length получает их колличество,
        так же здесь используется class='label label-info' Bootstrap для визуального оформленеия
    </p>
    <p>
        one way binding
    </p>
    <div id="tasksPanel" class="panel panel-primary" ng-controller="filterCtrl">
        <div class="panel-heading">
            <div class="panel-title">
                <h2>
                    Incomplete tasks
                    <span class="label label-info">
                        {{(tasks | filter : {complete:'false'}).length}}
                    </span>
                </h2>
            </div>
        </div>
        <div id="panel" class="panel-body">
            <div class="row">
                <div class="col-sm-4 col-md-4" ng-repeat="task in tasks">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>{{task.action}}</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>{{task.complete}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading">
            <div class="panel-title">
                <h2>
                    "Go to gym" tasks
                    <span class="label label-info">
                        {{(tasks | filter : {action:'Go to gym'}).length}}
                    </span>
                </h2>
            </div>
        </div>
    </div>
    <p>
        ng-model используется для создания two-way binding, в таком случае при изменении состояния
        checkbox будет изменятся содержимое модели,
        и все one-way или two-way bindings которые используют значения модели
    </p>
    <p>
        two way binding
    </p>
    <div id="tasksPanel" class="panel panel-primary" ng-controller="filterCtrl">
        <div class="panel-heading">
            <div class="panel-title">
                <h2>
                    Incomplete tasks
                    <span class="label label-info">
                        {{(tasks | filter : {complete:'false'}).length}}
                    </span>
                </h2>
            </div>
        </div>
        <div id="panel" class="panel-body">
            <div class="row">
                <div class="col-sm-4 col-md-4" ng-repeat="task in tasks">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>{{task.action}}</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>
                                <input type="checkbox" class="checkbox checkbox-inline" ng-model="task.complete" />
                                <!---->
                                {{task.complete}}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>
        объекта newtask не существует при первом запуске приложение,
        но как только пользователь введет значение в один из input'ов ( Action или Priority),
        то Angular автоматически создаст объект и запишет туда свойство.
        в директиве ng-click вызывается метод и ему передается уже готовый и заполненный объект
    </p>
    <div id="tasksPanel" class="panel panel-primary" ng-controller="filterCtrl">
        <div class="panel-heading">
            <div class="panel-title">
                <h2>
                    Incomplete tasks
                    <span class="label label-info">
                        {{(tasks | filter : {complete:'false'}).length}}
                    </span>
                </h2>
            </div>
        </div>
        <div id="panel" class="panel-body">
            <div class="row">
                <div class="col-xs-3">
                    <div class="well">
                        <h2>Add new Task</h2>
                        <div class="form-group row">
                            <label for="actionText">Action:</label>
                            <input id="actionText" class="form-control" ng-model="newTask.action" />
                        </div>
                        <div class="form-group row">
                            <label for="actionLocation">Priority:</label>
                            <select id="actionLocation" class="form-control" ng-model="newTask.Priority">
                                <option>High</option>
                                <option>Regular</option>
                                <option>Low</option>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-block" ng-click="addTask(newTask)">Add</button>
                    </div>
                </div>
                <div class="col-xs-3" ng-repeat="task in tasks">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>{{task.action}}</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>
                                <input id="checkbox" type="checkbox" class="checkbox checkbox-inline" ng-model="task.complete" />
                                <label for="checkbox">{{task.complete}}</label>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>