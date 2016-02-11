<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularControllerCommunicationAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'controller-communication';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularControllerCommunicationAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        раздельные scope иногда это очень неудобно, но к счастью в angular есть механизм,
        который позволяет scope общаться между собой
        все scope организованы в иерархию, которая начинается с $rootScope и
        каждый scope является дочерним элементом rootScope
        rootScope позволяет распространять event между scope, что позволяет им взаимодействовать между собой
        Методы для посылки и получения events:
        $broadcast(name, args) - отсылает event из текущего scope всем дочерним,
        1й аргумент - имя события, 2й - объект предоставляющий дополнительные данные
        $emit(name, args) - отсылает event от текущего scope  к rootScope
        $on(name, handler) - регистрирует обработчик, который будет вызван когда scope инициирует необходимый event,
        аргументы: 1й - название события, для которого сработает обработчик, 2й - функция обработчик
    </pre>
    <div class="col-xs-6">
        <div class="panel panel-success" ng-controller="controllerCommunicationCtrl">
            <div class="panel-heading">
                <h3>Billing Zip Code</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input class="form-control" ng-model="billingZip" />
                </div>
                <button class="btn btn-success" ng-click="setAddress('billingZip', billingZip)">
                    Save billing
                </button>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-success" ng-controller="controllerCommunicationCtrl">
            <div class="panel-heading"><h3>Shipping zip code</h3></div>
            <div class="panel-body">
                <div class="form-group">
                    <input class="form-control" ng-model="shippingZip" />
                </div>
                <button class="btn btn-success" ng-click="copyAddress()">
                    Use Billing
                </button>
                <button class="btn btn-success" ng-click="setAddress('shippingZip', shippingZip)">
                    Save Shipping
                </button>
            </div>
        </div>
    </div>
    <br /><br />
    <p>
        В предыдущем контроллере использовалась техника, которая применима если у вас есть один контроллер,
        что в реальных приложениях встречается редко
        поэтому лучше перенести логику посылки сообщения в сервис,
        который далее смогут использовать все контроллеры
        c помощью такого подхода так же уменьшается степень копирования кода
    </p>
    <div class="col-xs-6">
        <div class="panel panel-success" ng-controller="controllerCommunicationCtrl2">
            <div class="panel-heading">
                <h3>Billing Zip Code</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input class="form-control" ng-model="billingZip" />
                </div>
                <button class="btn btn-success" ng-click="setAddress('billingZip', billingZip)">
                    Save billing
                </button>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-success" ng-controller="controllerCommunicationCtrl2">
            <div class="panel-heading"><h3>Shipping zip code</h3></div>
            <div class="panel-body">
                <div class="form-group">
                    <input class="form-control" ng-model="shippingZip" />
                </div>
                <button class="btn btn-success" ng-click="copyAddress()">
                    Use Billing
                </button>
                <button class="btn btn-success" ng-click="setAddress('shippingZip', shippingZip)">
                    Save Shipping
                </button>
            </div>
        </div>
    </div>
</div>