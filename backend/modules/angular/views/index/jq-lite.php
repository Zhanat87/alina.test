<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularJqLiteAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'jqLite';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularJqLiteAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <p>
        обратите внимание: если скрипт jquery подключен раньше чем скрипт angular,
        то Angular проверяет подключен ли в документе jquery и если нет то использует jqLite
    </p>
    <pre>
        jqLite является урезанной версией JQuery, которую содержит AngularJS и
        которая используется для создания, манипулирования и управления элементами HTML разметки
        jqLite методы для навигации по DOM:
        children() - возвращает jqLite объект, который содержит набор дочерних элементов
        eq(index) - возвращает jqLite объект, который содержит элемент
        по определенному индексу из коллекции элементов
        find(tag) - находит все элементы с указанным имененем тега
        next() - возвращает следующий элемент,
        (который находится на том же уровне, что и тот для которого вызывается метод)
        parent() - возвращает родительский элемент
    </pre>
    <pre>
        еще одна причина почему для навигации по DOM следует
        использовать директивы - это возможность изменять HTML элементы.
        jqLite предоставляет ряд методов для изменения элементов и их содержимого:
        addClass(name) - добавляет все элементы из jqLite объекта в класс
        attr(name)/attr(name, value) - возвращает значение для атрибута первого элемента из jqLite объекта
        или устанавливает значение для всех элементов
        css(name)/css(name, value) - возвращает значение css свойства первого элемента из jqLite объекта
        или устанавливает значение css свойства для всех элементов
        hasClass(name) - возвращает true если любой из элементов jqLite объекта принадлежит к указанному классу
        prop(name)/prop(name, value) - возвращает значение свойства первого элемента из jqLite объекта
        или устанавливает значение свойства для всех элементов
        removeAttr(name) - удаляет атрибут из всех элементов jqLite объекта
        removeClass(name) - удаляет элементы jqLite объекта из определенного css класса
        text()/text(value) - возвращает сконкатенированный текст всех элементов jqLite объекта
        или устанавливает значение для всех элементов jqLite объекта
        toggleClass(name) - выполняет инверсию css класса для элементов jqLite объекта.
        Те элементы которые были включены в класс - удаляются, а те которые не были включены - добавляются.
        val()/val(value) - возвращает атрибут value для первого элемента из jqLite объекта
        или устанавливает атрибут value для всех элементов jqLite объекта
    </pre>
    <pre>
        jqLite предоставляет ряд методов для создания и удаления элементов разметки:
        angular.element(html) - создает jqLite объект, который представляет элемент HTML указанный в скобках
        after(elements) - выполняет вставку контента после элемента, на котором был вызван данный метод
        append(elements) - выполняет вставку элемента, как последнего дочернего элемента каждого элемента
        из jqLite объекта, на котором был вызван метод
        clone() - возвращает новый jqLite объект, который является дубликатом того объекта,
        на котором был вызван метод
        prepend(elements) - выполняет вставку элемента, как первого дочернего элемента каждого элемента
        из jqLite объекта, на котором был вызван метод
        remove() - удаляет элементы, которые присутствуют в jqLite объекте из DOM
        replaceWith(elements) - выполняет замену элементов jqLite объекта, на котором был вызван метод
        на элементы указанные в аргументах
        wrap(elements) - упаковывает каждый элемент из jqLite объекта в элемент указанный в аргументах
    </pre>
    <pre>
        jqLite предоставляет ряд методов для обработки событий:
        on(events, handler) - регистрирует обработчик для одного или нескольких событий,
        инициатором которых является елемент, который представлен как jqLite объект
        off(events, handler) - удаляет предварительно зарегистрированный обработчик
        для елемента, который представлен как jqLite объект
        triggerHandler(event) - запускает все обработчики для события указанного в аргументах
    </pre>
    <pre>
        так же в jqLite существует еще несколько методов, которые используются не часто:
        removeData(key) - удаляет данные по ключу из элемента, представленного jqLite объектом
        html() - возвращает HTML представление содержимого первого элемента, представленного jqLite объектом
        ready(handler) - регистрирует функцию-обработчик, которая будет выполнена
        когда DOM будет полностью загружен
        controller()/controller(name) - возвращает контроллер который применен к элементу или к его родителю
        scope() - возвращает scope который применен к элементу или к его родителю
    </pre>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Colors</h3>
        </div>
        <div class="panel-body h3">
            <ul custom-directive>
                <li>Red</li>
                <li>Black</li>
                <li>Yellow</li>
                <li>Navy</li>
                <li>Green</li>
            </ul>
        </div>
    </div>
    <br /><br /><br />
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Colors</h3>
        </div>
        <div class="panel-body h3">
            <ul custom-directive2>
                <li>Red</li>
                <li>Black</li>
                <ul>
                    <li>Red</li>
                    <li>Coral</li>
                </ul>
                <li>Yellow</li>
                <li>Navy</li>
                <li>Green</li>
            </ul>
        </div>
    </div>
    <br /><br /><br />
    <style>
        .target {
            color:lawngreen;
        }
        .missing {
            color:red
        }
    </style>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Colors</h3>
        </div>
        <div class="panel-body h3">
            <ul custom-directive3>
                <li>Red</li>
                <li>Black</li>
                <ul>
                    <li>Red</li>
                    <li>Coral</li>
                </ul>
                <li>Yellow</li>
                <li>Navy</li>
                <li>Green</li>
            </ul>
        </div>
    </div>
    <br /><br /><br />
    <div ng-controller="jqLiteCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Colors</h3>
            </div>
            <div class="panel-body h3">
                <div custom-directive4></div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <style>
        .red {
            color:red;
        }
    </style>
    <div ng-controller="jqLiteCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Colors</h3>
            </div>
            <div class="panel-body">
                <div custom-directive5 class="h4">
                    <button class="btn btn-danger">Change color</button>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
</div>