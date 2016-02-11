<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularLocationServiceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'location service';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularLocationServiceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        с помощью сервиса $location можно получить доступ к url,
        но только к той ее части которая указана после #
        например http://mydomain.com/app.html#/cities/london?select=hotels#north
        нет возможности с помощью этого сервиса изменить весь url так как
        если выполнится переход по другому url то текущее приложение будет выгружено
        сервис $location содержит методы:
        absUrl() возвращает полный url
        hash()/hash(target) возвращает или устанавливает hash секцию url
        host() возвращает имя хоста (mysite.com)
        path()/path(target) возвращает или устанавливает path секцию url
        port() возвращает номер порта (по умолчанию 80)
        protocol() возвращет protocol (http)
        replace() все изменения в текущем url заменяются записью из истории
        search()/search(term, param) возвращает или устанавливает search секцию url
        url()/url(target) возвращает или устанавливает path, query string, hash
        так же сервис $location содержит несколько событий которые можно
        использовать для уведомления об изменении url
        из-за действий пользователя или програмно, обработчики на эти
        события можно указать используя метод $on, обработчик будет
        получать в качестве аргументов новый url и старый url
        $locationChangeStart генерируется перед изменением url,
        обработав это событие можно препятствовать изменениям url
        $locationChangeSuccess генерируется после изменения url
    </pre>
    <div ng-controller="locationServiceCtrl">
        <div class="panel panel-default">
            <h4 class="panel-heading">URL</h4>
            <div class="panel-body">
                <p>The url is : {{url}}</p>
                <div class="btn btn-group">
                    <button class="btn btn-primary" ng-click="setUrl('reset')">Reset</button>
                    <button class="btn btn-primary" ng-click="setUrl('path')">Path</button>
                    <button class="btn btn-primary" ng-click="setUrl('hash')">Hash</button>
                    <button class="btn btn-primary" ng-click="setUrl('search')">Search</button>
                    <button class="btn btn-primary" ng-click="setUrl('url')">URL</button>
                </div>
            </div>
        </div>
    </div>
</div>