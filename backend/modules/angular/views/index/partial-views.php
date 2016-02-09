<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularPartialViewsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'partial views';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularPartialViewsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        директива ng-include с помощью AJAX запрашивает с сервера фрагмент html разметки,
        компилирует его для обработки директив которе там могут быть и далее добавляет его в DOM,
        это аналог partial view
        директиву ng-incude стоит применять только с открывающим и закрывающим тегами
        так как если применить только один тег то все что содержится в DOM после этой директивы будет удалено,
        это можно увидеть на примере параграфа 'Removed text'
        обратите внимание что путь к файлу взят в одинарные кавычки, потому что javascript
        обрабатывает его как выражение которое содержит статический путь к файлу
    </pre>
    <div id="tasksPanel" class="panel" ng-controller="partialViewsCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <ng-include src="'partial/table.html'" />
        <p>Removed text</p>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="partialViewsCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <ng-include src="'partial/table.html'"></ng-include>
        <p>Don't removed text</p>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="partialViewsCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="well">
            <div class="checkbox">
                <label>
                    <input type="checkbox" ng-model="list" />
                    Switch the view
                </label>
            </div>
        </div>
        <div ng-include="showFile()" onload="displayMessage()"></div>
        <!--displayMessage() фунция, которая будет вызваться в момент загрузки дива-->
        <!--аттрибут ng-include может быть применен к любому html элементу-->
    </div>
    <div id="tasksPanel" class="panel" ng-controller="partialViewsCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div class="well">
            <div class="checkbox">
                <label>
                    <input type="checkbox" ng-model="list" />
                    Use the list view
                </label>
            </div>
        </div>
        <ng-include src="changeView()"></ng-include>
        <!-- обратите внимание: здесь переключение между путями ко view происходит динамически с помощью обращения к методу-->
    </div>
    <div id="tasksPanel" class="panel" ng-controller="partialViewsCtrl">
        <pre>
            директива ng-switch может быть примененна как элемент и как атрибут,
            а ng-switch-when и ng-switch-default только как атрибуты
            здесь у атрибута ng-switch присутствует атрибут on который указывает на некое условие
            в зависимости от условия будет отображатся та или иная часть разметки.
            Это все очень похоже на switch-case
            ng-switch-when определяет участок разметки с которым ассоциируется условие
            если ни один из вариантов представленных в условии не соответствует ожидаемым значениям,
            то будет использоватся участок разметки, декорированный атрибутом ng-switch-default
            используйте директиву ng-switch когда вам нужно переключатся между небольшими участками разметки,
            которые вы хотите показать пользователю,
            не следует использовать эте директиву если вы планируете показывать большие участки разметки,
            так как то, чем оперирует ng-switch - это разметка
            которая уже загружена, а значит вам придется загружать большие файлы,
            что влечет за собой уменьшение скорости
            ng-include следует использовать для более тяжелого контента или контента,
            который вы планируете использовать в нескольких местах вашего приложения,
            но следует помнить, что если вы используете ng-include, то у вас выполняется
            ajax запрос на сервер, а это так же займет некоторое время, если этот запрос выполняется впервые
        </pre>
        <h3 class="panel-header">Tasks List</h3>
        <div class="well">
            <div class="radio" ng-repeat="button in ['Default', 'Table', 'List']">
                <label>
                    <input type="radio" ng-model="data.mode" value="{{button}}" ng-checked="$first" />
                    {{button}}
                </label>
            </div>
        </div>
        <div ng-switch on="data.mode">
            <div ng-switch-when="Table">
                <table class="table">
                    <thead>
                    <tr><th>#</th><th>Task</th><th>Done</th></tr>
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