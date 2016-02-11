<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularFilteringDataCollectionAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'filtering data collection';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularFilteringDataCollectionAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        фильтр по категории можно реализовать 2-мя способами:
        1) указать фильтр filter:{category:'Dairy'}
        2) создать функцию и вызывать её
    </pre>
    <p>
        фильтр limitTo используется для ограничения отображаемых элементов из источника данных
    </p>
    <p>
        так же limitTo применяется к строкам, где он воспринимает каждый символ как элемент массива
    </p>
    <div class="panel panel-primary" ng-controller="filteringDataCollectionCtrl">
        <div class="panel-heading">
            <h3>
                Items in cart
                <span class="label label-info">{{items.length}}</span>
                <p>Limit: <select class="text-info" ng-model="limitValue" ng-options="item for item in limitRange"></select></p>
            </h3>
        </div>
        <div class="row">
            <div class="col-xs-3" ng-repeat="item in items | limitTo:limitValue">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>{{item.itemName | limitTo:limitValue}}</h4>
                    </div>
                    <div class="panel-body">
                        <p><span class="h4">Category: </span>{{item.itemCategory | lowercase}}</p>
                        <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="filteringDataCollectionCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                    <p>Limit: <select class="text-info" ng-model="limitValue" ng-options="item for item in limitRange"></select></p>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-3" ng-repeat="item in items | filter:selectItems">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <pre>
        наиболее широко используемый фильтр - orderBy, предназначен для сортировки элементов массива.
        используя этот фильтр следует помнить о его особенности,
        значение для фильтрации должно быть в одинарных кавычках.
        так если их не указать, то angular считает, что вы хотите использовать
        свойство scope и если его нет, то возможно оно появится в будущем.
        используя знак + или - можно указывать направление сортировки orderBy:'+price'/orderBy:'-price'

        так же еще одна причина почему нужно указывать свойство в кавычки -
        это возможность для сортировки использовать фунцкцию,
        которую уже в кавычках указывать не нужно

        при сортировке angularjs запрашивает у функции значение на основании которого определяет порядок.
        так же можно использовать несколько фильтров.
        в данном примере выполняется сортировка с помощью функции и по цене
    </pre>
    <div ng-controller="filteringDataCollectionCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-12" ng-repeat="item in items | orderBy:'-itemPrice'">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="filteringDataCollectionCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-12" ng-repeat="item in items | orderBy:customSorter">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="filteringDataCollectionCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>
                    Items in cart
                    <span class="label label-info">{{items.length}}</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-12" ng-repeat="item in items | orderBy:[customSorter, '+price']">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>