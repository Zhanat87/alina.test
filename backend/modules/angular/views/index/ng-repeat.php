<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AngularAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-repeat';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div class="booksRepeatDiv" ng-controller="booksRepeatCtrl" url="<?php echo Url::to('/angular/index/ng-repeat'); ?>">
        <table class="table table-hover table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>name</td>
                    <td>author</td>
                    <td>publish date</td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="book in books">
                    <td>{{book.id}}</td>
                    <td>{{book.name}}</td>
                    <td>{{book.author_id}}</td>
                    <td>{{book.publish_date}}</td>
                </tr>
                <!--это один из самых распространенных способов использования ng-repeat -
                генерация строк таблицы на основе коллекции данных-->
                <!--источником данных может быть что-то перечислимое например массив или объект-->
                <!--итерируя элементами массив angularjs создает экземпляр каждого item и
                на этом экземпляре можно получить доступ к непосредственно самому объекту-->
            </tbody>
        </table>
    </div>
    <pre>
        шаблонные директивы используются для того чтобы генерировать html по шаблону,
        облегчить работу с коллекциями данных и для добавления базовой логики на страницу

        генерация однотипных элементов самая распространенная задача в разработке и
        для этого следует использовать директиву ng-repeat
    </pre>
    <div id="tasksPanel" class="panel" ng-controller="tasksRepeatCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Done</th>
                </tr>
            </thead>
            <tbody>
                <!-- этот цикл перебирает каждый элемент массива и генерирует для него tr -->
                <tr ng-repeat="task in tasks">
                    <!-- этот перебирает каждое свойство в объекте и генерирует для него td,
                    в котором используется one-way binding для отображения данных -->
                    <td ng-repeat="property in task">{{property}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="tasksPanel" class="panel" ng-controller="tasksRepeatCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Done</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="task in tasks">
                    <td ng-repeat="(key, value) in task">
                        <!--при таком использовании первое значение всегда указывает на ключ,
                        а второе непосредственно на само значение-->
                        {{key}} - {{value}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>