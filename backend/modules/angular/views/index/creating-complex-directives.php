<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularCreatingComplexDirectivesAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'creating complex directives';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularCreatingComplexDirectivesAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        в предыдущих примерах для создания директивы использовалась фабричная функция,
        которая возвращала ссылочную функцию.
        это простейший подход, который скрывает большинство дополнительных опций,
        которые можно указать при создании директивы.
        Для того, чтобы указать эти опции следует использовать иной подход:
        фабричная функция должна возвращать JavaScript объект,
        который содержит в себе свойства для указания полноценной кастомизации директивы.
        Перечень свойств представлен ниже:
        compile - определяет функцию компиляции
        controller - создает функцию-контроллер для директории
        link - определяет ссылочную функцию для директивы
        replace - определяет замещать ли содержимое элемента,
        к которому была примененна директива сгенерированным контентом
        require - объявляет зависимость от контроллера
        restrict - определяет как директива может быть применена
        scope - создает новый scope или isolated scope для директивы
        template - определяет шаблон, который будет вставлен в HTML разметку
        templateUrl - определяет шаблон извне, который будет вставлен в HTML разметку
        transclude - определяет может ли директива использоватся
        в качестве обертки для произвольного содержимого
    </pre>
    <div ng-controller="creatingComplexDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h4">
                <div ordered-list="items" property="itemPrice | currency"></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <pre>
        в предыдущих примерах директивы использовались для генерации HTML
        разметки с помощью jqLite или JQuery.
        но это всего лишь императивный подход для создания декларативного контента
        и в больших проектах его используют не часто.
        так как это усложняет чтение и сопровождение кода.
        Альтернативным подходом является генерация HTML шаблона,
        который используется для замены контента элемента, к которому была применена директива
    </pre>
    <div ng-controller="creatingComplexDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list2="items"></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <script type="text/template" id="template">
        <ol>
            <li ng-repeat='item in data'>{{item.itemName}}</li>
        </ol>
    </script>
    <pre>
        в предыдущем примере в качестве шаблона использовалась строка с HTML разметкой,
        но в качестве шаблона может выступать так же функция, которая создает или возвращает шаблон
    </pre>
    <div ng-controller="creatingComplexDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list3="items"></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <p>
        если вам необходимо создать шаблон, который используется в нескольких
        местах приложения, разными приложениями,
        либо по иной причине этот шаблон должен существовать в отдельном файле,
        то следует использовать свойство templateUrl
    </p>
    <div ng-controller="creatingComplexDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list4="items">
                    This is where the list will go
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="creatingComplexDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list5="items">
                    This is where the list will go
                </div>
            </div>
            <div class="panel-body">
                <div  ordered-list5="items" template="table">
                    This is where the list will go
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <p>
        для того, чтобы увидеть эффект от работы свойства replace,
        следует в браузере открыть просмотр разметки:
        если вы не используете replace, то вы увидите div,
        к которому будет применена директива и в нем table,
        если же вы используете replace, то div будет заменен на table
        и все атрибуты этого div будут перемещены в table
    </p>
    <div ng-controller="creatingComplexDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Products</h3>
            </div>
            <div class="panel-body">
                <div ordered-list6="items">
                    <p>Content</p>
                </div>
            </div>
        </div>
    </div>
</div>