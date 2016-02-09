<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularNgClassStyleAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-class-style';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularNgClassStyleAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        ng-class используется для того, чтобы можно было динамически изменять CSS класс элемента,
        здесь используется свойсвто Row объекта settings, в котором хранится название стиля "Red"
        директива ng-style исользуется для того, чтобы непосредственно в элементе задать несколько стилей,
        которые могли бы изменятся динамически. здесь используется свойство Columns объекта settings,
        в котором хранится название стиля "Green".
        использовать стили непосредственно в элементе это плохая практика, обычно для этого используются стили,
        но в AngularJS можно динамически изменять значения этих стилей что является преимуществом,
        тем не менее лучше и продуктивнее по прежнему использовать классы.
        здесь используются директивы ng-class-even и ng-class-odd которые применяют стили
        для четных или не четных элементов,
        с помощью этих директив можно создать классическую полосатую таблицу не применяя Bootstrap
    </pre>
    <style>
        tr.Red {
            background-color: lightcoral;
        }
        tr.Green {
            background-color: lightgreen;
        }
        tr.Blue {
            background-color: lightblue;
        }
    </style>
    <div id="tasksPanel" class="panel" ng-controller="ngClassStyleCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="row well">
            <div class="col-xs-6" ng-repeat="(key, val) in settings">
                <h4>{{key}}</h4>
                <div class="radio" ng-repeat="button in buttonNames">
                    <label>
                        <input type="radio" ng-model="settings[key]" value="{{button}}"/>{{button}}
                    </label>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Done</th>
            </tr>
            </thead>
            <tr ng-repeat="task in tasks" ng-class="settings.Rows">
                <td>{{$index + 1}}</td>
                <td>{{task.action}}</td>
                <td ng-style="{'background-color':settings.Columns}">
                    {{task.complete}}
                </td>
            </tr>
        </table>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="ngClassStyleCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="row well">
            <div class="col-xs-6" ng-repeat="(key, val) in settings">
                <h4>{{key}}</h4>
                <div class="radio" ng-repeat="button in buttonNames">
                    <label>
                        <input type="radio" ng-model="settings[key]" value="{{button}}" />{{button}}
                    </label>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Done</th>
                </tr>
            </thead>
            <tr ng-repeat="task in tasks" ng-class-even="settings.Rows" ng-class-odd="settings.Columns">
                <td>{{$index + 1}}</td>
                <td>{{task.action}}</td>
                <td>{{task.complete}}</td>
            </tr>
        </table>
    </div>
</div>