<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AngularAsset;
use backend\assets\AngularBuiltInVariablesAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'built in variables';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularBuiltInVariablesAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        шаблонные директивы используются для того, чтобы генерировать html по шаблону,
        облегчить работу с коллекциями данных и для добавления базовой логики на страницу

        even и odd используются зачастую, чтобы задавать четным и нечетным элементам разные стили
        $odd возвращает true если элемент нечетный
        $even возвращает true если элемент четный

        настоящая суть этих переменных проявляется когда они используются комплексно с другими директивами
        $first возвращает true если данный элемент первый в коллекции
        $last возвращает true  если данный элемент последний в коллецкии
        $middle возвращает true если элемент не первый и не последний в коллекции
    </pre>
    <style>
        .odd {
            background-color: #f7d474;
        }
        .even {
            background-color: #d6b6f3;
        }
    </style>
    <div id="tasksPanel" class="panel" ng-controller="builtInVariables">
        <h3 class="panel-header">Tasks List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Done</th>
                </tr>
            </thead>
            <tr ng-repeat="task in tasks" ng-class="$even ? 'odd' : 'even'">
                <!--$index системная переменная изначально равна 0 чаще всего используется для указания позиции-->
                <td>{{$index + 1}}</td>
                <td>{{task.action}}</td>
                <td>
                    <span ng-if="$first || $last">
                        {{task.complete}}
                    </span>
                </td>
                <!--ng-if используется для отображения элемента в DOM  в зависимости от условия
                например "$first || $last" означает что будут отображены в DOM  только 1й и последний элементы-->
            </tr>
        </table>
    </div>
</div>

