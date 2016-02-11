<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularFiltersChainAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'filters chain';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularFiltersChainAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        В angularjs так же есть возможность применять множественные фильтры для операций с единичными данными,
        такие фильтры как currency и date редко применяются в цепочках, так как это не имеет особого смысла,
        для преобразования коллекций данных зачастую используют функции
    </pre>
    <div ng-controller="filtersChainCtrl">
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
                            <h4>{{item.itemName}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory}}</p>
                            <p><span class="h4">Expire date: </span>{{item.expireDate}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>