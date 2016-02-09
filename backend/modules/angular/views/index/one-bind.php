<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularBindingAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'One way data-binding';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularBindingAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        one-way binding означает что данные будут взяты из модели и вставлены в html
        Привязки angularjs асоциируются с данными в модели.
        При изменении данных модели их значение автоматически изменится
        Привязки можно делать только для данных, добавленных в scope
    </pre>
    <div id="tasksPanel" class="panel" ng-controller="studyCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <div>There are {{tasks.length}} tasks</div> <!--самый популярный вид привязки-->
        <div>
            <!--эффект от {{}} и ng-bind один и тот же-->
            There are <span ng-bind="tasks.length"></span> tasks
            <!--при таком варианте привязки нам требуется дополнительный элемент (span)-->
        </div>
        <div ng-bind-template="First task: {{tasks[0].action}}. Second task: {{tasks[1].action}}"></div>
        <!--ng-bind может отобразить только одну привязку.
        Если вы хотите отобразить множество привязок, то используйте ng-bind-template-->
        <!--недостатком вот таких привязок {{}} является то, что angularjs обрабатывает каждую из них.
        Это может составить проблему когда вы используете несколько фреймворков-->
        <div>
            AngularJS uses {{and}} characters for templates
            <!--angularjs не будет жаловатся на то, что мы пытаемся привязать
            несуществующие данные потому что он думает, что они будут созданы позже.
            Если мы ссылаемся в привязке на данные, которых не существует, то эта привязка просто не отобразится-->
        </div>
        <!-- определяет участок html-кода, в котором привязка не будет использоваться -->
        <div ng-non-bindable>
            AngularJS uses {{and}} characters for templates
        </div>
    </div>
</div>