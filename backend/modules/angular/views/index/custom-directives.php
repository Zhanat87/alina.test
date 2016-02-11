<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularCustomDirectivesAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'custom directives';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularCustomDirectivesAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Создавать пользовательские директивы следует в том случае, если:
        - встроенные директивы не предоставляют вам нужной функциональности
        - хотите создать более обобщенную директиву или же наоборот более узко-специализированную
    </pre>
    <p>
        angularjs обрабатывает каждую букву в верхнем регистре как знак раздлеления -
        поэтому имеет смысл применять немного измененное имя директивы
    </p>
    <div ng-controller="customDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list="items"></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <p>
        в предыдущем примере существовала одна негативнгая зависимость и
        заключалалсь она в том, что при использовании директивы orderedList
        хардкодом задавалось свойство, из которого следует брать данные для отображения, это следует изменить
    </p>
    <p>
        custom-property - атрибут, в котором можно задавать значение свойства из модели.
        так же можно указать название атрибута data-custom-property,
        в таком случае angular удалит приставку data- при обработке
    </p>
    <div ng-controller="customDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list-second="items" custom-property="itemName"></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <p>
        применяя фильтр в данном случае мы получим ошибку, которая связанна с тем,
        что мы используем имя свойства для того, чтобы получить значение для отображения
    </p>
    <div ng-controller="customDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body h3">
                <div ordered-list-third="items" custom-property="itemPrice | currency"></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="customDirectivesCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Items</h3>
            </div>
            <div class="panel-body">
                <button class="btn btn-success" ng-click="changePrices()">
                    <h4>Change Prices</h4>
                </button>
            </div>
            <div class="panel-body h3">
                <div ordered-list-fourth="items" custom-property="itemPrice | currency"></div>
            </div>
        </div>
    </div>
</div>