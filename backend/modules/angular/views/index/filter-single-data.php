<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularFilterSingleDataAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'filter single data';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularFilterSingleDataAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Фильтры позволяют задать общее поведение, которое будет доступно по всему приложению.
        фильтры преобразовывают данные для отображения, не изменяя данных из scope,
        данные сортируются фильтром до их обработки директивами или отображения во view

        В angularjs существует несколько типов фильтров:
        для обработки единичных данных и для работы с коллекциями данных
        Встроенные фильтры для работы с единичными данными:
        currency - используется для форматирования валюты
        date - используется для форматирования даты
        json - генерирует объект из json строки
        number - используется для форматирования числовых значений
        uppercase/lowercase - используется для преобразования строки в верхний/нижний регистр
    </pre>
    <p>
        используйте currency:"₴" для указания валюты форматирования
    </p>
    <p>
        Для того, чтобы применить фильтр достаточно использовать символ | после которого
        нужно указать фильтры, которые будут применятся к выражению привязки
    </p>
    <p>
        используйте фильтр number для того, чтобы указать колличество знаков после запятой.
        так же этот фильтр автоматически добавляет запятую для разделения тысяч
    </p>
    <p>
        date фильтр форматирует дату, которая может быть представлена
        как строка, JavaScript объект или количество милисекунд
    </p>
    <pre>
        Форматирование дат, используя date фильтр:
        | уууу | представление года 4-х значное число
        | уу   | представление года 2-х значное число
        | ММММ | представление месяца прописью
        | МММ  | сокращенное представление месяца прописью
        | ММ   | представление месяца числом
        | М    | сокращенное представление месяца числом
        | dd   | представление дня месяца с использованием 2-х чисел
        | d    | представление дня месяца с использованием одного числа
        | ЕЕЕЕ | полное название дня недели
        | ЕЕЕ  | сокращенное полное название дня недели
        | НН   | представление часов  с использованием 2-х чисел формат 24
        | Н    | представление часов с использованием одного чисел формат 24
        | hh   | представление часов с использованием 2-х чисел формат 12
        | h    | представление часов с использованием одного чисел формат 12
        | mm   | представление минут с использованием 2-х чисел
        | m    | представление минут с использованием одного числа
        | ss   | представление секунд с использованием 2-х чисел
        | s    | представление секунд  с использованием одного числа
        | a    | указатель a.m/p.m
        | Z    | 4-х значное представления временной зоны
    </pre>
    <pre>
        Используя файл локализации angular-locale_de-de.js, при форматировании учитывается локаль
        Сокращения для форматирования даты:
        medium - MMM d, y h:mm:ss a
        short - M/d/yy h:mm a
        fullDate - EEEE, MMMM d,y
        long-date - MMMM d, y
        mediumDate - MMM d, y
        shortDate - M/d/yy
        mediumTime - h:mm:ss a
        shortTime - h:mm a
    </pre>
    <div class="panel panel-primary" ng-controller="filterSingleDataCtrl">
        <div class="panel-heading">
            <h3>
                Items in cart
                <span class="label label-info">{{items.length}}</span>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3" ng-repeat="item in items">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item.itemName | uppercase}}</h4>
                        </div>
                        <div class="panel-body">
                            <p><span class="h4">Category: </span>{{item.itemCategory | lowercase}}</p>
                            <p><span class="h4">Expire date: </span>{{getExpiryDate(item.expireDate) | date:"dd MMM yy"}}</p>
                            <p><span class="h4">Expire date 2: </span>{{getExpiryDate(item.expireDate) | date:"fullDate"}}</p>
                            <p class="text-right"><span class="h4">Price: </span>{{item.itemPrice | currency}}</p>
                            <p class="text-right"><span class="h4">Number: </span>{{item.itemPrice | number:0}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary" ng-controller="filterSingleDataCtrl">
        <div class="panel-heading">
            <h3>
                Items in cart
                <span class="label label-info">{{items.length}}</span>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3" ng-repeat="item in items">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>{{item | json}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>