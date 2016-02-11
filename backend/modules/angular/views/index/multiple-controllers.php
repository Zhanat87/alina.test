<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularMultipleControllersAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'multiple controllers';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularMultipleControllersAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        каждый раз когда вы применяете директиву ng-controller к элементам на странице,
        то фабричная функция создает экземпляр контроллера и
        таким образом, если на странице содержится два div'а, к которым примененна директива,
        то будет создано 2 контроллера и 2 scope которые никак не пересекаются друг с другом
    </pre>
    <p>
        обратите внимание, здесь директива ng-controller применяется к 2 элементам div,
        что в свою очередь означает, что для каждого экземпляра контроллера будет создан свой scope
        и данные, которые будут вводится в поле для ввода первого контроллера не будут доступны второму так как
        они используют разные scope
    </p>
    <div class="col-xs-6">
        <div class="panel panel-success" ng-controller="multipleControllersCtrl">
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
        <div class="panel panel-success" ng-controller="multipleControllersCtrl">
            <div class="panel-heading">
                <h3>Shipping zip code</h3>
            </div>
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
    <br /><br /><br />
    <pre>
        использование различных контроллеров для различных view это так же
        подход в написаниии приложений на angular js.
        правда такой подход менее рекомендуем, так как его сложно расширять
        и повторно использовать уже готовые методы.
        рекомендуется использовать наследование контроллеров
    </pre>
    <p>
        в этом примере scope никак не пересекаются,
        но у них все же есть общий родитель rootScope, который позволяет им общатся
    </p>
    <div class="panel panel-primary" ng-controller="firstCtrl">
        <div class="panel-heading">
            <h4>First Controller</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" ng-click="reverseText()">Reverse</button>
                </span>
                <input class="form-control" ng-model="value" />
            </div>
        </div>
    </div>
    <div class="panel panel-primary" ng-controller="secondCtrl">
        <div class="panel-heading">
            <h4>Second Controller</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" ng-click="reverseText()">Reverse</button>
                </span>
                <input class="form-control" ng-model="value" />
            </div>
        </div>
    </div>
</div>