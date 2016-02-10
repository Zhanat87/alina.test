<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularBasicControllerAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'basic controller';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularBasicControllerAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        чтобы создать контроллер нужно вызвать метод controller и передать ему 2 аргумента:
        1й название контроллера,
        2й это функция конструктор или фабричная функция (так как эта функция
        используется для создания других функций - фабрика)
        фабричная функция принимает аргумент $scope который передается ей с помощью Dependency Injection,
        но так же можно в аргументах указывать и другие сервисы например $http

        для того чтобы использовать методы контроллера в определенном участке разметки,
        нужно обязательно указать директиву ng-controller с имененм того контроллера,
        который будет использоватся в разметке,
        для одной html страницы может использоватся множество контроллеров
        так же при именовании контроллера сделует использовать постфикс Ctrl

        если задать свойство ng-controller у body, то получится
        контроллер-монолит это один контроллер, который применяется ко всей разметке на странице
    </pre>
    <div class="btn btn-primary btn-lg" ng-controller="basicController">
        Content
    </div>
    <br /><br />
    <div class="panel panel-primary" ng-controller="basicController2">
        <div class="panel-heading">
            <h4>The fruit is: {{fruit}}</h4>
            <h4>Do you wan't it ? : {{getFruit(fruit)}}</h4>
        </div>
    </div>
    <br /><br />
    <div class="panel panel-primary" ng-controller="basicController3">
        <div class="panel-heading">
            <h4>The city is: {{city}}</h4>
            <h4>The country is : {{getCountry(city) || "Unknown"}}</h4>
        </div>
        <div class="panel-body">
            <p>
                когда пользователь выбирает элемент, то содержимое этого элемента благодаря
                ng-model записывается в city и далее при вызове getCountry()
                в качестве аргумента передается созданный city
            </p>
            <br />
            <label class="h4">Select a City:</label>
            <select ng-options="city for city in cities" ng-model="city">
                <!---->
            </select>
        </div>
    </div>
    <div class="panel panel-primary" ng-controller="basicController4">
        <div class="panel-heading text-center">
            <h3>Monolithic Controller</h3>
        </div>
        <div class="panel-body">
            <div class="well-sm">
                <h4>Login</h4>
                <div class="form-group">
                    <input class="form-control" ng-model="login" />
                </div>
                <button class="btn btn-primary" ng-click="setLogin('login', login)">
                    Save login
                </button>
                <h4>Password</h4>
                <div class="form-group">
                    <input class="form-control" ng-model="password" />
                </div>
                <button class="btn btn-primary" ng-click="copyLogin()">
                    Use login
                </button>
                <button class="btn btn-primary" ng-click="setLogin('password', password)">
                    Save Password
                </button>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <p>
            когда используется scopeless контроллер, то нужно при объявлении его использовать специфический синтаксис
            simpleCtrl as ctrl далее к этому контроллеру в разметке можно будет обратится с помощью этой переменной ctrl
            в данном случае к элементу div применился контроллер basicController5 и создалась переменная ctrl
        </p>
        <div class="panel-heading" ng-controller="basicController5 as ctrl">
            <h4>ScopeLess Ctrl</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ng-click="ctrl.reverseText()">Use mirror</button>
                </span>
                <input class="form-control" ng-model="ctrl.dataValue" />
            </div>
        </div>
    </div>
</div>