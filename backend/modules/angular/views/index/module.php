<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularModuleAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'module';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularModuleAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <h2 class="h1">Список покупок</h2>
    <div class="panel" ng-controller="listCtrl">
        <!--Поведение содержимого в рамках этого элемента будет управляться с помощью класса listCtrl, определенного в module.js.-->
        <span class="h4">Осталось {{remain()}} из {{items.length}}</span>
        <!--Конструкция {{ }} указывает на место связывания данных в HTML.
        AngularJS автоматически обновит это место, если функция remain() вернет значение, отличное от предыдущего-->
        <table class="table table-striped">
            <tbody>
            <tr ng-repeat="item in items">
                <!--Используйте ng-repeat чтобы показать набор. Здесь для каждого элемента item,
                AngularJS создаст копию шаблона. Когда объекты будут добавлены в набор items
                ng-repeat автоматически добавит новые элементы в DOM. Точно так же,
                при удалении объектов из items соответствующие элементы удалятся.
                Это одна из наиболее универсальных директив AngularJS.-->
                <td><input class="checkbox-inline" type="checkbox" ng-model="item.done"></td>
                <!--Связывает форму с моделью. Это значит, что любые изменения в форме обновят данные модели,
                а при изменении модели обновятся элементы формы.
                AngularJS автоматически копирует состояние чекбокса в item.done.
                И наоборот, если обновится item.done чекбокс изменится соответствующим образом.-->
                <td><span class="done-{{item.done}}">{{item.text}}</span></td>
                <!--Когда item.done становится true, то CSS-селектор становится done-true
                и к нему затем применяется зачеркивание.-->
            </tr>
            </tbody>
        </table>
        <form ng-submit="addItem()">
            <!--Перехватывает событие отправки формы и вместо этого вызывает addItem.
            В этом методе мы читаем свойство itemText и вставляем его в набор items.-->
            <input class="form-control" type="text" ng-model="itemText" size="30"
                   placeholder="Добавить покупку.">
            <input class="btn btn-primary" type="submit" value="Добавить">
        </form>
    </div>
</div>