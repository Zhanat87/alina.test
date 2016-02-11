<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularProcessingDangerousDataAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'processing dangerous data';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularProcessingDangerousDataAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        один из самых распространенных способов атаки на веб приложение это ввод ложных данных,
        например в поля формы можно ввест не требуемые данные а javascript сценарий,
        который может быть выполнен и впоследствии вашему приложению будт нанесен вред
        angularjs содержит несколько сервисов позволяющих повысить безопасность
        своего приложения, чаще всего это будет необходимо в
        приложениях которые позволяют пользователю генерировать html разметку

        запустившись мы увидим строку которая указана в свойстве htmlData,
        но на самом деле angularJS уже обработал ее
        и отображаемая строка превратилась в &lt;p&gt;This is &lt;b
        onmouseover=alert('Attack!')&gt;dangerous&lt;/b&gt; data&lt;/p&gt;
        были заменены опасные символы на более безопасные
    </pre>
    <div ng-controller="processingDangerousDataCtrl">
        <div class="well">
            <p><input class="form-control" ng-model="htmlData" /></p>
            <p>{{htmlData}}</p>
        </div>
    </div>
    <br />
    <pre>
        ng-bind-html выполняет привязку и проверяет выражение на содержание
        недопустимых символов, по умолчанию использует
        $sanitize сервис, необходимо подключение angular_sanitize.js,
        который содержим модуль ngSanitize
        запустившись мы увидим строку которая указана в свойстве htmlData,
        но на самом деле angularJS уже обработал ее
        и отображаемая строка превратилась в &lt;p&gt;This is &lt;b
        onmouseover=alert('Attack!')&gt;dangerous&lt;/b&gt; data&lt;/p&gt;
        были заменены опасные символы на более безопасные
    </pre>
    <div ng-controller="processingDangerousDataCtrl2">
        <div class="well">
            <p><input class="form-control" ng-model="htmlData" /></p>
            <p ng-bind-html="htmlData"></p>
        </div>
    </div>
    <p>
        обратите внимание что angularjs удалил обработчик на событие javascript onmouseover из строки
    </p>
    <br />
    <div ng-controller="processingDangerousDataCtrl3">
        <div class="well">
            <p><input class="form-control" ng-model="dangerousData" /></p>
            <p ng-bind="htmlData"></p>
        </div>
    </div>
    <br />
    <pre>
        в некоторых случаях все же нужно оставить возможность выполнять клиенту
        javascript код, для этого в angularjs существует сервис $sce.
        этот сервис содержит метод trustAsHtml который возвращает выражение,
        обработанное сервисом $sce
    </pre>
    <p>
        для того, чтобы увидеть эффект наведите курсор на жирный текст
    </p>
    <div ng-controller="processingDangerousDataCtrl4">
        <div class="well">
            <p><input class="form-control" ng-model="htmlData" /></p>
            <p ng-bind-html="trustedData"></p>
        </div>
    </div>
</div>