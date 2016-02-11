<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularCustomFiltersAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'custom filters';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularCustomFiltersAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        для того, чтобы создать пользовательский фильтр
        нужно использовать метод filter, который есть у модуля (Module.filter())
        этот метод принимает 2 аргумента:
        1) имя фильтра;
        2)factory function, которая создает worker function

        в случае, если не указать второй аргумент для фильтра, то передается null
    </pre>
    <div ng-controller="customFiltersCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-12" ng-repeat="item in items | orderBy:[customSorter, '+price'] | limitTo: 3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName | changeCase}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory | changeCase:true}}</p>
                            <p><span class="h4">Expire date: </span>{{item.expireDate}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="customFiltersCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-12" ng-repeat="item in items | skipItems:3 | limitTo: 4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName | changeCase}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory | changeCase:true}}</p>
                            <p><span class="h4">Expire date: </span>{{item.expireDate}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="customFiltersCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-12" ng-repeat="item in items |change:3:4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName | changeCase}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory | changeCase:true}}</p>
                            <p><span class="h4">Expire date: </span>{{item.expireDate}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>