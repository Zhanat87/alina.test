<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AngularAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'two-way binding';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        two-way binding отражают изменения обеих сторон
        two-way bindings создаются при помощи ng-model директивы
    </pre>
    <div id="tasksPanel" class="panel" ng-controller="studyCtrl">
        <h3 class="panel-header">Tasks List</h3>
        <!--на самом деле ng-model можно использовать как для one-way так и для two-way привязок (создавая или нет редактируемые контролы)-->
        <div class="well">
            <div>The first task is: {{tasks[0].action}}</div>
            <!--это простая inline привязка которая просто отображает данные модели-->
        </div>
        <div class="form-group well">
            <label for="firstItem">Set first item:</label>
            <input name="firstItem" class="form-control" ng-model="tasks[0].action" />
            <!--это two-way binding двусторонняя привязка может применятся только к тем элементам,
            в которые пользователь может ввести значения-->
            <!--изменения в input обновляют данные модели откуда в свою очередь их черпает привязка one-way-->
            <!--на самом деле здесь нет никакой магии и все основано на событиях javascript,
            которые распространяются через сервис scope-->
            <!--одним из преимуществ angularjs является динамическое создание свойств модели и
            это означает что они создаются только тогда когда становятся необходимы-->
        </div>
    </div>
</div>