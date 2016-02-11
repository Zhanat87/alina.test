<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularIntervalAndTimeoutServicesAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'interval and timeout services';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularIntervalAndTimeoutServicesAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        $interval и $timeout - сервисы являются обертками над функциями
        JavaScript window.setInterval() и window.setTimeout()
        они принимают аргументы:
        fn - функция, чье выполнение будет задержано
        delay - количество милисекунд до выполения функции
        count - количество раз, когда выполнение функции будет повторяться ($interval),
        значение по умолчанию 0 и оно означает бесконечное повторение
        invokeApply - когда установлено true (это значение по default),
        то функция будет выполнятся с применением scope.$apply метода
    </pre>
    <div ng-controller="intervalAndTimeoutServicesCtrl" class="well">
        <div class="panel panel-default">
            <h4 class="panel-heading">Time</h4>
            <div class="panel-body">
                The time is: {{time}}
            </div>
        </div>
    </div>
</div>