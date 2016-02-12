<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularBasicAjaxAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'basic ajax';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularBasicAjaxAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Для того, чтобы использовать AJAX следует всеголишь запросить сервис $http,
        который позволяет работать с AJAX,
        далее следует вызвать один из методов, которые предоставляет этот сервис
        (в зависимости от типа запроса, который вы хотите сформировать)
        затем нужно определить метод который будет выполнятся при успешном запросе
        и который будет выполнятся если запрос не удался (при необходимости).
        Так же для того чтобы вы могли получить доступ к файлу с расширением
        *json следует внести изменения в файл web.config
        Методы сервиса $http:
        get(url, config) выполняет GET запрос по указанному URL,
        config - конфигурационный объект.
        post(url, data, config) выполняет POST запрос по указанному URL,
        data - данные которые передаются в запросе, config - конфигурационный объект.
        delete(url, config) выполняет DELETE запрос по указанному URL,
        config - конфигурационный объект.
        put(url, data, config) выполняет PUT запрос по указанному URL,
        data - данные, которые передаются в запросе, config - конфигурационный объект.
        head(url, config) выполняет HEAD запрос по указанному URL,
        config - конфигурационный объект.
        jsonp(url, config) выполняет GET запрос для получения в качестве ответа
        JavaScript сценария, который затем будет выполнен
        (работа с кроссдоменными запросами JSONP)
        AngularJS использует технологию promise, суть этой технологии заключается в том,
        что при выполнении асинхронного запроса после его окончания
        будет выполнен метод который указан в цепочке.
        Например метод success является promise так как AJAX запрос асинхронный,
        и этот метод будет выполнен
        после того как запрос получит ответ от сервера.
        Ниже представлен список методов доступных для манипулирования
        данными полученными в качестве ответа на запрос от сервера
        success(fn) - вызывает функцию, которая определена в аргументах
        когда запрос выполнен успешно
        error(fn) вызывает функцию, которая определена в аргументах
        когда запрос выполнен с ошибкой
        then(fn, fn) регистрирует функцию success и функцию error
    </pre>
    <div id="tasksPanel" class="panel panel-primary" ng-controller="basicAjaxCtrl">
        <div class="panel-heading">
            <div class="panel-title">
                <button class="btn btn-success" ng-click="getFruits()">
                    <h2>Get Fruits!</h2>
                </button>
            </div>
        </div>
        <div id="panel" class="panel-body">
            <div class="row">
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
    <br /><br /><br />
    <pre>
        Использование then метода дает ряд преимуществ, помимо того,
        что вы можете в одном методе определить две функции, в качестве аргумента этим функциям
        приходит promise-объект, который содержит дополнительную информацию о запросе:
        data - содержит данные запроса
        status - содержит статус ответа от сервера
        headers - содержит функцию которая позволяет получить заголовок по его имени
        config - конфигурационный объект, который используется для выполнения запроса
    </pre>
    <div id="tasksPanel" class="panel panel-primary" ng-controller="basicAjaxCtrl2">
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
    <br /><br /><br />
    <div id="tasksPanel" class="panel panel-primary" ng-controller="basicAjaxCtrl3">
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