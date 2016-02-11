<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularManipulatingWithScopeAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'manipulating with scope';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularManipulatingWithScopeAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        в данном примере в шаблоне применяется ng-model, но так как в контроллере
        такого свойства нет, то оно будет создано автоматически
        когда в один из input'ов будут введены данные, так как здесь
        директива применяется в двух местах, то будут созданы 2 экземпляра данной директивы,
        но оба эти экземпляра находятся в контроллере manipulatingWithScopeCtrl
        соответственно в обоих input'ах будет two-way binding на свойство data
    </pre>
    <div ng-controller="manipulatingWithScopeCtrl" class="panel panel-primary">
        <div class="panel-body" scope-example></div>
        <div class="panel-body" scope-example></div>
    </div>
    <br /><br /><br />
    <p>
        подход, который был продемонстрирован в предыдущем примере
        не подходит, если вам нужно, чтобы у каждого экземпляра директивы был свой scope
    </p>
    <div class="panel panel-primary">
        <div ng-controller="firstCtrl" class="panel-body" scope-example2></div>
        <div ng-controller="secondCtrl" class="panel-body" scope-example2></div>
    </div>
    <br /><br /><br />
    <script type="text/ng-template" id="customTemplate">
        <div class="panel panel-success">
            <div class="panel-heading">{{defaultCaption}}</div>
            <div class="panel-body">Create caption : <input ng-model="defaultCaption" /></div>
            <!--<div class="panel-heading">{{data.caption}}</div>
            <div class="panel-body">Create caption : <input ng-model="data.caption" /></div>-->
        </div>
    </script>
    <p>
        для того, чтобы у каждого экземпляра директивы был свой scope
        конечно же не очень удобно создавать новый контроллер.
        в angularjs для этого предусмотрено свойство scope и для того,
        чтобы у каждого экземпляра директивы был свой scope достаточно лишь указать scope:true
    </p>
    <div ng-controller="manipulatingWithScopeCtrl" class="panel panel-primary">
        <div class="panel-body" scope-example3></div>
        <div class="panel-body" scope-example3></div>
    </div>
    <br /><br /><br />
    <script type="text/ng-template" id="customTemplate2">
        <div class="panel panel-success">
            <div class="panel-heading">{{data.caption}}</div>
            <div class="panel-body">Create caption : <input ng-model="data.caption" /></div>
        </div>
    </script>
    <div ng-controller="manipulatingWithScopeCtrl2" class="panel panel-primary">
        <div class="panel-body" scope-example4></div>
        <div class="panel-body" scope-example4></div>
    </div>
    <br /><br /><br />
    <p>
        использования isolated scope имеет как ряд преимуществ так и ряд недостатков,
        например вам будет очень сложно манипулировать данными,
        для упрощения в angularjs предусмотрен механизм, с помощью которого можно
        взаимодействовать между контроллером и isolated scope.
        isolated scope позволяет вам создать привязку к данным в scope контроллера,
        используя атрибут который применяется к тому элементу к
        которому применена директива
    </p>
    <script type="text/ng-template" id="customTemplate3">
        <div class="panel panel-success">
            <div class="panel-heading"><p>This is {{property}}</p></div>
            <!--1) определяем binding на свойство isolated scope-->
        </div>
    </script>
    <div ng-controller="manipulatingWithScopeCtrl3" class="panel panel-primary">
        <div class="panel-heading">
            Binding source: <input ng-model="data.color" />
        </div>
        <div class="panel-body" scope-example5 color="{{data.color + ' color'}}"></div>
        <!--3) в качестве значения для атрибута color используется значение свойства name-->
    </div>
    <br /><br /><br />
    <script type="text/ng-template" id="customTemplate4">
        <div class="panel panel-success">
            <div class="panel-heading"><p>Type something: <input ng-model="property" /></p></div>
            <!--1) определяем в качестве модели свойство в isolated scope-->
        </div>
    </script>
    <div ng-controller="manipulatingWithScopeCtrl4" class="panel panel-primary">
        <div class="panel-heading">
            Type something: <input ng-model="data.value" />
        </div>
        <div class="panel-body" scope-example6 source="data.value"></div>
        <!--3) при изменении модели будет изменятся значение свойства data.value-->
    </div>
    <br /><br /><br />
    <p>
        еще одна возможность isolated scope - это определять вызов функции
        в качестве значения атрибута и выполнять функцию из scope контроллера
    </p>
    <script type="text/ng-template" id="template">
        <div class="panel panel-success">
            <div class="panel-heading"><p>What is {{fruit}}? {{getType()}}</p></div>
        </div>
    </script>
    <div ng-controller="manipulatingWithScopeCtrl5" class="panel panel-primary">
        <div class="panel-heading">
            Binding Source: <input ng-model="data.fruit" />
        </div>
        <div class="panel-body" scope-example7 value="getKind(data.fruit)" fruit-name="data.fruit"></div>
        <!--3) при изменении модели будет изменятся значение свойства data.fruit-->
    </div>
</div>