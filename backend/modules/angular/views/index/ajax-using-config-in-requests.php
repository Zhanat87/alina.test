<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAjaxUsingConfigInRequestsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ajax using config in requests';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAjaxUsingConfigInRequestsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Как вы уже видели все типы запросов, которые можно выполнить с помощью
        сервиса $http поддерживают в качестве второго параметра конфигурационный объект,
        с помощью которого можно передать дополнительные данные в запросе:
        data - содержит данные, которые будут переданы в запросе, если в качестве
        значения указать объект, то AngularJS автоматически сериализует его в JSON
        headers - используется для передачи заголовков в запросе
        method - устанавливает тип запроса
        params - позволяет передать URL параметры
        timeout - устанавливает время ожидания ответа от сервера
        transformRequest - используется для работы с запросом перед его посылкой на сервер
        transformResponse - используется для манипуляции с ответом
        после того как он пришел от сервера
        url - устанавливает URL для запроса
        withCredentials - если в качестве параметра указать true,
        то в запрос будут включены cookies для аутентификации
        xsrfHeaderNamexsrfCookieName - это свойство используется
        для ответа на кроссдоменные зарпосы
    </pre>
    <div ng-controller="ajaxUsingConfigInRequestsCtrl">
        <div id="tasksPanel" class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <button class="btn btn-success" ng-click="getFruits()">
                        <h2>Get Fruits!</h2>
                    </button>
                </div>
            </div>
            <div id="panel" class="panel-body">
                <div class="row">
                    <div ng-hide="fruits.length">
                        <h3 class="text-center">No Data</h3>
                    </div>
                    <div class="col-sm-4 col-md-4" ng-repeat="fruit in fruits">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h3>{{fruit.name}}</h3>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h3>Cost : {{fruit.price | currency}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="ajaxUsingConfigInRequestsCtrl2">
        <div id="tasksPanel" class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <button class="btn btn-success" ng-click="getFruits()">
                        <h2>Get Fruits!</h2>
                    </button>
                    <button class="btn btn-primary" ng-click="sendXmlData()">
                        <h2>Send Data</h2>
                    </button>
                </div>
            </div>
            <div id="panel" class="panel-body">
                <div class="row">
                    <div ng-hide="fruits.length">
                        <h3 class="text-center">No Data</h3>
                    </div>
                    <div class="col-sm-4 col-md-4" ng-repeat="fruit in fruits">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h3>{{fruit.name}}</h3>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h3>Cost : {{fruit.price | currency}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>