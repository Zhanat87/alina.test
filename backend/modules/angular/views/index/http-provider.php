<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularHttpProviderAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'http provider';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularHttpProviderAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        если вам нужно установить настройки поу молчанию для запросов с помощью $http,
        то для этого нужно воспользоватся сервисом $httpProvider.
        свойства $httpProvider:
        defaults.headers.common - определяет заголовки по умолчанию которые используются для всех запросов
        defaults.headers.post - определяется заголовки которые используются для POST запросов
        defaults.headers.put - определяется заголовки которые используются для PUT запросов
        defaults.transformResponse - массив функций для трансформации всех ответов
        defaults.transformRequest - массив функций для трансформации всех запросов
        interceptors - массив фабричных interceptor функций
        withCredentials - устанавливает для всех типов запросов настройку аутентификации
    </pre>
    <div ng-controller="httpProviderCtrl">
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
    <pre>
        interceptor(перехватчик) это некий асоциативный массив который содержит в себе функции,
        предназначенные для перехвата запросов или ответов.
        свойства, которые содержит interceptor:
        request - функция будет выполнена перед запросом на сервер, в аргументах
        функции приходит объект config который содержит ранее упомянутые свойства
        requestError - функция будет вызвана если предыдущая
        функция перехватчик запроса сгенерировала ошибку
        response - функция будет выполнена когда будет получен ответ от сервера,
        в аргументы функции попадает объект который содержит ответ от сервера
        responseError - функция будет вызвана если предыдущая
        функция перехватчик ответа сгенерировала ошибку
    </pre>
    <div ng-controller="httpProviderCtrl2">
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
</div>