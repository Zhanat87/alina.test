<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularWindowServiceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'window service';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularWindowServiceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Основная причина почему в AngularJS доступны сервисы для работы с
        DOM API global objects это юнит тестирование
        использование сервисов делает тестирование намного проще так как
        у вас появляется возможность протестировать только тот функционал
        который вам нужен и вы избавляетесь от проблем с зависимостями
    </pre>
    <div ng-controller="windowServiceCtrl" class="well">
        <button class="btn btn-primary" ng-click="showHint('Hint!')">Click me!</button>
    </div>
</div>