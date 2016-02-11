<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularCurrencyFilterAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'currency filter';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularCurrencyFilterAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Фильтры позволяют задать общее поведение, которое будет доступно по всему приложению.
        фильтры преобразовывают данные для отображения, не изменяя данных из scope,
        данные сортируются фильтром до их обработки директивами или отображения во view

        В angularjs существует несколько типов фильтров:
        для обработки единичных данных и для работы с коллекциями данных
        Встроенные фильтры для работы с единичными данными:
        currency - используется для форматирования валюты
        date - используется для форматирования даты
        json - генерирует объект из json строки
        number - используется для форматирования числовых значений
        uppercase/lowercase - используется для преобразования строки в верхний/нижний регистр
    </pre>
    <p>
        используйте currency:"₴" для указания валюты форматирования
    </p>
    <p>
        Для того, чтобы применить фильтр достаточно использовать символ | после которого
        нужно указать фильтры, которые будут применятся к выражению привязки
    </p>
    <div class="panel panel-primary" ng-controller="currencyFilterCtrl">
        <div class="panel-heading">
            <h3>
                Items in cart
                <span class="label label-info">{{items.length}}</span>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3" ng-repeat="item in items">
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